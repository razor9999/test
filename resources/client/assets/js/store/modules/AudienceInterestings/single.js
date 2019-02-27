function initialState() {
    return {
        item: {
            id: null,
            audience: null,
            interesting: null,
            weight: null,
        },
        audiencesAll: [],
        interestingsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    audiencesAll: state => state.audiencesAll,
    interestingsAll: state => state.interestingsAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.audience)) {
                params.set('audience_id', '')
            } else {
                params.set('audience_id', state.item.audience.id)
            }
            if (_.isEmpty(state.item.interesting)) {
                params.set('interesting_id', '')
            } else {
                params.set('interesting_id', state.item.interesting.id)
            }

            axios.post('/api/v1/audience-interestings', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.audience)) {
                params.set('audience_id', '')
            } else {
                params.set('audience_id', state.item.audience.id)
            }
            if (_.isEmpty(state.item.interesting)) {
                params.set('interesting_id', '')
            } else {
                params.set('interesting_id', state.item.interesting.id)
            }

            axios.post('/api/v1/audience-interestings/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/audience-interestings/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchAudiencesAll')
    dispatch('fetchInterestingsAll')
    },
    fetchAudiencesAll({ commit }) {
        axios.get('/api/v1/audiences')
            .then(response => {
                commit('setAudiencesAll', response.data.data)
            })
    },
    fetchInterestingsAll({ commit }) {
        axios.get('/api/v1/interestings')
            .then(response => {
                commit('setInterestingsAll', response.data.data)
            })
    },
    setAudience({ commit }, value) {
        commit('setAudience', value)
    },
    setInteresting({ commit }, value) {
        commit('setInteresting', value)
    },
    setWeight({ commit }, value) {
        commit('setWeight', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setAudience(state, value) {
        state.item.audience = value
    },
    setInteresting(state, value) {
        state.item.interesting = value
    },
    setWeight(state, value) {
        state.item.weight = value
    },
    setAudiencesAll(state, value) {
        state.audiencesAll = value
    },
    setInterestingsAll(state, value) {
        state.interestingsAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
