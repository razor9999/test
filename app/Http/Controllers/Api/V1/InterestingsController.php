<?php

namespace App\Http\Controllers\Api\V1;

use App\Interesting;
use App\Http\Controllers\Controller;
use App\Http\Resources\Interesting as InterestingResource;
use App\Http\Requests\Admin\StoreInterestingsRequest;
use App\Http\Requests\Admin\UpdateInterestingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class InterestingsController extends Controller
{
    public function index()
    {
        

        return new InterestingResource(Interesting::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('interesting_view')) {
            return abort(401);
        }

        $interesting = Interesting::with([])->findOrFail($id);

        return new InterestingResource($interesting);
    }

    public function store(StoreInterestingsRequest $request)
    {
        if (Gate::denies('interesting_create')) {
            return abort(401);
        }

        $interesting = Interesting::create($request->all());
        
        

        return (new InterestingResource($interesting))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateInterestingsRequest $request, $id)
    {
        if (Gate::denies('interesting_edit')) {
            return abort(401);
        }

        $interesting = Interesting::findOrFail($id);
        $interesting->update($request->all());
        
        
        

        return (new InterestingResource($interesting))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('interesting_delete')) {
            return abort(401);
        }

        $interesting = Interesting::findOrFail($id);
        $interesting->delete();

        return response(null, 204);
    }
}
