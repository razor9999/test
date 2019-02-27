<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Interesting</h1>
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
                                    <label for="hashtag">Hashtag</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="hashtag"
                                            placeholder="Enter Hashtag"
                                            :value="item.hashtag"
                                            @input="updateHashtag"
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
        ...mapGetters('InterestingsSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('InterestingsSingle', ['storeData', 'resetState', 'setName', 'setDescription', 'setHashtag']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        updateHashtag(e) {
            this.setHashtag(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'interestings.index' })
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
