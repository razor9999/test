<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Campaign</h1>
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
                                    <label for="brief">Brief</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="brief"
                                            placeholder="Enter Brief"
                                            :value="item.brief"
                                            @input="updateBrief"
                                            >
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
                                <div class="form-group">
                                    <label for="start">Start *</label>
                                    <date-picker
                                            :value="item.start"
                                            :config="$root.dpconfigDatetime"
                                            name="start"
                                            placeholder="Enter Start *"
                                            @dp-change="updateStart"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="end">End *</label>
                                    <date-picker
                                            :value="item.end"
                                            :config="$root.dpconfigDatetime"
                                            name="end"
                                            placeholder="Enter End *"
                                            @dp-change="updateEnd"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="budget">Budget *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="budget"
                                            placeholder="Enter Budget *"
                                            :value="item.budget"
                                            @input="updateBudget"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="requirement">Requirement *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="requirement"
                                            placeholder="Enter Requirement *"
                                            :value="item.requirement"
                                            @input="updateRequirement"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand *</label>
                                    <v-select
                                            name="brand"
                                            label="name"
                                            @input="updateBrand"
                                            :value="item.brand"
                                            :options="brandsAll"
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
        ...mapGetters('CampaignsSingle', ['item', 'loading', 'brandsAll'])
    },
    created() {
        this.fetchBrandsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('CampaignsSingle', ['storeData', 'resetState', 'setName', 'setBrief', 'setStatus', 'setStart', 'setEnd', 'setBudget', 'setRequirement', 'setBrand', 'fetchBrandsAll']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateBrief(e) {
            this.setBrief(e.target.value)
        },
        updateStatus(e) {
            this.setStatus(e.target.value)
        },
        updateStart(e) {
            this.setStart(e.target.value)
        },
        updateEnd(e) {
            this.setEnd(e.target.value)
        },
        updateBudget(e) {
            this.setBudget(e.target.value)
        },
        updateRequirement(e) {
            this.setRequirement(e.target.value)
        },
        updateBrand(value) {
            this.setBrand(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'campaigns.index' })
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
