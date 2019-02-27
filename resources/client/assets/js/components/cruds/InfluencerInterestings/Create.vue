<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Influencer interesting</h1>
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
                                    <label for="influencer">Influencer</label>
                                    <v-select
                                            name="influencer"
                                            label="name"
                                            @input="updateInfluencer"
                                            :value="item.influencer"
                                            :options="influencersAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="interesting">Interesting</label>
                                    <v-select
                                            name="interesting"
                                            label="name"
                                            @input="updateInteresting"
                                            :value="item.interesting"
                                            :options="interestingsAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="weight"
                                            placeholder="Enter Weight"
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
        ...mapGetters('InfluencerInterestingsSingle', ['item', 'loading', 'influencersAll', 'interestingsAll'])
    },
    created() {
        this.fetchInfluencersAll(),
        this.fetchInterestingsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('InfluencerInterestingsSingle', ['storeData', 'resetState', 'setInfluencer', 'setInteresting', 'setWeight', 'fetchInfluencersAll', 'fetchInterestingsAll']),
        updateInfluencer(value) {
            this.setInfluencer(value)
        },
        updateInteresting(value) {
            this.setInteresting(value)
        },
        updateWeight(e) {
            this.setWeight(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'influencer_interestings.index' })
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
