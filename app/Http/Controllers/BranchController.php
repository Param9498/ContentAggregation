<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Resources\BranchResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\BranchWithSubjectResource;
use App\Http\Resources\BranchWithUnitResource;
use App\Http\Resources\BranchWithSubtopicResource;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BranchResource::collection(Branch::all());
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
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }

    public function getAllSubjectsInThisBranch(Branch $branch)
    {
        // $subjects = $branch->subjects()->get();
        // return SubjectResource::collection($subjects);
        return new BranchWithSubjectResource($branch);
    }

    public function getUnitsFromBranch(Branch $branch)
    {
        // $units = $branch->subjects()->with('units')->get();
        // return $units;
        return new BranchWithUnitResource($branch);
    }
    public function getSubtopicsFromBranch(Branch $branch)
    {
        return new BranchWithSubtopicResource($branch);
    }
    public function getSemesterWiseDetailsFromBranch(Branch $branch)
    {
    }
}
