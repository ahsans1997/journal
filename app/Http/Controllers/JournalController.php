<?php

namespace App\Http\Controllers;

use App\Models\AssignUser;
use App\Models\Department;
use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class JournalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.journal.index',[
            'journals' => Journal::with(['department', 'user'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.journal.create',[
            'departments' => Department::all(),
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
        $validation = $request->validate([
            'journal_name' => 'required',
            'journal_description' => 'required',
            'department_id' => 'required|numeric'
        ]);
        $journal_id = Journal::insertGetId([
            'journal_name' => $request->journal_name,
            'journal_description' => $request->journal_description,
            'user_id' => Auth::id(),
            'department_id' => $request->department_id,
            'approve' => 1,
            'created_at' =>Carbon::now(),
        ]);
        if($request->hasFile('journal_image')){
            $journal_image = $request->file('journal_image');
            $image_name = $journal_id.".".$request->file('journal_image')->getClientOriginalExtension();
            $journal_image_location = 'public/uploads/journals/'.$image_name;
            Image::make($journal_image)->save(base_path($journal_image_location));
            Journal::findOrFail($journal_id)->update([
                'journal_image' => $image_name,
            ]);
        }
        if($request->hasFile('journal_file')){
            $path = $request->file('journal_file')->storeAs(
                'journals', $journal_id.".".$request->file('journal_file')->getClientOriginalExtension()
            );
            Journal::findOrFail($journal_id)->update([
                'journal_file' => $path,
            ]);
        }
        return redirect()->route('journal.index')->with('success', 'Journal Create Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        return view('admin.journal.edit', [
            'journal_info' => Journal::findOrFail($journal->id),
            'departments' => Department::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        $validation = $request->validate([
            'journal_name' => 'required',
            'journal_description' => 'required',
            'department_id' => 'required|numeric'
        ]);
        Journal::findOrFail($journal->id)->update([
            'journal_name' => $request->journal_name,
            'journal_description' => $request->journal_description,
            'user_id' => Auth::id(),
            'department_id' => $request->department_id,
            'approve' => 1,
            'created_at' =>Carbon::now(),
        ]);
        if($request->hasFile('journal_image')){
            if($journal->journal_image != "default.jpg"){
                $old_image_location = 'public/uploads/journals/'.$journal->journal_image;
                unlink(base_path($old_image_location));
            }
            $journal_image = $request->file('journal_image');
            $image_name = $journal->id.".".$request->file('journal_image')->getClientOriginalExtension();
            $journal_image_location = 'public/uploads/journals/'.$image_name;
            Image::make($journal_image)->save(base_path($journal_image_location));
            Journal::findOrFail($journal->id)->update([
                'journal_image' => $image_name,
            ]);
        }
        if($request->hasFile('journal_file')){
            if($journal->journal_file != "default.pdf"){
                Storage::delete($journal->journal_file);
            }
            $path = $request->file('journal_file')->storeAs(
                'journals', $journal->id.".".$request->file('journal_file')->getClientOriginalExtension()
            );
            Journal::findOrFail($journal->id)->update([
                'journal_file' => $path,
            ]);
        }
        return redirect()->route('journal.index')->with('success', 'Journal Edit Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        Journal::findOrFail($journal->id)->delete();
        return back()->with('delete', 'Delete SuccessFully');
    }

    public function assign(Request $request, $journal_id)
    {
        $email = $request->search;
        if($email != ""){
            return view('admin.journal.assign', [
                'searchs' => User::where('email', 'LIKE', $email)->get(),
                'journal_id' => $journal_id,
                'assigned' => AssignUser::with(['user', 'journal'])->where('journal_id', $journal_id)->get()
            ]);
        }else{
            return view('admin.journal.assign', [
                'assigned' => AssignUser::with(['user', 'journal'])->where('journal_id', $journal_id)->get(),
            ]);
        }
    }
    public function add(Request $request)
    {
        AssignUser::insert([
            'journal_id' => $request->journal_id,
            'user_id' => $request->user_id,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
    public function delete($id)
    {
        AssignUser::findOrFail($id)->delete();
        return back();
    }

}
