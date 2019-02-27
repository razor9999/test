<?php

namespace App\Http\Controllers\Api\V1;

use App\Influencer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Influencer as InfluencerResource;
use App\Http\Requests\Admin\StoreInfluencersRequest;
use App\Http\Requests\Admin\UpdateInfluencersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class InfluencersController extends Controller
{
    public function index(Request $request)
    {
        

        $perPage = $request->get('per_page',10);
        $influencer = Influencer::with([]);
        $keyword = $request->get('search','');
        if(!empty($keyword)){
            $influencer = $influencer->where(function ($query) use($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('phone', 'like', '%' . $keyword . '%');
            });

        }

        return new InfluencerResource($influencer->paginate($perPage));
    }

    public function show($id)
    {
        if (Gate::denies('influencer_view')) {
            return abort(401);
        }

        $influencer = Influencer::with([])->findOrFail($id);

        return new InfluencerResource($influencer);
    }

    public function store(StoreInfluencersRequest $request)
    {
        if (Gate::denies('influencer_create')) {
            return abort(401);
        }

        $influencer = Influencer::create($request->all());
        
        

        return (new InfluencerResource($influencer))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateInfluencersRequest $request, $id)
    {
        if (Gate::denies('influencer_edit')) {
            return abort(401);
        }

        $influencer = Influencer::findOrFail($id);
        $influencer->update($request->all());
        
        
        

        return (new InfluencerResource($influencer))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('influencer_delete')) {
            return abort(401);
        }

        $influencer = Influencer::findOrFail($id);
        $influencer->delete();

        return response(null, 204);
    }
}
