<?php

namespace App\Http\Controllers\Api\V1;

use App\SocialNetwork;
use App\Http\Controllers\Controller;
use App\Http\Resources\SocialNetwork as SocialNetworkResource;
use App\Http\Requests\Admin\StoreSocialNetworksRequest;
use App\Http\Requests\Admin\UpdateSocialNetworksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class SocialNetworksController extends Controller
{
    public function index()
    {
        

        return new SocialNetworkResource(SocialNetwork::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('social_network_view')) {
            return abort(401);
        }

        $social_network = SocialNetwork::with([])->findOrFail($id);

        return new SocialNetworkResource($social_network);
    }

    public function store(StoreSocialNetworksRequest $request)
    {
        if (Gate::denies('social_network_create')) {
            return abort(401);
        }

        $social_network = SocialNetwork::create($request->all());
        
        

        return (new SocialNetworkResource($social_network))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSocialNetworksRequest $request, $id)
    {
        if (Gate::denies('social_network_edit')) {
            return abort(401);
        }

        $social_network = SocialNetwork::findOrFail($id);
        $social_network->update($request->all());
        
        
        

        return (new SocialNetworkResource($social_network))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('social_network_delete')) {
            return abort(401);
        }

        $social_network = SocialNetwork::findOrFail($id);
        $social_network->delete();

        return response(null, 204);
    }
}
