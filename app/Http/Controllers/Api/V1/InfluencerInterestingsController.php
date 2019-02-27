<?php

namespace App\Http\Controllers\Api\V1;

use App\InfluencerInteresting;
use App\Http\Controllers\Controller;
use App\Http\Resources\InfluencerInteresting as InfluencerInterestingResource;
use App\Http\Requests\Admin\StoreInfluencerInterestingsRequest;
use App\Http\Requests\Admin\UpdateInfluencerInterestingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class InfluencerInterestingsController extends Controller
{
    public function index()
    {
        

        return new InfluencerInterestingResource(InfluencerInteresting::with(['influencer', 'interesting'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('influencer_interesting_view')) {
            return abort(401);
        }

        $influencer_interesting = InfluencerInteresting::with(['influencer', 'interesting'])->findOrFail($id);

        return new InfluencerInterestingResource($influencer_interesting);
    }

    public function store(StoreInfluencerInterestingsRequest $request)
    {
        if (Gate::denies('influencer_interesting_create')) {
            return abort(401);
        }

        $influencer_interesting = InfluencerInteresting::create($request->all());
        
        

        return (new InfluencerInterestingResource($influencer_interesting))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateInfluencerInterestingsRequest $request, $id)
    {
        if (Gate::denies('influencer_interesting_edit')) {
            return abort(401);
        }

        $influencer_interesting = InfluencerInteresting::findOrFail($id);
        $influencer_interesting->update($request->all());
        
        
        

        return (new InfluencerInterestingResource($influencer_interesting))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('influencer_interesting_delete')) {
            return abort(401);
        }

        $influencer_interesting = InfluencerInteresting::findOrFail($id);
        $influencer_interesting->delete();

        return response(null, 204);
    }
}
