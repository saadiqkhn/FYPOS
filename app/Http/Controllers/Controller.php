<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Session;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getsidebar(){
		$guides = DB::select("select * from guidelines inner join projects where guidelines.prjid=projects.id");
		
		$length = count($guides);

        $cuser = session()->get("cuser");

		$myvisits_length = DB::select("select guideline_views from accounts where email=? ", [$cuser]);

		if($length > $myvisits_length[0]->guideline_views )
		{
			$notification = true;
			 // DB::table('accounts')->where('email', $cuser )->update(['guideline_views' => $length]);
		}
		else{
			$notification = false;
		}
		// dd($notification);
        $user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$cuser,$cuser,$cuser,$cuser]);
            //    dd($user);
		if($user)
		{
			$members =[$user[0]->member1,$user[0]->member2,$user[0]->member3,$user[0]->member4];
			$supervisors =[$user[0]->supervisor1,$user[0]->supervisor2];
			$pdate = $user[0]->pddate;
			$today = Carbon::now();                 
			//$interval = $pdate->diff($today);
			$days =  $today->diffInDays($pdate);
			return ['guides'=>$guides, 'members'=>$members,'supervisors'=>$supervisors,'days'=>$days , 'notification'=>$notification, 'user'=>$user];
			
		}


	}
}
