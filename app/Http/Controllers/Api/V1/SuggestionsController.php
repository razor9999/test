<?php

namespace App\Http\Controllers\Api\V1;

use App\Suggestion;
use App\Http\Controllers\Controller;
use App\Http\Resources\Suggestion as SuggestionResource;
use App\Http\Requests\Admin\StoreSuggestionsRequest;
use App\Http\Requests\Admin\UpdateSuggestionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class SuggestionsController extends Controller
{
    public function index()
    {
        

        return new SuggestionResource(Suggestion::with(['influencer', 'campaign'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('suggestion_view')) {
            return abort(401);
        }

        $suggestion = Suggestion::with(['influencer', 'campaign'])->findOrFail($id);

        return new SuggestionResource($suggestion);
    }

    public function store(StoreSuggestionsRequest $request)
    {
        if (Gate::denies('suggestion_create')) {
            return abort(401);
        }

        $suggestion = Suggestion::create($request->all());
        
        

        return (new SuggestionResource($suggestion))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSuggestionsRequest $request, $id)
    {
        if (Gate::denies('suggestion_edit')) {
            return abort(401);
        }

        $suggestion = Suggestion::findOrFail($id);
        $suggestion->update($request->all());
        
        
        

        return (new SuggestionResource($suggestion))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('suggestion_delete')) {
            return abort(401);
        }

        $suggestion = Suggestion::findOrFail($id);
        $suggestion->delete();

        return response(null, 204);
    }
}
