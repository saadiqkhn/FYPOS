<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon; 
use File;
use App\Http\Controllers\MailController;

class AccountsController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }
    public function login()
    {
    	return view('login');
    }
    public function dologin(Request $req)
    {
    	$data = DB::select("select * from accounts where email=? and password=? and role=?",[$req->email,$req->password,$req->role]);
    	if($data)
    	{
    		if($data[0]->role==1)
    		{

    			session()->put('cuser',$req->email);
                session()->put('userrole',$req->role);
    			$user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$req->email,$req->email,$req->email,$req->email]);
    		    if($user)
    		    {
    		    	$members =[$user[0]->member1,$user[0]->member2,$user[0]->member3,$user[0]->member4];
    		    	$supervisors =[$user[0]->supervisor1,$user[0]->supervisor2];
    		    	$pdate = $user[0]->pddate;
    		    	$today = Carbon::now();    		    	
    		    	//$interval = $pdate->diff($today);
    		    	$days =  $today->diffInDays($pdate);
					// return redirect('/studentdashboard');
    		    	return view("dashboard.index",compact('members','supervisors','days'));
                
    		    }
    		    else
    		    {
    			return redirect('/projectentry');
    		    }
    		}
    		elseif($data[0]->role==2)
            {
                session()->put('cuser',$req->email);
                session()->put('userrole',$req->role);
        		$projects = DB::table('projects')->where('supervisor1', $req->email)->orWhere('supervisor2', $req->email)->get();
				
                return view("dashboard.select-project", ['projects' => $projects]);
            }
    	}
    	else
    	{
    		//return session()->get('cuser');
    		return back()->with('message',"Wrong Credentials");
    	}

    }

	public function godashboard($project_id)
	{
		session()->put('project_id',$project_id);
       	return view("dashboard.teacherdashboard");
	}
    public function register()
    {
    	return view('register');
    }
    public function doregister(Request $req)
    {
    	//return $req->all();
    	$req->validate(
    		[
    			"userfullname"=>"required",
    			"email"=>"required|unique:accounts",
    			"userpassword"=>"required|min:6"
    		]);

		if($req->projectID != null && $req->member != null){
			DB::insert("UPDATE projects SET $req->member = '$req->email' WHERE id = $req->projectID");
		}
    	DB::insert("insert into accounts values(?,?,?,?,?)",[null,$req->userfullname,$req->email,$req->userpassword,$req->role]);
    	return redirect()->route('login');

    }
    public function projectentry()
    {
		$email = session()->get('cuser');
		$user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$email,$email,$email,$email]);
		if(!$user){
			return view('projectentry');
		}
		else{
			return redirect('/studentdashboard')->with('project already registered');
		}
    }

    public function doprojectentry(Request $req)
    {
		$mailArray = array();
		array_push($mailArray , ['member1'=>$req->member1, 'member2'=>$req->member2, 'member3'=>$req->member3, 'supervisor1'=>$req->supervisor1, 'supervisor2'=>$req->supervisor2]);
		
		// only one user resgitser one project
		$userExist = DB::select("select * from projects where member4=?",[$req->cuser]);
		
		if(!$userExist){
			DB::insert("insert into projects values(?,?,?,?,?,?,?,?,?)",[null,$req->ptitle,null,null, null,$req->cuser,null,null,$req->pddate]);
				$mailer = new MailController;
				$mailer->sendMailInvite($mailArray, $req->cuser);
			return redirect('/studentdashboard');
		}
		else{
			return redirect()->back()->with("Project Already Exist");
		}
    	
    }
    public function studentdashboard(Request $req)
    {

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
		// dd($cuser);
        $user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$cuser,$cuser,$cuser,$cuser]);
                if($user)
                {
                    $members =[$user[0]->member1,$user[0]->member2,$user[0]->member3,$user[0]->member4];
                    $supervisors =[$user[0]->supervisor1,$user[0]->supervisor2];
                    $pdate = $user[0]->pddate;
                    $today = Carbon::now();                 
                    //$interval = $pdate->diff($today);
                    $days =  $today->diffInDays($pdate);
                    

                    
                    return view("dashboard.index",compact('members','supervisors','days' , 'notification'));
                
                
                }


    	//return view('dashboard.index');
    }
    public function signout()
    {
    	session()->flush();
    	return redirect("/login");
    }
    public function documentsubmission()
    {
    			$cuser = session()->get('cuser');
    			$user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$cuser,$cuser,$cuser,$cuser]);
    		    if($user)
    		    {
    		    	$members =[$user[0]->member1,$user[0]->member2,$user[0]->member3,$user[0]->member4];
    		    	$supervisors =[$user[0]->supervisor1,$user[0]->supervisor2];
    		    	
    		    	return view("dashboard.documentupload",compact('members','supervisors'));
    		    }



    	return view("dashboard.documentupload");
    }

    public function uploaddocument(Request $request)
    {
    	$file =  $request->myfile;
    	$filename =  $file->getClientOriginalName();
    	$cuser = session()->get('cuser');
    			$user = DB::select("select * from projects where member4=?",[$cuser]);
    	$pid = $user[0]->id;	


        $path = public_path('uploads/');
        /*if(File::exists($path . $pid))
        {
        	dd( $path . $pid);
        }
        else
        {
        	dd ($path);
        }*/
		// dd ($path);
        //  if(File::isDirectory($path)){

        	if(File::exists(public_path('uploads/'.$pid)))
        	{
        	$file->move($path .  $pid . "/" , $filename);
        		
        	}
        	else
        	{
        	File::makeDirectory($path . $pid, 0777, true, true);
        	
        
        	$file->move($path .  $pid . "/" , $filename);
        	}
        /* Store $imageName name in DATABASE from HERE */
         

    // }
        return back()
            ->with('success','You have successfully uploaded Document.');
            
    }

    public function guidelines()
    {
        $data = DB::select("select * from projects");

        return view("dashboard.guidelines",compact('data'));
    }
    public function postguidelines(Request $req)
    {
        $data =[
            null,
            $req->teacher,
            $req->prjid,
            $req->prjguides
        ];
        DB::insert("insert into guidelines values(?,?,?,?)",$data);
        return back();
        
    }

    public function generalguidelines(Request $req)
    {


                $cuser = session()->get('cuser');
                $user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$cuser,$cuser,$cuser,$cuser]);
                if($user)
                {
                    $members =[$user[0]->member1,$user[0]->member2,$user[0]->member3,$user[0]->member4];
                    $supervisors =[$user[0]->supervisor1,$user[0]->supervisor2];
                    
                    
                }




        $guides = DB::select("select * from guidelines inner join projects where guidelines.prjid=projects.id");
        return view('dashboard.generalguidelines',compact('members','supervisors','guides'));
    }
}
