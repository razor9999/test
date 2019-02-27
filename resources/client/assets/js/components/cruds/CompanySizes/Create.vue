<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Company size</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="text">Text *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="text"
                                            placeholder="Enter Text *"
                                            :value="item.text"
                                            @input="updateText"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="min">Min *</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="min"
                                            placeholder="Enter Min *"
                                            :value="item.min"
                                            @input="updateMin"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="max">Max *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="max"
                                            placeholder="Enter Max *"
                                            :value="item.max"
                                            @input="updateMax"
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
        ...mapGetters('CompanySizesSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('CompanySizesSingle', ['storeData', 'resetState', 'setText', 'setMin', 'setMax']),
        updateText(e) {
            this.setText(e.target.value)
        },
        updateMin(e) {
            this.setMin(e.target.value)
        },
        updateMax(e) {
            this.setMax(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'company_sizes.index' })
                    this.$eventHub.$emit('create-success')
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
