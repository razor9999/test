@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li class="treeview" v-if="$can('user_management_access')">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('permission_access')">
                        <router-link :to="{ name: 'permissions.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.permissions.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('role_access')">
                        <router-link :to="{ name: 'roles.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('user_access')">
                        <router-link :to="{ name: 'users.index' }">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li v-if="$can('company_size_access')">
                <router-link :to="{ name: 'company_sizes.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.company-size.title')</span>
                </router-link>
            </li>
            <li v-if="$can('category_access')">
                <router-link :to="{ name: 'categories.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.category.title')</span>
                </router-link>
            </li>
            <li v-if="$can('campaign_access')">
                <router-link :to="{ name: 'campaigns.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.campaign.title')</span>
                </router-link>
            </li>
            <li v-if="$can('social_network_access')">
                <router-link :to="{ name: 'social_networks.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.social-network.title')</span>
                </router-link>
            </li>
            <li v-if="$can('audience_access')">
                <router-link :to="{ name: 'audiences.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.audience.title')</span>
                </router-link>
            </li>
            <li v-if="$can('influencer_access')">
                <router-link :to="{ name: 'influencers.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.influencer.title')</span>
                </router-link>
            </li>
            <li v-if="$can('brand_access')">
                <router-link :to="{ name: 'brands.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.brand.title')</span>
                </router-link>
            </li>
            <li v-if="$can('brand_category_access')">
                <router-link :to="{ name: 'brand_categories.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.brand-category.title')</span>
                </router-link>
            </li>
            <li v-if="$can('interesting_access')">
                <router-link :to="{ name: 'interestings.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.interesting.title')</span>
                </router-link>
            </li>
            <li v-if="$can('audience_interesting_access')">
                <router-link :to="{ name: 'audience_interestings.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.audience-interesting.title')</span>
                </router-link>
            </li>
            <li v-if="$can('influencer_interesting_access')">
                <router-link :to="{ name: 'influencer_interestings.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.influencer-interesting.title')</span>
                </router-link>
            </li>
            <li v-if="$can('suggestion_access')">
                <router-link :to="{ name: 'suggestions.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.suggestion.title')</span>
                </router-link>
            </li>
            <li v-if="$can('influencer_social_network_access')">
                <router-link :to="{ name: 'influencer_social_networks.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.influencer-social-network.title')</span>
                </router-link>
            </li>

            <li>
                <router-link :to="{ name: 'auth.change_password' }">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </router-link>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
