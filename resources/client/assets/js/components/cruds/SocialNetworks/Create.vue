<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Social network</h1>
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
                                    <label for="description">Description</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="description"
                                            placeholder="Enter Description"
                                            :value="item.description"
                                            @input="updateDescription"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="logo"
                                            placeholder="Enter Logo"
                                            :value="item.logo"
                                            @input="updateLogo"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="url">Url</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="url"
                                            placeholder="Enter Url"
                                            :value="item.url"
                                            @input="updateUrl"
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
        ...mapGetters('SocialNetworksSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('SocialNetworksSingle', ['storeData', 'resetState', 'setName', 'setDescription', 'setLogo', 'setUrl']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        updateLogo(e) {
            this.setLogo(e.target.value)
        },
        updateUrl(e) {
            this.setUrl(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'social_networks.index' })
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
