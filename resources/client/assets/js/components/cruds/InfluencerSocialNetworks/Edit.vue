<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Influencer social network</h1>
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
                                    <label for="social_network">Social network *</label>
                                    <v-select
                                            name="social_network"
                                            label="name"
                                            @input="updateSocial_network"
                                            :value="item.social_network"
                                            :options="socialnetworksAll"
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
        ...mapGetters('InfluencerSocialNetworksSingle', ['item', 'loading', 'influencersAll', 'socialnetworksAll']),
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
        ...mapActions('InfluencerSocialNetworksSingle', ['fetchData', 'updateData', 'resetState', 'setInfluencer', 'setSocial_network', 'setStatus']),
        updateInfluencer(value) {
            this.setInfluencer(value)
        },
        updateSocial_network(value) {
            this.setSocial_network(value)
        },
        updateStatus(e) {
            this.setStatus(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'influencer_social_networks.index' })
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
