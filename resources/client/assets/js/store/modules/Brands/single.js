function initialState() {
    return {
        item: {
            id: null,
            name: null,
            address: null,
            email: null,
            phone: null,
            company_size: null,
        },
        companysizesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    companysizesAll: state => state.companysizesAll,
    
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

            if (_.isEmpty(state.item.company_size)) {
                params.set('company_size_id', '')
            } else {
                params.set('company_size_id', state.item.company_size.id)
            }

            axios.post('/api/v1/brands', params)
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

            if (_.isEmpty(state.item.company_size)) {
                params.set('company_size_id', '')
            } else {
                params.set('company_size_id', state.item.company_size.id)
            }

            axios.post('/api/v1/brands/' + state.item.id, params)
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
        axios.get('/api/v1/brands/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchCompanysizesAll')
    },
    fetchCompanysizesAll({ commit }) {
        axios.get('/api/v1/company-sizes')
            .then(response => {
                commit('setCompanysizesAll', response.data.data)
            })
    },
    setName({ commit }, value) {
        commit('setName', value)
    },
    setAddress({ commit }, value) {
        commit('setAddress', value)
    },
    setEmail({ commit }, value) {
        commit('setEmail', value)
    },
    setPhone({ commit }, value) {
        commit('setPhone', value)
    },
    setCompany_size({ commit }, value) {
        commit('setCompany_size', value)
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
    setAddress(state, value) {
        state.item.address = value
    },
    setEmail(state, value) {
        state.item.email = value
    },
    setPhone(state, value) {
        state.item.phone = value
    },
    setCompany_size(state, value) {
        state.item.company_size = value
    },
    setCompanysizesAll(state, value) {
        state.companysizesAll = value
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
