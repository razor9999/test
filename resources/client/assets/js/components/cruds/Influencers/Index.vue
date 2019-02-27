<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Influencer</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">List</h3>
                        </div>

                        <div class="box-body">
                            <div class="btn-group">
                                <router-link
                                        v-if="$can(xprops.permission_prefix + 'create')"
                                        :to="{ name: xprops.route + '.create' }"
                                        class="btn btn-success btn-sm"
                                        >
                                    <i class="fa fa-plus"></i> Add new
                                </router-link>


                            </div>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box-tools">
                                        <div class="form-row">

                                            <div class="form-group col-lg-3 col-sm-12">

                                                <div class="input-group input-group-sm" >
                                                    <input  v-model="query.search" type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                                    <div class="input-group-btn">
                                                        <button @click="fetchData" type="submit" class="btn btn-default"> <i class="fa fa-refresh" :class="{'fa-spin': loading}"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped dataTable">
                                        <thead><tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Nick name</th>
                                            <th>Phone</th>
                                            <th>Interactive</th>
                                            <th>Date Joined</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="item in data.data">
                                            <td>{{item.name}}</td>
                                            <td>{{item.email}}</td>
                                            <td>{{item.nick_name}}</td>
                                            <td>{{item.phone}}</td>
                                            <td>{{item.interactive}}</td>
                                            <td>{{item.created_at}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div v-if="data.total==0">No Data Found</div>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer clearfix">
                            <div class="row">
                                <div class="col col-lg-5">
                                    <pagination class="mt-0"
                                                :current="data.current_page"
                                                :total="data.total"
                                                :per-page="data.per_page"
                                                @page-changed="pagination"
                                    ></pagination>
                                </div>
                                <div class="col col-lg-7 text-right">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{data.from}} to {{data.to}} of {{data.total}} entries</div>

                                    </div>

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
import DatatableActions from '../../dtmodules/DatatableActions'
import DatatableSingle from '../../dtmodules/DatatableSingle'
import DatatableList from '../../dtmodules/DatatableList'
import DatatableCheckbox from '../../dtmodules/DatatableCheckbox'


export default {
    data() {
        return {
            columns: [

            ],
            query: { search: '', per_page:10 },
            xprops: {
                module: 'InfluencersIndex',
                route: 'influencers',
                permission_prefix: 'influencer_'
            }
        }
    },
    created() {
        this.$root.relationships = this.relationships
        this.fetchData()
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('InfluencersIndex', ['data', 'total', 'loading', 'relationships']),
    },
    watch: {
        query: {
            handler(query) {
                this.setQuery(query)
            },
            deep: true
        }
    },
    methods: {
        ...mapActions('InfluencersIndex', ['fetchData', 'setQuery', 'resetState']),
        pagination(page){
            this.query.page = page;
            this.setQuery(this.query)
            this.fetchData()

        },
    }
}
</script>


<style scoped>

</style>
