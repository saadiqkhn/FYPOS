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
        $submissions = DB::table('submissions')->where('project_id', session()->get('project_id'))->get();
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
            'project_id' => 'required|numeric',
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
        $email = session()->get('cuser');
        $project = DB::table('projects')->where('member1', $email)->orWhere('member2', $email)->orWhere('member3', $email)->orWhere('member4', $email)->first();
        $submissions = DB::table('submissions')->where('project_id',$project->id)->get();
        $data = $this->getsidebar();
		return view("uploadsubmissions.index",['submissions' => $submissions, 'guides'=>$data['guides'], 'members'=>$data['members'],'supervisors'=>$data['supervisors'],'days'=>$data['days'] , 'notification'=>$data['notification'], 'user'=>$data['user']]);


        
    }

    public function student_upload_document(Request $request, $id)
{
    dd($request, 'student_upload_document');
    $submission = DB::table('submissions')->where('id', $id)->first();

    if ($request->hasFile('document')) {
        $filename = $request->file('document')->getClientOriginalName();
        $request->file('document')->storeAs('uploads', $filename);
    }

    return redirect()->route('uploadsubmissions.index', $id)->with('success', 'Document uploaded successfully.');
}


public function showToStudent($id)
{
    $submissions = DB::table('submissions')->where('project_id',$id)->get();

    if (!$submissions) {
        return redirect()->back()->with('error', 'Submission not found.');
    }
// dd($submissions);
    // return view('submissions.show-student', compact('submissions'));
    $data = $this->getsidebar();
    return view("submissions.show-student",['submissions' => $submissions, 'guides'=>$data['guides'], 'members'=>$data['members'],'supervisors'=>$data['supervisors'],'days'=>$data['days'] , 'notification'=>$data['notification'], 'user'=>$data['user']]);

}







public function uploadDocument(Request $request, $id)
{
    dd($request , 'uploadDocument');
    $submission = DB::table('submissions')->where('id', $id)->first();

    if ($request->hasFile('document')) {
        $filename = $request->file('document')->getClientOriginalName();
        $request->file('document')->storeAs('uploads', $filename);
    }

    return redirect()->route('submissions.show_student', $id)->with('success', 'Document uploaded successfully.');
}

public function storeDocument(Request $request, $id)
{
    // dd($id);
    // Get the submission
    $submission = DB::table('submissions')->where('id', $id)->first();
    // Check if the submission exists
    if (!$submission) {
        return redirect()->back()->with('error', 'Submission not found.');
    }

    // Validate the file
    $request->validate([
        'document' => 'required|file|max:2048',
    ]);
    

    // dd($request->validate);

    // Store the file
    $file = $request->file('document');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->storeAs('public/documents/'.$id, $fileName);

    // Save the file name to the database
    DB::table('submissions')->where('id', $id)->update([
        'document' => $fileName,
        'date_submitted' => date("Y/m/d"),

    ]);

    // $submission = DB::table('submissions')->where('id', $id)->first();
// dd($submission);
    return  redirect()->route('submissions.show_student', $submission->project_id);
}






public function projectOverview()
{
    $totalSubmissions = DB::table('submissions')->count();
    dd($totalSubmissions);

    return view('dashboard.project-overview', ['totalSubmissions' => $totalSubmissions]);
}


public function mandview()
{
    // You can retrieve any data you need here and pass it to the view
    // For now, let's assume you don't need additional data
    return view('marks_review');
}




}
