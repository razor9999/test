function initialState() {
    return {
        item: {
            id: null,
            name: null,
            brief: null,
            status: null,
            start: null,
            end: null,
            budget: null,
            requirement: null,
            brand: null,
        },
        brandsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    brandsAll: state => state.brandsAll,
    
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

            if (_.isEmpty(state.item.brand)) {
                params.set('brand_id', '')
            } else {
                params.set('brand_id', state.item.brand.id)
            }

            axios.post('/api/v1/campaigns', params)
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

            if (_.isEmpty(state.item.brand)) {
                params.set('brand_id', '')
            } else {
                params.set('brand_id', state.item.brand.id)
            }

            axios.post('/api/v1/campaigns/' + state.item.id, params)
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
        axios.get('/api/v1/campaigns/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchBrandsAll')
    },
    fetchBrandsAll({ commit }) {
        axios.get('/api/v1/brands')
            .then(response => {
                commit('setBrandsAll', response.data.data)
            })
    },
    setName({ commit }, value) {
        commit('setName', value)
    },
    setBrief({ commit }, value) {
        commit('setBrief', value)
    },
    setStatus({ commit }, value) {
        commit('setStatus', value)
    },
    setStart({ commit }, value) {
        commit('setStart', value)
    },
    setEnd({ commit }, value) {
        commit('setEnd', value)
    },
    setBudget({ commit }, value) {
        commit('setBudget', value)
    },
    setRequirement({ commit }, value) {
        commit('setRequirement', value)
    },
    setBrand({ commit }, value) {
        commit('setBrand', value)
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
    setBrief(state, value) {
        state.item.brief = value
    },
    setStatus(state, value) {
        state.item.status = value
    },
    setStart(state, value) {
        state.item.start = value
    },
    setEnd(state, value) {
        state.item.end = value
    },
    setBudget(state, value) {
        state.item.budget = value
    },
    setRequirement(state, value) {
        state.item.requirement = value
    },
    setBrand(state, value) {
        state.item.brand = value
    },
    setBrandsAll(state, value) {
        state.brandsAll = value
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
