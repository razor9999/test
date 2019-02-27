function initialState() {
    return {
        item: {
            id: null,
            influencer: null,
            social_network: null,
            status: null,
        },
        influencersAll: [],
        socialnetworksAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    influencersAll: state => state.influencersAll,
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

            if (_.isEmpty(state.item.influencer)) {
                params.set('influencer_id', '')
            } else {
                params.set('influencer_id', state.item.influencer.id)
            }
            if (_.isEmpty(state.item.social_network)) {
                params.set('social_network_id', '')
            } else {
                params.set('social_network_id', state.item.social_network.id)
            }

            axios.post('/api/v1/influencer-social-networks', params)
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

            if (_.isEmpty(state.item.influencer)) {
                params.set('influencer_id', '')
            } else {
                params.set('influencer_id', state.item.influencer.id)
            }
            if (_.isEmpty(state.item.social_network)) {
                params.set('social_network_id', '')
            } else {
                params.set('social_network_id', state.item.social_network.id)
            }

            axios.post('/api/v1/influencer-social-networks/' + state.item.id, params)
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
        axios.get('/api/v1/influencer-social-networks/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchInfluencersAll')
    dispatch('fetchSocialnetworksAll')
    },
    fetchInfluencersAll({ commit }) {
        axios.get('/api/v1/influencers')
            .then(response => {
                commit('setInfluencersAll', response.data.data)
            })
    },
    fetchSocialnetworksAll({ commit }) {
        axios.get('/api/v1/social-networks')
            .then(response => {
                commit('setSocialnetworksAll', response.data.data)
            })
    },
    setInfluencer({ commit }, value) {
        commit('setInfluencer', value)
    },
    setSocial_network({ commit }, value) {
        commit('setSocial_network', value)
    },
    setStatus({ commit }, value) {
        commit('setStatus', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setInfluencer(state, value) {
        state.item.influencer = value
    },
    setSocial_network(state, value) {
        state.item.social_network = value
    },
    setStatus(state, value) {
        state.item.status = value
    },
    setInfluencersAll(state, value) {
        state.influencersAll = value
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
