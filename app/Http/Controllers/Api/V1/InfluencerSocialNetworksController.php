<?php

namespace App\Http\Controllers\Api\V1;

use App\InfluencerSocialNetwork;
use App\Http\Controllers\Controller;
use App\Http\Resources\InfluencerSocialNetwork as InfluencerSocialNetworkResource;
use App\Http\Requests\Admin\StoreInfluencerSocialNetworksRequest;
use App\Http\Requests\Admin\UpdateInfluencerSocialNetworksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class InfluencerSocialNetworksController extends Controller
{
    public function index()
    {
        

        return new InfluencerSocialNetworkResource(InfluencerSocialNetwork::with(['influencer', 'social_network'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('influencer_social_network_view')) {
            return abort(401);
        }

        $influencer_social_network = InfluencerSocialNetwork::with(['influencer', 'social_network'])->findOrFail($id);

        return new InfluencerSocialNetworkResource($influencer_social_network);
    }

    public function store(StoreInfluencerSocialNetworksRequest $request)
    {
        if (Gate::denies('influencer_social_network_create')) {
            return abort(401);
        }

        $influencer_social_network = InfluencerSocialNetwork::create($request->all());
        
        

        return (new InfluencerSocialNetworkResource($influencer_social_network))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateInfluencerSocialNetworksRequest $request, $id)
    {
        if (Gate::denies('influencer_social_network_edit')) {
            return abort(401);
        }

        $influencer_social_network = InfluencerSocialNetwork::findOrFail($id);
        $influencer_social_network->update($request->all());
        
        
        

        return (new InfluencerSocialNetworkResource($influencer_social_network))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('influencer_social_network_delete')) {
            return abort(401);
        }

        $influencer_social_network = InfluencerSocialNetwork::findOrFail($id);
        $influencer_social_network->delete();

        return response(null, 204);
    }
}
