<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = (auth()->id() && auth()->user()->roles_id==1)
            ? User::orderBy('id', 'asc')->paginate(6)
            : User::where('roles_id', '>', 1)->orderBy('id', 'asc')->paginate(6);
        return view('users.index', compact(['users']));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->validated());
        if ($file = $request->file("user_photo"))
            $user->update(["user_photo" => File::upLoadImage($file, "users", $user)]);
        return to_route('users.show', ["user" => $user->id])->with(['message' => 'Changes was saved', 'type' => 'success']);
    }

}
