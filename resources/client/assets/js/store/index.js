import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import CompanySizesIndex from './modules/CompanySizes'
import CompanySizesSingle from './modules/CompanySizes/single'
import CategoriesIndex from './modules/Categories'
import CategoriesSingle from './modules/Categories/single'
import CampaignsIndex from './modules/Campaigns'
import CampaignsSingle from './modules/Campaigns/single'
import SocialNetworksIndex from './modules/SocialNetworks'
import SocialNetworksSingle from './modules/SocialNetworks/single'
import AudiencesIndex from './modules/Audiences'
import AudiencesSingle from './modules/Audiences/single'
import InfluencersIndex from './modules/Influencers'
import InfluencersSingle from './modules/Influencers/single'
import BrandsIndex from './modules/Brands'
import BrandsSingle from './modules/Brands/single'
import BrandCategoriesIndex from './modules/BrandCategories'
import BrandCategoriesSingle from './modules/BrandCategories/single'
import InterestingsIndex from './modules/Interestings'
import InterestingsSingle from './modules/Interestings/single'
import AudienceInterestingsIndex from './modules/AudienceInterestings'
import AudienceInterestingsSingle from './modules/AudienceInterestings/single'
import InfluencerInterestingsIndex from './modules/InfluencerInterestings'
import InfluencerInterestingsSingle from './modules/InfluencerInterestings/single'
import SuggestionsIndex from './modules/Suggestions'
import SuggestionsSingle from './modules/Suggestions/single'
import InfluencerSocialNetworksIndex from './modules/InfluencerSocialNetworks'
import InfluencerSocialNetworksSingle from './modules/InfluencerSocialNetworks/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        CompanySizesIndex,
        CompanySizesSingle,
        CategoriesIndex,
        CategoriesSingle,
        CampaignsIndex,
        CampaignsSingle,
        SocialNetworksIndex,
        SocialNetworksSingle,
        AudiencesIndex,
        AudiencesSingle,
        InfluencersIndex,
        InfluencersSingle,
        BrandsIndex,
        BrandsSingle,
        BrandCategoriesIndex,
        BrandCategoriesSingle,
        InterestingsIndex,
        InterestingsSingle,
        AudienceInterestingsIndex,
        AudienceInterestingsSingle,
        InfluencerInterestingsIndex,
        InfluencerInterestingsSingle,
        SuggestionsIndex,
        SuggestionsSingle,
        InfluencerSocialNetworksIndex,
        InfluencerSocialNetworksSingle,
    },
    strict: debug,
})
