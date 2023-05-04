<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionsController extends Controller
{
    // Display a list of submissions
    public function index()
    {
        // dd('index');
        $submissions = DB::table('submissions')->get();
        return view('submissions.index', ['submissions' => $submissions]);
    }

    // Display the submission creation form
    public function create()
    {
        // dd('create');

        // $user_id = DB::table('accounts')->select('id')->where('email', session()->get('cuser'))->first();
        // $submission = DB::table('projects')->where('id', $user_id)->first();
        // $submission = DB::table('submissions')->where('id', $user_id)->first();
        return view('submissions.create');
    }

    // Store a new submission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'submission_date' => 'required|date',
            'add_date' => 'required|date',
            'total_marks' => 'required|numeric',
            'notes' => 'nullable',
        ]);

        DB::table('submissions')->insert($validatedData);

        return redirect()->route('submissions.index')->with('success', 'Submission created successfully!');
    }

    // Display a specific submission
    public function show($id)
    {
        // dd("show");
        $submission = DB::table('submissions')->where('id', $id)->first();

        return view('submissions.show', ['submission' => $submission]);
    }

    // Display the submission editing form
    public function edit($id)
    {
        $submission = DB::table('submissions')->where('id', $id)->first();

        return view('submissions.edit', ['submission' => $submission]);
    }

    // Update a specific submission
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'submission_date' => 'required|date',
            'add_date' => 'required|date',
            'earned_marks' => 'nullable',
            'total_marks' => 'required|numeric',
            'notes' => 'nullable',
        ]);

        DB::table('submissions')->where('id', $id)->update($validatedData);

        return redirect()->route('submissions.index')->with('success', 'Submission updated successfully!');
    }

    // Delete a specific submission
    public function destroy($id)
    {
        DB::table('submissions')->where('id', $id)->delete();

        return redirect('/submissions')->with('success', 'Submission deleted successfully!');
    }

    public function student_index(Type $var = null)
    {
        $submissions = DB::table('submissions')->get();
        return view('submissions.index', ['submissions' => $submissions]);
    }
    
    function student_upload_document(Type $var = null)
    {
        # code...
    }
}
