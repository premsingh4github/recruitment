<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Member;
use Auth;
use Session;
use Input;
use App\History;
use DB;
use Redirect;
class MemberController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		
		return view('member.user');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('member.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		    $input = $request->input();
		    $data = $request->only('name','email','password','password_confirm','address','phone');
        $rules = array(
        	'name' =>'required',
        	'email' => 'required|email|unique:members',
        	'password' => 'required',
                'password_confirm' =>'required',
                'phone' => 'required|Numeric',
                'address' =>'required'
        	);
        $v= \Validator::make($data,$rules);
        if($v->fails()){
        	return view('member.create')->withErrors($v)
        				->withInput($data);
        } else {

        	if ($request['password'] != $request['password_confirm']) {
					Session::flash('cmessage','Your passwords do not match. Please type carefully.');
					return view('member.create')->withInput($data);
				}
			else{
		
			$password = $input['password'];
        	$password = \Hash::make($password);
        	$user = new \App\User;
        	$user->name = $input['name'];
        	$user->address = $input['address'];
        	$user->contactNumber = $input['phone'];
        	$user->type = $input['mtype'];
        	$user->email = $input['email'];
        	$user->password = $password;
        	$user->loginas = $input['mtype'];
        	$user->status = 1;
        	$user->save();
        	
        	Session::flash('message', 'Member has been registered successfully');
        	Session::flash('memberid', $input['mtype']);
           	return \Redirect::to('member/show');
           }
          }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 if (Session::has('memberid'))
		 {
		 	$id=Session::get('memberid');
		  }
		if($id==1)
		{
			$members = Member::where('type',1)->orderBy('id','desc')->paginate(10);
		}
		else if($id==3)
		{
		$members = Member::where('type',3)->orderBy('id','desc')->paginate(10);
		
		}else{
			$members = Member::where('type',2)->orderBy('id','desc')->paginate(10);
		}
		$members->setPath('');
		return view('member.index')->with('members',$members)->with('u',$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$memb = \DB::table('members')->whereId($id)->first();
		return view('member.edit')->with('memb',$memb);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$input = $request->input();
		$update= \DB::table('members')
            ->where('id', $id)
            ->update(['name' => $input['name'],'address' => $input['address'], 'contactNumber' => $input['phone'], 'type' => $input['mtype'], 'email' => $input['email']]);
           
            Session::flash('message', 'Updated successfully');
           Session::flash('memberid', $input['mtype']);
           	return \Redirect::to('member/show');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$deleteChecked = Input::get('member');	
			if($deleteChecked)
			{	
				return $deleteChecked;
			foreach($deleteChecked as $delete)
			{
			$memdel = \DB::table('members')->whereId($delete)->delete();
			}			
			}
			if($id!=0)
			{
				$memdel = \DB::table('members')->whereId($id)->delete();
			}
			return \Redirect::to('member');
	}
	public function block($id)
	{
		$ret=Member::where('id',$id)->first();
		if($ret->status==1)
		{
		$update= \DB::table('members')
            ->where('id', $id)
            ->update(['status' => 0]);
            
            Session::flash('blockmessage', 'Member has been blocked successfully');
        }else
        {
            $update= \DB::table('members')
            ->where('id', $id)
            ->update(['status' => 1]);
           
            Session::flash('unblockmessage', 'Member has been unblocked successfully');
        }
        Session::flash('memberid',$ret->type);
        return \Redirect::to('member/show');
	}
	
	
	public function get_notification_and_email()
	{
		
		return view('member.notification');
	}
	public function switchuser($sid)
	{
		// return $sid;
		if($sid==1)
		{
			$id = Auth::user()->id;
			$update= \DB::table('members')
            ->where('id', $id)
            ->update(['loginas' => 1]);
            Session::flash('message', 'Welcome Back to Admin Portal');
        	return \Redirect::to('home');
        }
        else if($sid==2)
        {
        	$id = Auth::user()->id;
			$update= \DB::table('members')
            ->where('id', $id)
            ->update(['loginas' => 2]);
            Session::flash('message', 'Welcome to Employer Portal');
        	return \Redirect::to('home');
        }
        else
        {
        	$id = Auth::user()->id;
			$update= \DB::table('members')
            ->where('id', $id)
            ->update(['loginas' => 3]);
            Session::flash('message', 'Welcome to Agent Portal');
        	return \Redirect::to('home');
        }
     }
     /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
     public function profile($id)
	{
		$agentp = DB::table('members')->whereId($id)->first();
		$profile= DB::table('memberprofile')->where('uid',$agentp->id)->first();
		return view('agent.index')->with('agentp',$agentp)->with('profile',$profile);
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile_edit($id)
	{
		
		$agentp = DB::table('members')->whereId($id)->first();
		return view('agent.edit')->with('agentp',$agentp);
	}

}
