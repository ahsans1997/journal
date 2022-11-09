<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' =>'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('user.index')->with('success', 'Admin Create Successfull.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function makeadmin($user_id)
    {

        User::findOrFail($user_id)->update([
            'role' => 1
        ]);
        return back()->with('success', 'New Admin create successfull');

    }
    public function maketeacher($user_id)
    {
        // $admin = User::where('role', 1)->count();
            User::findOrFail($user_id)->update([
                'role' => 2
            ]);
            return back()->with('success', 'New Admin create successfull');
    }
    public function makestudent($user_id)
    {
        // $admin = User::where('role', 1)->count();
            User::findOrFail($user_id)->update([
                'role' => 3
            ]);
            return back()->with('success', 'New Admin create successfull');
    }
}
