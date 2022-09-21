<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Auth\Administrator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index(){
    //     return view('admin.dashboard');
    // }
    use ListView;

    protected $model = Administrator::class;

    protected $fields = [
        'name',
        'email',
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administrators.form', [
            'administrator' => new Administrator()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdministratorRequest $request)
    {
        if ($request->get('password')) {
            $request->offsetSet('password', bcrypt($request->password));
        }
        else{
            $request->offsetUnset('password');
        }

        $validated = $request->validated();

        $administrator = (new Administrator())->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $request->get('password')
        ]);
        return redirect()->route('admin.administrators.index')->with('success', 'Administrator ', $administrator->name ,' Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        return view('admin.administrators.show', compact('administrator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        return view('admin.administrators.form', [
            'administrator' => $administrator
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministratorRequest $request, Administrator $administrator)
    {
        if ($request->get('password')) {
            $request->offsetSet('password', bcrypt($request->password));
        }
        else{
            $request->offsetUnset('password');
        }

        $validated = $request->all();

        //Update Admin
        $administrator->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);
        return redirect()->route('admin.administrators.index')->with('success', 'Administartor Updated Successfully');
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
            return redirect()->route('admin.administrators.index')->with('error', 'You Cannot Delete Yourself');
        }

        (new Administrator())->newQuery()->find($id)->delete();
        return redirect()->route('admin.administrators.index');
    }
}
