<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Auth\User;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|max:255",
            "email" => "required|max:255",
            "password" => ['required', 'confirmed', Password::min(8)->mixedCase()],
            "password_confirmation" => "nullable",
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "type" => "required",
        ]);

        //check if the password is not empty and if so then hash it
        if (!is_null($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }
        else{
            unset($validated['password']);
        }

        $user = (new User())->create($validated);
        return redirect()->route('users.index')->with('success', 'User ', $user->first_name ,' Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
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
    public function update(Request $request,User $user)
    {
        $validated = $request->validate([
            "name" => "required|max:255",
            "email" => "required|max:255",
            "password" => ['nullable', 'confirmed', Password::min(8)->mixedCase()],
            "password_confirmation" => "nullable",
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "type" => "required",
        ]);

        //check if the password is not empty and if so then hash it
        if (!is_null($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }
        else{
            unset($validated['password']);
        }

        //Update User
        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'User Updated Successfully');
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
            return redirect()->route('users.index')->with('error', 'You Cannot Delete Yourself');
        }

        (new User())->newQuery()->find($id)->delete();
        return redirect()->route('users.index');
    }
}
