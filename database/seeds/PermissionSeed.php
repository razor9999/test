<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'company_size_access',],
            ['id' => 18, 'title' => 'company_size_create',],
            ['id' => 19, 'title' => 'company_size_edit',],
            ['id' => 20, 'title' => 'company_size_view',],
            ['id' => 21, 'title' => 'company_size_delete',],
            ['id' => 22, 'title' => 'category_access',],
            ['id' => 23, 'title' => 'category_create',],
            ['id' => 24, 'title' => 'category_edit',],
            ['id' => 25, 'title' => 'category_view',],
            ['id' => 26, 'title' => 'category_delete',],
            ['id' => 27, 'title' => 'campaign_access',],
            ['id' => 28, 'title' => 'campaign_create',],
            ['id' => 29, 'title' => 'campaign_edit',],
            ['id' => 30, 'title' => 'campaign_view',],
            ['id' => 31, 'title' => 'campaign_delete',],
            ['id' => 32, 'title' => 'social_network_access',],
            ['id' => 33, 'title' => 'social_network_create',],
            ['id' => 34, 'title' => 'social_network_edit',],
            ['id' => 35, 'title' => 'social_network_view',],
            ['id' => 36, 'title' => 'social_network_delete',],
            ['id' => 37, 'title' => 'audience_access',],
            ['id' => 38, 'title' => 'audience_create',],
            ['id' => 39, 'title' => 'audience_edit',],
            ['id' => 40, 'title' => 'audience_view',],
            ['id' => 41, 'title' => 'audience_delete',],
            ['id' => 42, 'title' => 'influencer_access',],
            ['id' => 43, 'title' => 'influencer_create',],
            ['id' => 44, 'title' => 'influencer_edit',],
            ['id' => 45, 'title' => 'influencer_view',],
            ['id' => 46, 'title' => 'influencer_delete',],
            ['id' => 47, 'title' => 'brand_access',],
            ['id' => 48, 'title' => 'brand_create',],
            ['id' => 49, 'title' => 'brand_edit',],
            ['id' => 50, 'title' => 'brand_view',],
            ['id' => 51, 'title' => 'brand_delete',],
            ['id' => 52, 'title' => 'brand_category_access',],
            ['id' => 53, 'title' => 'brand_category_create',],
            ['id' => 54, 'title' => 'brand_category_edit',],
            ['id' => 55, 'title' => 'brand_category_view',],
            ['id' => 56, 'title' => 'brand_category_delete',],
            ['id' => 57, 'title' => 'interesting_access',],
            ['id' => 58, 'title' => 'interesting_create',],
            ['id' => 59, 'title' => 'interesting_edit',],
            ['id' => 60, 'title' => 'interesting_view',],
            ['id' => 61, 'title' => 'interesting_delete',],
            ['id' => 62, 'title' => 'audience_interesting_access',],
            ['id' => 63, 'title' => 'audience_interesting_create',],
            ['id' => 64, 'title' => 'audience_interesting_edit',],
            ['id' => 65, 'title' => 'audience_interesting_view',],
            ['id' => 66, 'title' => 'audience_interesting_delete',],
            ['id' => 67, 'title' => 'influencer_interesting_access',],
            ['id' => 68, 'title' => 'influencer_interesting_create',],
            ['id' => 69, 'title' => 'influencer_interesting_edit',],
            ['id' => 70, 'title' => 'influencer_interesting_view',],
            ['id' => 71, 'title' => 'influencer_interesting_delete',],
            ['id' => 72, 'title' => 'suggestion_access',],
            ['id' => 73, 'title' => 'suggestion_create',],
            ['id' => 74, 'title' => 'suggestion_edit',],
            ['id' => 75, 'title' => 'suggestion_view',],
            ['id' => 76, 'title' => 'suggestion_delete',],
            ['id' => 77, 'title' => 'influencer_social_network_access',],
            ['id' => 78, 'title' => 'influencer_social_network_create',],
            ['id' => 79, 'title' => 'influencer_social_network_edit',],
            ['id' => 80, 'title' => 'influencer_social_network_view',],
            ['id' => 81, 'title' => 'influencer_social_network_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
