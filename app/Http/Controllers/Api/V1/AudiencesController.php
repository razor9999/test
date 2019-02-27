<?php

namespace App\Http\Controllers\Api\V1;

use App\Audience;
use App\Http\Controllers\Controller;
use App\Http\Resources\Audience as AudienceResource;
use App\Http\Requests\Admin\StoreAudiencesRequest;
use App\Http\Requests\Admin\UpdateAudiencesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class AudiencesController extends Controller
{
    public function index()
    {
        

        return new AudienceResource(Audience::with(['social_network'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('audience_view')) {
            return abort(401);
        }

        $audience = Audience::with(['social_network'])->findOrFail($id);

        return new AudienceResource($audience);
    }

    public function store(StoreAudiencesRequest $request)
    {
        if (Gate::denies('audience_create')) {
            return abort(401);
        }

        $audience = Audience::create($request->all());
        
        

        return (new AudienceResource($audience))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateAudiencesRequest $request, $id)
    {
        if (Gate::denies('audience_edit')) {
            return abort(401);
        }

        $audience = Audience::findOrFail($id);
        $audience->update($request->all());
        
        
        

        return (new AudienceResource($audience))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('audience_delete')) {
            return abort(401);
        }

        $audience = Audience::findOrFail($id);
        $audience->delete();

        return response(null, 204);
    }
}
