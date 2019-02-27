<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('company-sizes', 'CompanySizesController');
    Route::apiResource('categories', 'CategoriesController');
    Route::apiResource('campaigns', 'CampaignsController');
    Route::apiResource('social-networks', 'SocialNetworksController');
    Route::apiResource('audiences', 'AudiencesController');
    Route::apiResource('influencers', 'InfluencersController');
    Route::apiResource('brands', 'BrandsController');
    Route::apiResource('brand-categories', 'BrandCategoriesController');
    Route::apiResource('interestings', 'InterestingsController');
    Route::apiResource('audience-interestings', 'AudienceInterestingsController');
    Route::apiResource('influencer-interestings', 'InfluencerInterestingsController');
    Route::apiResource('suggestions', 'SuggestionsController');
    Route::apiResource('influencer-social-networks', 'InfluencerSocialNetworksController');
});
