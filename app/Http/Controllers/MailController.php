<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use DB;


class MailController extends Controller
{
    public function acceptInvite($projectID, $email, $member)
    {

        Session::put('projectID', $projectID);
        Session::put('email', $email);
        Session::put('member', $member);
        $user = DB::table('accounts')->where('email', $email)->first();
        if($member == 'member1' || $member == 'member2' || $member == 'member3')
        {
            $students = DB::table('projects')->where('member1', $email)->orWhere('member2', $email)->orWhere('member3', $email)->first();
        
            if($students != null)
            {
                dd($email," STUDENT already exists");
            }
        }
        // dd("You have successfully accepted the invite", $projectID, $email, $member);
        
        if($user != null)
        {
        
            DB::insert("UPDATE projects SET $member = '$email' WHERE id = $projectID");

            return redirect('/login');   

        }
        else
        {
            return redirect('/register');
        }
    }
    
    public function sendMailInvite($emails, $cuser)
    {
        $name = "mate";
        
        $project = DB::select("select * from projects where member4=?",[$cuser]);
        $emails = $emails[0];
        $projectID = $project[0]->id;
            $member = 'member1';
            if($emails['member1'] != null)
            {
                Mail::to($emails['member1'])->send(new MailableName($name, $projectID, $emails['member1'], $member));
            }
            $member = 'member2';
            if($emails['member2'] != null)
            {
                Mail::to($emails['member2'])->send(new MailableName($name, $projectID, $emails['member2'], $member));
            }
            $member = 'member3';
            if($emails['member3'] != null)
            {
                Mail::to($emails['member3'])->send(new MailableName($name, $projectID, $emails['member3'], $member));
            }
            $member = 'supervisor1';

            if($emails['supervisor1'] != null)
            {
                Mail::to($emails['supervisor1'])->send(new MailableName($name, $projectID, $emails['supervisor1'], $member));
            }
            $member = 'supervisor2';

            if($emails['supervisor2'] != null)
            {
                Mail::to($emails['supervisor2'])->send(new MailableName($name, $projectID, $emails['supervisor2'], $member));
            }


    }
}
