<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Auth\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use ListView;

    protected $model = User::class;

    protected $fields = [
        'name',
        'email',
    ];

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.form', [
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
        return redirect()->route('profile.show', $user)->with('success', 'Profile Updated Successfully');
    }
}
