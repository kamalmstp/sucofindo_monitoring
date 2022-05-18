<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return viewAdministrator('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return viewAdministrator('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'full_name' => 'required',
            'email' => 'required|unique:users|email:rfc,dns',
            'level' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $hashedPassword = bcrypt($request->get('password'));

        $user = [
            'username' => $request->get('username'),
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'level' => $request->get('level'),
            'password' => $hashedPassword
        ];

        $createUser = User::create($user);

        if ($createUser) {
            $message = setFlashMessage('success', 'insert', 'pengguna');
        } else {
            $message = setFlashMessage('error', 'insert', 'pengguna');
        }

        return redirect()->route('users.index')->with('message', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return viewAdministrator('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,email,' . $id,
            'full_name' => 'required',
            'email' => 'required|unique:users,email,' . $id . '|email:rfc,dns',
        ]);

        $user = User::where('id', $id)->firstOrFail();

        $user->username = $request->get('username');
        $user->full_name = $request->get('full_name');
        $user->email = $request->get('email');
        $user->level = $request->get('level');

        if ($user->save()) {
            $message = setFlashMessage('success', 'update', 'pengguna');
        } else {
            $message = setFlashMessage('error', 'update', 'pengguna');
        }

        return redirect()->route('users.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        
        if ($user->delete()) {
            $message = setFlashMessage('success', 'delete', 'pengguna');
        } else {
            $message = setFlashMessage('error', 'delete', 'pengguna');
        }

        return redirect()->route('users.index')->with('message', $message);
    }
}
