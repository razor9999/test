<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Audience</h1>
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
                                            <th>Name</th>
                                            <td>{{ item.name }}</td>
                                            </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td>{{ item.gender }}</td>
                                            </tr>
                                        <tr>
                                            <th>Location</th>
                                            <td>{{ item.location }}</td>
                                            </tr>
                                        <tr>
                                            <th>From age</th>
                                            <td>{{ item.from_age }}</td>
                                            </tr>
                                        <tr>
                                            <th>To age</th>
                                            <td>{{ item.to_age }}</td>
                                            </tr>
                                        <tr>
                                            <th>Competence</th>
                                            <td>{{ item.competence }}</td>
                                            </tr>
                                        <tr>
                                            <th>Social network</th>
                                            <td>
                                                <span class="label label-info" v-if="item.social_network !== null">
                                                    {{ item.social_network.name }}
                                                </span>
                                            </td>
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
        ...mapGetters('AudiencesSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('AudiencesSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
