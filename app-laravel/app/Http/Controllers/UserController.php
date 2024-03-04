<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = $this->user->all();
        return view('users', ['users' => $Users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $create = $this->user->create([
            'nome' => $request->input('nome'),
            'sobrenome' => $request->input('sobrenome'),
            'email' => $request->input('email'),
            'senha' => password_hash($request->input('senha'), PASSWORD_DEFAULT),
        ]);

        if($create){
            return redirect() -> back() -> with(key: 'message' , value: 'User created successfully');
        }

        return redirect() -> back() -> with(key: 'message' , value: 'error creating user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $update = $this->user->where('id', $id) -> update($request->except(keys: ['_token', '_method']));

       if($update){
           return redirect() -> back() -> with(key: 'message' , value: 'User updated successfully');
       }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $this->user->where('id', $id) -> delete();

       return redirect() -> route('users.index');
    }
}
