<?php

namespace App\Http\Controllers\Api\V1;

use App\BrandCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandCategory as BrandCategoryResource;
use App\Http\Requests\Admin\StoreBrandCategoriesRequest;
use App\Http\Requests\Admin\UpdateBrandCategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class BrandCategoriesController extends Controller
{
    public function index()
    {
        

        return new BrandCategoryResource(BrandCategory::with(['category', 'brand'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('brand_category_view')) {
            return abort(401);
        }

        $brand_category = BrandCategory::with(['category', 'brand'])->findOrFail($id);

        return new BrandCategoryResource($brand_category);
    }

    public function store(StoreBrandCategoriesRequest $request)
    {
        if (Gate::denies('brand_category_create')) {
            return abort(401);
        }

        $brand_category = BrandCategory::create($request->all());
        
        

        return (new BrandCategoryResource($brand_category))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateBrandCategoriesRequest $request, $id)
    {
        if (Gate::denies('brand_category_edit')) {
            return abort(401);
        }

        $brand_category = BrandCategory::findOrFail($id);
        $brand_category->update($request->all());
        
        
        

        return (new BrandCategoryResource($brand_category))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('brand_category_delete')) {
            return abort(401);
        }

        $brand_category = BrandCategory::findOrFail($id);
        $brand_category->delete();

        return response(null, 204);
    }
}
