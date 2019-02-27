<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Http\Requests\Admin\StoreInfluencersRequest;
use App\Influencer;
use App\Interesting;
use App\Mail\InfluencerCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InfluencersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $interesting = Interesting::all();
        return view('welcome', compact('interesting'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInfluencersRequest $request)
    {
        //
        $influencer = Influencer::create($request->all());
        Mail::to($influencer->email)->send(new InfluencerCreated($influencer));

        return view('thanks');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
