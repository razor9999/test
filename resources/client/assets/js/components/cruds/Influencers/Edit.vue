<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Influencer</h1>
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
                                    <label for="name">Name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Enter Name"
                                            :value="item.name"
                                            @input="updateName"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="nick_name">Nick name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="nick_name"
                                            placeholder="Enter Nick name"
                                            :value="item.nick_name"
                                            @input="updateNick_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            placeholder="Enter Phone"
                                            :value="item.phone"
                                            @input="updatePhone"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="interactive">Interactive</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="interactive"
                                            placeholder="Enter Interactive"
                                            :value="item.interactive"
                                            @input="updateInteractive"
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
        ...mapGetters('InfluencersSingle', ['item', 'loading']),
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
        ...mapActions('InfluencersSingle', ['fetchData', 'updateData', 'resetState', 'setName', 'setEmail', 'setNick_name', 'setPhone', 'setInteractive']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateNick_name(e) {
            this.setNick_name(e.target.value)
        },
        updatePhone(e) {
            this.setPhone(e.target.value)
        },
        updateInteractive(e) {
            this.setInteractive(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'influencers.index' })
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
