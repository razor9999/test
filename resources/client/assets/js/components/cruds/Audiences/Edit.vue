<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Audience</h1>
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
                                    <label for="name">Name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Enter Name *"
                                            :value="item.name"
                                            @input="updateName"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="gender"
                                            placeholder="Enter Gender"
                                            :value="item.gender"
                                            @input="updateGender"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="location"
                                            placeholder="Enter Location"
                                            :value="item.location"
                                            @input="updateLocation"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="from_age">From age</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="from_age"
                                            placeholder="Enter From age"
                                            :value="item.from_age"
                                            @input="updateFrom_age"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="to_age">To age</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="to_age"
                                            placeholder="Enter To age"
                                            :value="item.to_age"
                                            @input="updateTo_age"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="competence">Competence</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="competence"
                                            placeholder="Enter Competence"
                                            :value="item.competence"
                                            @input="updateCompetence"
                                            >
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
        ...mapGetters('AudiencesSingle', ['item', 'loading', 'socialnetworksAll']),
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
        ...mapActions('AudiencesSingle', ['fetchData', 'updateData', 'resetState', 'setName', 'setGender', 'setLocation', 'setFrom_age', 'setTo_age', 'setCompetence', 'setSocial_network']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateGender(e) {
            this.setGender(e.target.value)
        },
        updateLocation(e) {
            this.setLocation(e.target.value)
        },
        updateFrom_age(e) {
            this.setFrom_age(e.target.value)
        },
        updateTo_age(e) {
            this.setTo_age(e.target.value)
        },
        updateCompetence(e) {
            this.setCompetence(e.target.value)
        },
        updateSocial_network(value) {
            this.setSocial_network(value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'audiences.index' })
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
