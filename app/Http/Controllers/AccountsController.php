<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon; 
use File;
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
                return view("dashboard.teacherdashboard");
            }

    			
    	}
    	else
    	{
    		
    		//return session()->get('cuser');
    		return back()->with('message',"Wrong Credentials");
    	}

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
    	DB::insert("insert into accounts values(?,?,?,?,?)",[null,$req->userfullname,$req->email,$req->userpassword,$req->role]);
    	return view("login");

    }
    public function projectentry()
    {
    	return view('projectentry');
    }

    public function doprojectentry(Request $req)
    {
    	//return $req->all();
    	$data1 = DB::select("select * from accounts where email=? and role=1",[$req->m1]);
    	if(!$data1)
    	{
    		return redirect()->back()->with('pmess', $req->m1 . " not registered yet or Student");
    	}
    	$data2 = DB::select("select * from accounts where email=? and role=1",[$req->m2]);
    	if(!$data2)
    	{
    		return redirect()->back()->with('pmess', $req->m2 . " not registered yet or Student");
    	}
    	$data3 = DB::select("select * from accounts where email=? and role=1",[$req->m3]);
    	if(!$data3)
    	{
    		return redirect()->back()->with('pmess', $req->m3 . " not registered yet or Student");
    	}

    	$sup1 = DB::select("select * from accounts where email=? and role=2",[$req->s1]);
    	if(!$sup1)
    	{
    		return redirect()->back()->with('pmess', $req->s1 . " not registered yet or Teacher");
    	}
    	$sup2 = DB::select("select * from accounts where email=? and role=2",[$req->s2]);
    	if(!$sup2)
    	{
    		return redirect()->back()->with('pmess', $req->s2 . " not registered yet or Teacher");
    	}
    	//return $req->cuser;

    	DB::insert("insert into projects values(?,?,?,?,?,?,?,?,?)",[
    		null,$req->ptitle,$req->m1,$req->m2,$req->m3,$req->cuser,$req->s1,$req->s2,$req->pddate]);

    	return redirect('/studentdashboard');

    }
    public function studentdashboard(Request $req)
    {
        $cuser = session()->get("cuser");
        $user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$cuser,$cuser,$cuser,$cuser]);
                if($user)
                {
                    $members =[$user[0]->member1,$user[0]->member2,$user[0]->member3,$user[0]->member4];
                    $supervisors =[$user[0]->supervisor1,$user[0]->supervisor2];
                    $pdate = $user[0]->pddate;
                    $today = Carbon::now();                 
                    //$interval = $pdate->diff($today);
                    $days =  $today->diffInDays($pdate);
                    

                    
                    return view("dashboard.index",compact('members','supervisors','days'));
                
                
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

    public function Uploaddocument(Request $request)
    {
        
    	$file =  $request->myfile;
    	$filename =  $file->getClientOriginalName();
    	$cuser = session()->get('cuser');
    			$user = DB::select("select * from projects where member1=? or member2=? or member3=? or member4=?",[$cuser,$cuser,$cuser,$cuser]);
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

         if(File::isDirectory($path)){

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
         

    }
        return back()
            ->with('success','You have successfully upload Document.');
            
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
