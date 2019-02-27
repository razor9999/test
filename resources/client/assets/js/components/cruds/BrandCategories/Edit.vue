<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Brand category</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="category">Category *</label>
                                    <v-select
                                            name="category"
                                            label="name"
                                            @input="updateCategory"
                                            :value="item.category"
                                            :options="categoriesAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand *</label>
                                    <v-select
                                            name="brand"
                                            label="name"
                                            @input="updateBrand"
                                            :value="item.brand"
                                            :options="brandsAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="status"
                                            placeholder="Enter Status"
                                            :value="item.status"
                                            @input="updateStatus"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('BrandCategoriesSingle', ['item', 'loading', 'categoriesAll', 'brandsAll']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('BrandCategoriesSingle', ['fetchData', 'updateData', 'resetState', 'setCategory', 'setBrand', 'setStatus']),
        updateCategory(value) {
            this.setCategory(value)
        },
        updateBrand(value) {
            this.setBrand(value)
        },
        updateStatus(e) {
            this.setStatus(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'brand_categories.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
