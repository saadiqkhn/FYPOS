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

    public function sendMailInvite($cuser)
    {
        $name = "mate";
        dd("mate");
        $user = DB::select("select * from projects where member4=?",[$cuser,$cuser,$cuser,$cuser]);
        
         //The email sending is done using the to method on the Mail facade
        Mail::to($user->member1)->send(new MailableName($name, $user->id));

         //The email sending is done using the to method on the Mail facade
         Mail::to($user->member2)->send(new MailableName($name, $user->id));

          //The email sending is done using the to method on the Mail facade
        Mail::to($user->member3)->send(new MailableName($name, $user->id));

         //The email sending is done using the to method on the Mail facade
         Mail::to($user->supervisor1)->send(new MailableName($name, $user->id));

          //The email sending is done using the to method on the Mail facade
        Mail::to($user->supervisor2)->send(new MailableName($name, $user->id));

    }
}
