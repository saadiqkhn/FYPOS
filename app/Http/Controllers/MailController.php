<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;
use DB;


class MailController extends Controller
{
    public function acceptInvite(Type $var = null)
    {
        dd("You have successfully accepted the invite");
    }
    
    public function sendMailInvite($emails, $cuser)
    {
        $name = "mate";
        
        $project = DB::select("select * from projects where member4=?",[$cuser]);
        // dd($project);
        $projectID = $project[0]->id;
        foreach ($emails as $email) {
            //The email sending is done using the to method on the Mail facade
            // dd($email);
            Mail::to($email)->send(new MailableName($name, $projectID));

        }
    }
}
