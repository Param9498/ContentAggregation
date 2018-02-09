<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'universities' => 'UniversityController',
    'degrees' => 'DegreeController',
    'branches' => 'BranchController',
    'subjects' => 'SubjectController',
    'units' => 'UnitController',
    'subtopics' => 'SubTopicController',
    'profiles' => 'ProfileController'
]);

Route::middleware('auth:api')->get('/user/profile', 'ProfileController@getCurrentUsersProfileDetails');
