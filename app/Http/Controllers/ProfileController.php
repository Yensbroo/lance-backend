<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id =  $request->session()->get('user_id');
        try {
            
            $profile = $request->validate([
                'headline' => 'required',
                'bio' => 'required'
            ]);
            $profile = $request->all();
            
            Profile::create($profile + ['user_id' => $user_id]);
            return redirect()->route('user', ['user' => $user_id])->with('flash', 'Het profiel is aangemaakt!');
        } catch(ValidationException $exception) {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {   
        try {
            $profile = Profile::with('user')->find($profile);
            return view('profiles.show', compact('profile'));
        } catch(ModelNotFoundException $exception) {
            return redirect('profiles.create');
        }
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profileData = $request->validate([
            'headline' => 'required',
            'bio' => 'required',
        ]);

        $profile->update($profileData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
