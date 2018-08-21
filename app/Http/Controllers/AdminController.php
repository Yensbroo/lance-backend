<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Level;
use App\User;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('level')->get();
        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
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
            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6',
                'password2' => 'required|same:password',
                'level_id' => 'required'
            ];
    
            $messages = [
                'email.required' => 'E-mailadres is verplicht',
                'password.required' => 'Wachtwoord  is verplicht',
                'password2.required' => 'Herhaal het wachtwoord',
                'password2.same' => 'Wachtwoord is niet hezelfde',
                'level_id.required' => 'Level is verplicht'
            ];
    
            [
                'email' => $email,
                'password' => $password
            ] = $request->only([
                'email',
                'password',
                'level_id'
            ]);
    
            $validate = Validator::make($request->all(), $rules, $messages);
    
            if($validate->fails()) {
    
                return redirect('admins/create')->withErrors($validate)->withInput();
            }
            $admin = $request->all();
            $admin['password'] = password_hash($admin['password'], PASSWORD_BCRYPT);
            $user = User::where('email', $email)->first();
            if($user) {
                
                $isAdmin = Admin::where('email', $email)->first();

                if($isAdmin) {
                    $errors = [
                        'isAdmin' => "Er bestaat al een administrator met dit emailadres"
                    ];
                    return redirect('admins/create')->withErrors($errors)->withInput();
                }
                $admin['full_name'] = $user['full_name'];
                $admin = Admin::create($admin); 
                return view('admins.show', compact('admin'));
            } else {
                $errors = [
                    'noUser' => 'Er bestaat geen gebruiker met deze email'
                ];
                return redirect('admins/create')->withErrors($errors)->withInput();
            }
            
        } catch(\Exception $exception) {
            dd($exception);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admins.show', compact('admin'));
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
