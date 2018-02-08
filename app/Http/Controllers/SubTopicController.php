<?php

namespace App\Http\Controllers;

use App\SubTopic;
use Illuminate\Http\Request;
use App\Http\Resources\SubTopicResource;

class SubTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubTopicResource::collection(SubTopic::all());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubTopic  $subTopic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subTopic = SubTopic::where("id", $id)->first();
        return new SubTopicResource($subTopic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubTopic  $subTopic
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTopic $subTopic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubTopic  $subTopic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubTopic $subTopic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubTopic  $subTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTopic $subTopic)
    {
        //
    }
}
