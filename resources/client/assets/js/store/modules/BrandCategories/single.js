function initialState() {
    return {
        item: {
            id: null,
            category: null,
            brand: null,
            status: null,
        },
        categoriesAll: [],
        brandsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    categoriesAll: state => state.categoriesAll,
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

            if (_.isEmpty(state.item.category)) {
                params.set('category_id', '')
            } else {
                params.set('category_id', state.item.category.id)
            }
            if (_.isEmpty(state.item.brand)) {
                params.set('brand_id', '')
            } else {
                params.set('brand_id', state.item.brand.id)
            }

            axios.post('/api/v1/brand-categories', params)
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

            if (_.isEmpty(state.item.category)) {
                params.set('category_id', '')
            } else {
                params.set('category_id', state.item.category.id)
            }
            if (_.isEmpty(state.item.brand)) {
                params.set('brand_id', '')
            } else {
                params.set('brand_id', state.item.brand.id)
            }

            axios.post('/api/v1/brand-categories/' + state.item.id, params)
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
        axios.get('/api/v1/brand-categories/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchCategoriesAll')
    dispatch('fetchBrandsAll')
    },
    fetchCategoriesAll({ commit }) {
        axios.get('/api/v1/categories')
            .then(response => {
                commit('setCategoriesAll', response.data.data)
            })
    },
    fetchBrandsAll({ commit }) {
        axios.get('/api/v1/brands')
            .then(response => {
                commit('setBrandsAll', response.data.data)
            })
    },
    setCategory({ commit }, value) {
        commit('setCategory', value)
    },
    setBrand({ commit }, value) {
        commit('setBrand', value)
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
    setCategory(state, value) {
        state.item.category = value
    },
    setBrand(state, value) {
        state.item.brand = value
    },
    setStatus(state, value) {
        state.item.status = value
    },
    setCategoriesAll(state, value) {
        state.categoriesAll = value
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
