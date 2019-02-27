function initialState() {
    return {
        item: {
            id: null,
            name: null,
            gender: null,
            location: null,
            from_age: null,
            to_age: null,
            competence: null,
            social_network: null,
        },
        socialnetworksAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    socialnetworksAll: state => state.socialnetworksAll,
    
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

            if (_.isEmpty(state.item.social_network)) {
                params.set('social_network_id', '')
            } else {
                params.set('social_network_id', state.item.social_network.id)
            }

            axios.post('/api/v1/audiences', params)
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

            if (_.isEmpty(state.item.social_network)) {
                params.set('social_network_id', '')
            } else {
                params.set('social_network_id', state.item.social_network.id)
            }

            axios.post('/api/v1/audiences/' + state.item.id, params)
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
        axios.get('/api/v1/audiences/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchSocialnetworksAll')
    },
    fetchSocialnetworksAll({ commit }) {
        axios.get('/api/v1/social-networks')
            .then(response => {
                commit('setSocialnetworksAll', response.data.data)
            })
    },
    setName({ commit }, value) {
        commit('setName', value)
    },
    setGender({ commit }, value) {
        commit('setGender', value)
    },
    setLocation({ commit }, value) {
        commit('setLocation', value)
    },
    setFrom_age({ commit }, value) {
        commit('setFrom_age', value)
    },
    setTo_age({ commit }, value) {
        commit('setTo_age', value)
    },
    setCompetence({ commit }, value) {
        commit('setCompetence', value)
    },
    setSocial_network({ commit }, value) {
        commit('setSocial_network', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setName(state, value) {
        state.item.name = value
    },
    setGender(state, value) {
        state.item.gender = value
    },
    setLocation(state, value) {
        state.item.location = value
    },
    setFrom_age(state, value) {
        state.item.from_age = value
    },
    setTo_age(state, value) {
        state.item.to_age = value
    },
    setCompetence(state, value) {
        state.item.competence = value
    },
    setSocial_network(state, value) {
        state.item.social_network = value
    },
    setSocialnetworksAll(state, value) {
        state.socialnetworksAll = value
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
