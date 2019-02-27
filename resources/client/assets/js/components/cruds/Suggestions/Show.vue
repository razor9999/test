<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Suggestion</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{ item.status }}</td>
                                            </tr>
                                        <tr>
                                            <th>Influencer</th>
                                            <td>
                                                <span class="label label-info" v-if="item.influencer !== null">
                                                    {{ item.influencer.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Campaign</th>
                                            <td>
                                                <span class="label label-info" v-if="item.campaign !== null">
                                                    {{ item.campaign.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th>
                                            <td>{{ item.weight }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('SuggestionsSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('SuggestionsSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
