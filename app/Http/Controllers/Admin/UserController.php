<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Mail\UsersMail;
use App\Models\File;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(StoreUserRequest $storeUserRequest)
    {
        $data = $storeUserRequest->validated();
        $user = User::create($data);
        if ($file = $storeUserRequest->file("user_photo"))
            $user->update(["user_photo" => File::upLoadImage($file, "users", $user)]);
        return to_route('admin.users.index')
            ->with(['message' => 'User was created', 'type' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
      */
    public function update(StoreUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        if ($file = $request->file("user_photo"))
            $user->update(["user_photo" => File::upLoadImage($file, "users", $user)]);
        if($data['roles_id']==1)
            Mail::to($user->email)->send(new UsersMail());
        return to_route('admin.users.index')
            ->with(['message' => 'Changes was saved', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')
            ->with(['message' => 'User was deleted', 'type' => 'danger']);
    }
}
