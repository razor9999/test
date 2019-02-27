<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Audience interesting</h1>
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
                                    <label for="audience">Audience *</label>
                                    <v-select
                                            name="audience"
                                            label="name"
                                            @input="updateAudience"
                                            :value="item.audience"
                                            :options="audiencesAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="interesting">Interesting *</label>
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
        ...mapGetters('AudienceInterestingsSingle', ['item', 'loading', 'audiencesAll', 'interestingsAll']),
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
        ...mapActions('AudienceInterestingsSingle', ['fetchData', 'updateData', 'resetState', 'setAudience', 'setInteresting', 'setWeight']),
        updateAudience(value) {
            this.setAudience(value)
        },
        updateInteresting(value) {
            this.setInteresting(value)
        },
        updateWeight(e) {
            this.setWeight(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'audience_interestings.index' })
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
