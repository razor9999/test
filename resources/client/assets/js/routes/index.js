import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import CompanySizesIndex from '../components/cruds/CompanySizes/Index.vue'
import CompanySizesCreate from '../components/cruds/CompanySizes/Create.vue'
import CompanySizesShow from '../components/cruds/CompanySizes/Show.vue'
import CompanySizesEdit from '../components/cruds/CompanySizes/Edit.vue'
import CategoriesIndex from '../components/cruds/Categories/Index.vue'
import CategoriesCreate from '../components/cruds/Categories/Create.vue'
import CategoriesShow from '../components/cruds/Categories/Show.vue'
import CategoriesEdit from '../components/cruds/Categories/Edit.vue'
import CampaignsIndex from '../components/cruds/Campaigns/Index.vue'
import CampaignsCreate from '../components/cruds/Campaigns/Create.vue'
import CampaignsShow from '../components/cruds/Campaigns/Show.vue'
import CampaignsEdit from '../components/cruds/Campaigns/Edit.vue'
import SocialNetworksIndex from '../components/cruds/SocialNetworks/Index.vue'
import SocialNetworksCreate from '../components/cruds/SocialNetworks/Create.vue'
import SocialNetworksShow from '../components/cruds/SocialNetworks/Show.vue'
import SocialNetworksEdit from '../components/cruds/SocialNetworks/Edit.vue'
import AudiencesIndex from '../components/cruds/Audiences/Index.vue'
import AudiencesCreate from '../components/cruds/Audiences/Create.vue'
import AudiencesShow from '../components/cruds/Audiences/Show.vue'
import AudiencesEdit from '../components/cruds/Audiences/Edit.vue'
import InfluencersIndex from '../components/cruds/Influencers/Index.vue'
import InfluencersCreate from '../components/cruds/Influencers/Create.vue'
import InfluencersShow from '../components/cruds/Influencers/Show.vue'
import InfluencersEdit from '../components/cruds/Influencers/Edit.vue'
import BrandsIndex from '../components/cruds/Brands/Index.vue'
import BrandsCreate from '../components/cruds/Brands/Create.vue'
import BrandsShow from '../components/cruds/Brands/Show.vue'
import BrandsEdit from '../components/cruds/Brands/Edit.vue'
import BrandCategoriesIndex from '../components/cruds/BrandCategories/Index.vue'
import BrandCategoriesCreate from '../components/cruds/BrandCategories/Create.vue'
import BrandCategoriesShow from '../components/cruds/BrandCategories/Show.vue'
import BrandCategoriesEdit from '../components/cruds/BrandCategories/Edit.vue'
import InterestingsIndex from '../components/cruds/Interestings/Index.vue'
import InterestingsCreate from '../components/cruds/Interestings/Create.vue'
import InterestingsShow from '../components/cruds/Interestings/Show.vue'
import InterestingsEdit from '../components/cruds/Interestings/Edit.vue'
import AudienceInterestingsIndex from '../components/cruds/AudienceInterestings/Index.vue'
import AudienceInterestingsCreate from '../components/cruds/AudienceInterestings/Create.vue'
import AudienceInterestingsShow from '../components/cruds/AudienceInterestings/Show.vue'
import AudienceInterestingsEdit from '../components/cruds/AudienceInterestings/Edit.vue'
import InfluencerInterestingsIndex from '../components/cruds/InfluencerInterestings/Index.vue'
import InfluencerInterestingsCreate from '../components/cruds/InfluencerInterestings/Create.vue'
import InfluencerInterestingsShow from '../components/cruds/InfluencerInterestings/Show.vue'
import InfluencerInterestingsEdit from '../components/cruds/InfluencerInterestings/Edit.vue'
import SuggestionsIndex from '../components/cruds/Suggestions/Index.vue'
import SuggestionsCreate from '../components/cruds/Suggestions/Create.vue'
import SuggestionsShow from '../components/cruds/Suggestions/Show.vue'
import SuggestionsEdit from '../components/cruds/Suggestions/Edit.vue'
import InfluencerSocialNetworksIndex from '../components/cruds/InfluencerSocialNetworks/Index.vue'
import InfluencerSocialNetworksCreate from '../components/cruds/InfluencerSocialNetworks/Create.vue'
import InfluencerSocialNetworksShow from '../components/cruds/InfluencerSocialNetworks/Show.vue'
import InfluencerSocialNetworksEdit from '../components/cruds/InfluencerSocialNetworks/Edit.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/company-sizes', component: CompanySizesIndex, name: 'company_sizes.index' },
    { path: '/company-sizes/create', component: CompanySizesCreate, name: 'company_sizes.create' },
    { path: '/company-sizes/:id', component: CompanySizesShow, name: 'company_sizes.show' },
    { path: '/company-sizes/:id/edit', component: CompanySizesEdit, name: 'company_sizes.edit' },
    { path: '/categories', component: CategoriesIndex, name: 'categories.index' },
    { path: '/categories/create', component: CategoriesCreate, name: 'categories.create' },
    { path: '/categories/:id', component: CategoriesShow, name: 'categories.show' },
    { path: '/categories/:id/edit', component: CategoriesEdit, name: 'categories.edit' },
    { path: '/campaigns', component: CampaignsIndex, name: 'campaigns.index' },
    { path: '/campaigns/create', component: CampaignsCreate, name: 'campaigns.create' },
    { path: '/campaigns/:id', component: CampaignsShow, name: 'campaigns.show' },
    { path: '/campaigns/:id/edit', component: CampaignsEdit, name: 'campaigns.edit' },
    { path: '/social-networks', component: SocialNetworksIndex, name: 'social_networks.index' },
    { path: '/social-networks/create', component: SocialNetworksCreate, name: 'social_networks.create' },
    { path: '/social-networks/:id', component: SocialNetworksShow, name: 'social_networks.show' },
    { path: '/social-networks/:id/edit', component: SocialNetworksEdit, name: 'social_networks.edit' },
    { path: '/audiences', component: AudiencesIndex, name: 'audiences.index' },
    { path: '/audiences/create', component: AudiencesCreate, name: 'audiences.create' },
    { path: '/audiences/:id', component: AudiencesShow, name: 'audiences.show' },
    { path: '/audiences/:id/edit', component: AudiencesEdit, name: 'audiences.edit' },
    { path: '/influencers', component: InfluencersIndex, name: 'influencers.index' },
    { path: '/influencers/create', component: InfluencersCreate, name: 'influencers.create' },
    { path: '/influencers/:id', component: InfluencersShow, name: 'influencers.show' },
    { path: '/influencers/:id/edit', component: InfluencersEdit, name: 'influencers.edit' },
    { path: '/brands', component: BrandsIndex, name: 'brands.index' },
    { path: '/brands/create', component: BrandsCreate, name: 'brands.create' },
    { path: '/brands/:id', component: BrandsShow, name: 'brands.show' },
    { path: '/brands/:id/edit', component: BrandsEdit, name: 'brands.edit' },
    { path: '/brand-categories', component: BrandCategoriesIndex, name: 'brand_categories.index' },
    { path: '/brand-categories/create', component: BrandCategoriesCreate, name: 'brand_categories.create' },
    { path: '/brand-categories/:id', component: BrandCategoriesShow, name: 'brand_categories.show' },
    { path: '/brand-categories/:id/edit', component: BrandCategoriesEdit, name: 'brand_categories.edit' },
    { path: '/interestings', component: InterestingsIndex, name: 'interestings.index' },
    { path: '/interestings/create', component: InterestingsCreate, name: 'interestings.create' },
    { path: '/interestings/:id', component: InterestingsShow, name: 'interestings.show' },
    { path: '/interestings/:id/edit', component: InterestingsEdit, name: 'interestings.edit' },
    { path: '/audience-interestings', component: AudienceInterestingsIndex, name: 'audience_interestings.index' },
    { path: '/audience-interestings/create', component: AudienceInterestingsCreate, name: 'audience_interestings.create' },
    { path: '/audience-interestings/:id', component: AudienceInterestingsShow, name: 'audience_interestings.show' },
    { path: '/audience-interestings/:id/edit', component: AudienceInterestingsEdit, name: 'audience_interestings.edit' },
    { path: '/influencer-interestings', component: InfluencerInterestingsIndex, name: 'influencer_interestings.index' },
    { path: '/influencer-interestings/create', component: InfluencerInterestingsCreate, name: 'influencer_interestings.create' },
    { path: '/influencer-interestings/:id', component: InfluencerInterestingsShow, name: 'influencer_interestings.show' },
    { path: '/influencer-interestings/:id/edit', component: InfluencerInterestingsEdit, name: 'influencer_interestings.edit' },
    { path: '/suggestions', component: SuggestionsIndex, name: 'suggestions.index' },
    { path: '/suggestions/create', component: SuggestionsCreate, name: 'suggestions.create' },
    { path: '/suggestions/:id', component: SuggestionsShow, name: 'suggestions.show' },
    { path: '/suggestions/:id/edit', component: SuggestionsEdit, name: 'suggestions.edit' },
    { path: '/influencer-social-networks', component: InfluencerSocialNetworksIndex, name: 'influencer_social_networks.index' },
    { path: '/influencer-social-networks/create', component: InfluencerSocialNetworksCreate, name: 'influencer_social_networks.create' },
    { path: '/influencer-social-networks/:id', component: InfluencerSocialNetworksShow, name: 'influencer_social_networks.show' },
    { path: '/influencer-social-networks/:id/edit', component: InfluencerSocialNetworksEdit, name: 'influencer_social_networks.edit' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
