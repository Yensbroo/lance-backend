<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->paginate(7);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $userData = $request->validate([
                'full_name' => 'required',
                'email' => 'required|unique:users|email',
                'role_id' => 'required',
                'password' => 'required|min:6',
                'password2' => 'required|same:password'
            ]);
            $userData = $request->only([
                'full_name',
                'email',
                'password',
                'role_id'
            ]);
            $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);
            $user = User::create($userData);
            return view('users.show', compact('user'))->with('flash', 'De gebruiker is aangemaakt!');
        } catch (ValidationException $exception) {
            dd($exception);
        } catch(\Exception $exception) {
            dd($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        $request->session()->put('user_id', $user->id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'full_name' => request('full_name'),
            'email' => request('email'),
            'role_id' => request('role_id')
        ]);
        return redirect('/users')->with('flash', 'De gebruiker is bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->update(['deleted_at' => date('Y-m-d H:i:s')]);

        return back()->with('flash', 'De gebruiker is op inactief gezet');
    }

    public function undelete(User $user) {
        $user->update(['deleted_at' => null]);

        return back()->with('flash', 'De gebruiker is terug op actief gezet');
    }
}
