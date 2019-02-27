<?php

namespace App\Http\Controllers\Api\V1;

use App\CompanySize;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanySize as CompanySizeResource;
use App\Http\Requests\Admin\StoreCompanySizesRequest;
use App\Http\Requests\Admin\UpdateCompanySizesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CompanySizesController extends Controller
{
    public function index()
    {
        

        return new CompanySizeResource(CompanySize::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('company_size_view')) {
            return abort(401);
        }

        $company_size = CompanySize::with([])->findOrFail($id);

        return new CompanySizeResource($company_size);
    }

    public function store(StoreCompanySizesRequest $request)
    {
        if (Gate::denies('company_size_create')) {
            return abort(401);
        }

        $company_size = CompanySize::create($request->all());
        
        

        return (new CompanySizeResource($company_size))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCompanySizesRequest $request, $id)
    {
        if (Gate::denies('company_size_edit')) {
            return abort(401);
        }

        $company_size = CompanySize::findOrFail($id);
        $company_size->update($request->all());
        
        
        

        return (new CompanySizeResource($company_size))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('company_size_delete')) {
            return abort(401);
        }

        $company_size = CompanySize::findOrFail($id);
        $company_size->delete();

        return response(null, 204);
    }
}
