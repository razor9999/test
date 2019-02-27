<?php

namespace App\Http\Controllers\Api\V1;

use App\Campaign;
use App\Http\Controllers\Controller;
use App\Http\Resources\Campaign as CampaignResource;
use App\Http\Requests\Admin\StoreCampaignsRequest;
use App\Http\Requests\Admin\UpdateCampaignsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CampaignsController extends Controller
{
    public function index()
    {
        

        return new CampaignResource(Campaign::with(['brand'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('campaign_view')) {
            return abort(401);
        }

        $campaign = Campaign::with(['brand'])->findOrFail($id);

        return new CampaignResource($campaign);
    }

    public function store(StoreCampaignsRequest $request)
    {
        if (Gate::denies('campaign_create')) {
            return abort(401);
        }

        $campaign = Campaign::create($request->all());
        
        

        return (new CampaignResource($campaign))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCampaignsRequest $request, $id)
    {
        if (Gate::denies('campaign_edit')) {
            return abort(401);
        }

        $campaign = Campaign::findOrFail($id);
        $campaign->update($request->all());
        
        
        

        return (new CampaignResource($campaign))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('campaign_delete')) {
            return abort(401);
        }

        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        return response(null, 204);
    }
}
