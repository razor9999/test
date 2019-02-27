<?php

namespace App\Http\Controllers\Api\V1;

use App\AudienceInteresting;
use App\Http\Controllers\Controller;
use App\Http\Resources\AudienceInteresting as AudienceInterestingResource;
use App\Http\Requests\Admin\StoreAudienceInterestingsRequest;
use App\Http\Requests\Admin\UpdateAudienceInterestingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class AudienceInterestingsController extends Controller
{
    public function index()
    {
        

        return new AudienceInterestingResource(AudienceInteresting::with(['audience', 'interesting'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('audience_interesting_view')) {
            return abort(401);
        }

        $audience_interesting = AudienceInteresting::with(['audience', 'interesting'])->findOrFail($id);

        return new AudienceInterestingResource($audience_interesting);
    }

    public function store(StoreAudienceInterestingsRequest $request)
    {
        if (Gate::denies('audience_interesting_create')) {
            return abort(401);
        }

        $audience_interesting = AudienceInteresting::create($request->all());
        
        

        return (new AudienceInterestingResource($audience_interesting))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateAudienceInterestingsRequest $request, $id)
    {
        if (Gate::denies('audience_interesting_edit')) {
            return abort(401);
        }

        $audience_interesting = AudienceInteresting::findOrFail($id);
        $audience_interesting->update($request->all());
        
        
        

        return (new AudienceInterestingResource($audience_interesting))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('audience_interesting_delete')) {
            return abort(401);
        }

        $audience_interesting = AudienceInteresting::findOrFail($id);
        $audience_interesting->delete();

        return response(null, 204);
    }
}
