<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserProfileStoreRequest;
use App\Http\Resources\EducationResource;
use App\Http\Resources\ExperienceResource;
use App\Http\Resources\UserProfileResource;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersprofile = UserProfileResource::collection(UserProfile::all());
        return inertia('Front/Profile/Index',compact('usersprofile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professionalStatuses = [];
        return inertia('Front/Profile/EditProfile',compact('professionalStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfileStoreRequest $request)
    {
        $user = Auth::user();
        $user->profile()->updateOrCreate($request->validated());
        return redirect()->route('front.dashboard')->with('success', 'Profile created successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $usersprofile)
    {
        $usersprofile = new UserProfileResource($usersprofile);
        $educations = EducationResource::collection(Education::where('user_id',$usersprofile->user_id)->get());
        $experiences = ExperienceResource::collection(Experience::where('user_id',$usersprofile->user_id)->get());
        return inertia("Front/Profile/Detail",compact('usersprofile','educations','experiences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $usersprofile)
    {
        $professionalStatuses = [];
        return inertia('Front/Profile/EditProfile',compact('professionalStatuses', 'usersprofile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileStoreRequest $request, UserProfile $usersprofile)
    {
        $usersprofile = $usersprofile->update($request->validated());
        return redirect()->route('front.dashboard')->with('success', 'Profile updated successfuly!');
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
