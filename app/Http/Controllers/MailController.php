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
        // dd("You have successfully accepted the invite");
        Session::put('projectID', $projectID);
        Session::put('email', $email);
        Session::put('member', $member);
        return redirect('/register');
    }
    
    public function sendMailInvite($emails, $cuser)
    {
        $name = "mate";
        
        $project = DB::select("select * from projects where member4=?",[$cuser]);
        $emails = $emails[0];
        $projectID = $project[0]->id;
            $member = 'member1';
            if(array_key_exists('member1', $emails))
            Mail::to($emails['member1'])->send(new MailableName($name, $projectID, $emails['member1'], $member));
            $member = 'member2';
            if(array_key_exists('member2', $emails))
            Mail::to($emails['member2'])->send(new MailableName($name, $projectID, $emails['member2'], $member));
            $member = 'member3';
            if(array_key_exists('member3', $emails))
            Mail::to($emails['member3'])->send(new MailableName($name, $projectID, $emails['member3'], $member));
            $member = 'supervisor1';

            if(array_key_exists('supervisor1', $emails))
            Mail::to($emails['supervisor1'])->send(new MailableName($name, $projectID, $emails['supervisor1'], $member));
            $member = 'supervisor2';

            if(array_key_exists('supervisor2', $emails))
            Mail::to($emails['supervisor2'])->send(new MailableName($name, $projectID, $emails['supervisor2'], $member));


    }
}
