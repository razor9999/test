<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Suggestion</h1>
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
                                    <label for="status">Status *</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="status"
                                            placeholder="Enter Status *"
                                            :value="item.status"
                                            @input="updateStatus"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="influencer">Influencer *</label>
                                    <v-select
                                            name="influencer"
                                            label="name"
                                            @input="updateInfluencer"
                                            :value="item.influencer"
                                            :options="influencersAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="campaign">Campaign *</label>
                                    <v-select
                                            name="campaign"
                                            label="name"
                                            @input="updateCampaign"
                                            :value="item.campaign"
                                            :options="campaignsAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="weight"
                                            placeholder="Enter Weight *"
                                            :value="item.weight"
                                            @input="updateWeight"
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
        ...mapGetters('SuggestionsSingle', ['item', 'loading', 'influencersAll', 'campaignsAll'])
    },
    created() {
        this.fetchInfluencersAll(),
        this.fetchCampaignsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('SuggestionsSingle', ['storeData', 'resetState', 'setStatus', 'setInfluencer', 'setCampaign', 'setWeight', 'fetchInfluencersAll', 'fetchCampaignsAll']),
        updateStatus(e) {
            this.setStatus(e.target.value)
        },
        updateInfluencer(value) {
            this.setInfluencer(value)
        },
        updateCampaign(value) {
            this.setCampaign(value)
        },
        updateWeight(e) {
            this.setWeight(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'suggestions.index' })
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
