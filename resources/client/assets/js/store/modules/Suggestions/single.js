function initialState() {
    return {
        item: {
            id: null,
            status: null,
            influencer: null,
            campaign: null,
            weight: null,
        },
        influencersAll: [],
        campaignsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    influencersAll: state => state.influencersAll,
    campaignsAll: state => state.campaignsAll,
    
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
            if (_.isEmpty(state.item.campaign)) {
                params.set('campaign_id', '')
            } else {
                params.set('campaign_id', state.item.campaign.id)
            }

            axios.post('/api/v1/suggestions', params)
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
            if (_.isEmpty(state.item.campaign)) {
                params.set('campaign_id', '')
            } else {
                params.set('campaign_id', state.item.campaign.id)
            }

            axios.post('/api/v1/suggestions/' + state.item.id, params)
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
        axios.get('/api/v1/suggestions/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchInfluencersAll')
    dispatch('fetchCampaignsAll')
    },
    fetchInfluencersAll({ commit }) {
        axios.get('/api/v1/influencers')
            .then(response => {
                commit('setInfluencersAll', response.data.data)
            })
    },
    fetchCampaignsAll({ commit }) {
        axios.get('/api/v1/campaigns')
            .then(response => {
                commit('setCampaignsAll', response.data.data)
            })
    },
    setStatus({ commit }, value) {
        commit('setStatus', value)
    },
    setInfluencer({ commit }, value) {
        commit('setInfluencer', value)
    },
    setCampaign({ commit }, value) {
        commit('setCampaign', value)
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
    setStatus(state, value) {
        state.item.status = value
    },
    setInfluencer(state, value) {
        state.item.influencer = value
    },
    setCampaign(state, value) {
        state.item.campaign = value
    },
    setWeight(state, value) {
        state.item.weight = value
    },
    setInfluencersAll(state, value) {
        state.influencersAll = value
    },
    setCampaignsAll(state, value) {
        state.campaignsAll = value
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
