<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Auth\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = (new User())
        ->newQuery()
        ->paginate(10);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.form', [
            'user' => new User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->get('password')) {
            $request->offsetSet('password', bcrypt($request->password));
        }
        else{
            $request->offsetUnset('password');
        }

        $validated = $request->validated();

        if ($request->file('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars');
        }

        $user = (new User())->create($validated);
        return redirect()->route('admin.users.index')->with('success', 'User ', $user->first_name ,' Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.form', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        if ($request->get('password')) {
            $request->offsetSet('password', bcrypt($request->password));
        }
        else{
            $request->offsetUnset('password');
        }

        $validated = $request->all();

        if ($request->file('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars');
        }

        //Update User
        $user->update($validated);
        return redirect()->route('admin.users.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Prevent Deletion if it is the Current User
        if ($id == auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'You Cannot Delete Yourself');
        }

        (new User())->newQuery()->find($id)->delete();
        return redirect()->route('admin.users.index');
    }
}
