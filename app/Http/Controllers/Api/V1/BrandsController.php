<?php

namespace App\Http\Controllers\Api\V1;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Resources\Brand as BrandResource;
use App\Http\Requests\Admin\StoreBrandsRequest;
use App\Http\Requests\Admin\UpdateBrandsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class BrandsController extends Controller
{
    public function index()
    {
        

        return new BrandResource(Brand::with(['company_size'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('brand_view')) {
            return abort(401);
        }

        $brand = Brand::with(['company_size'])->findOrFail($id);

        return new BrandResource($brand);
    }

    public function store(StoreBrandsRequest $request)
    {
        if (Gate::denies('brand_create')) {
            return abort(401);
        }

        $brand = Brand::create($request->all());
        
        

        return (new BrandResource($brand))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateBrandsRequest $request, $id)
    {
        if (Gate::denies('brand_edit')) {
            return abort(401);
        }

        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        
        
        

        return (new BrandResource($brand))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('brand_delete')) {
            return abort(401);
        }

        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response(null, 204);
    }
}
