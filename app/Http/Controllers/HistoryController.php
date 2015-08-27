<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\PersonalInformation;
use App\Demand;
use App\Member;
use Redirect;
use App\History;
use Input;
use Session;
use Auth;
use App\EmployerApproval;
class HistoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->type==1 && Auth::user()->loginas==1)
		{
		$admin=count(Member::select('id')->where('type',1)->get());
		$employer=count(Member::select('id')->where('type',2)->get());
		$agent=count(Member::select('id')->where('type',3)->get());
		$adminblock=count(Member::select('id')->whereTypeAndStatus(1,0)->get());
		$employerblock=count(Member::select('id')->whereTypeAndStatus(2,0)->get());
		$agentblock=count(Member::select('id')->whereTypeAndStatus(3,0)->get());
		$resume=count(PersonalInformation::select('id')->get());
		$resumerequest=count(PersonalInformation::select('id')->where('approved_by','!=',0)->get());
		$resumeapproved=count(PersonalInformation::select('id')->where('approval_status',1)->get());
		$demand=count(Demand::select('id')->get());

		return view('history.index')->with('admin',$admin)
		->with('employer',$employer)
		->with('agent',$agent)
		->with('adminblock',$adminblock)
		->with('employerblock',$employerblock)
		->with('agentblock',$agentblock)
		->with('resume',$resume)
		->with('resumerequest',$resumerequest)
		->with('resumeapproved',$resumeapproved)
		->with('demand',$demand);
		}else if(Auth::user()->loginas==2)
		{

		$resume=count(PersonalInformation::select('id')->get());
		$resumerequest=count(EmployerApproval::select('apid')->whereEmpid(Auth::user()->id)->get());
		$resumeapproved=count(PersonalInformation::select('id')->whereApproval_statusAndApproved_by(1,Auth::user()->id)->get());
		$demand=count(Demand::select('id')->whereEid(Auth::user()->id)->get());

		return view('history.index')->with('resume',$resume)
									->with('resumerequest',$resumerequest)
									->with('resumeapproved',$resumeapproved)
									->with('demand',$demand);
		}else{

		$resume=count(PersonalInformation::select('id')->where('agent_id',Auth::user()->id)->get());
		$resumerequest=count(PersonalInformation::select('id')->where('agent_id',Auth::user()->id)->where('approved_by','!=',0)->get());
		$resumeapproved=count(PersonalInformation::select('id')->where('agent_id',Auth::user()->id)->where('approval_status',1)->get());
		$demand=count(Demand::select('id')->get());

		return view('history.index')->with('resume',$resume)
									->with('resumerequest',$resumerequest)
									->with('resumeapproved',$resumeapproved)
									->with('demand',$demand);
		}
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		
		if($request['todate'])
		{
			$tdate=date("Y-m-d h:m:s",strtotime($request['todate']));
		}else{
			$tdate=date("Y-m-d h:m:s");

		}
		if($request['fromdate'])
		{
			$fdate=date("Y-m-d h:m:s",strtotime($request['fromdate']));
		}else{
			$fdate=date("Y-m-d h:m:s");
		}
		if(Auth::user()->type==1 && Auth::user()->loginas==1)
		{
		$admin=count(Member::select('id')->where('type',1)->whereBetween('created_at',[$fdate,$tdate])->get());
		$employer=count(Member::select('id')->where('type',2)->whereBetween('created_at',[$fdate,$tdate])->get());
		$agent=count(Member::select('id')->where('type',3)->whereBetween('created_at',[$fdate,$tdate])->get());
		$adminblock=count(Member::select('id')->whereTypeAndStatus(1,0)->whereBetween('created_at',[$fdate,$tdate])->get());
		$employerblock=count(Member::select('id')->whereTypeAndStatus(2,0)->whereBetween('created_at',[$fdate,$tdate])->get());
		$agentblock=count(Member::select('id')->whereTypeAndStatus(3,0)->whereBetween('created_at',[$fdate,$tdate])->get());
		$resume=count(PersonalInformation::select('id')->whereBetween('created_at',[$fdate,$tdate])->get());
		$resumerequest=count(PersonalInformation::select('id')->where('approved_by','!=',0)->whereBetween('created_at',[$fdate,$tdate])->get());
		$resumeapproved=count(PersonalInformation::select('id')->where('approval_status',1)->whereBetween('created_at',[$fdate,$tdate])->get());
		$demand=count(Demand::select('id')->whereBetween('created_at',[$fdate,$tdate])->get());

		return view('history.index')->with('admin',$admin)
		->with('employer',$employer)
		->with('agent',$agent)
		->with('adminblock',$adminblock)
		->with('employerblock',$employerblock)
		->with('agentblock',$agentblock)
		->with('resume',$resume)
		->with('resumerequest',$resumerequest)
		->with('resumeapproved',$resumeapproved)
		->with('demand',$demand);
		}else if(Auth::user()->loginas==2)
		{

		$resume=count(PersonalInformation::select('id')->whereBetween('created_at',[$fdate,$tdate])->get());
		$resumerequest=count(EmployerApproval::select('apid')->whereEmpid(Auth::user()->id)->whereBetween('created_at',[$fdate,$tdate])->get());
		$resumeapproved=count(PersonalInformation::select('id')->whereApproval_statusAndApproved_by(1,Auth::user()->id)->whereBetween('created_at',[$fdate,$tdate])->get());
		$demand=count(Demand::select('id')->whereEid(Auth::user()->id)->whereBetween('created_at',[$fdate,$tdate])->get());

		return view('history.index')->with('resume',$resume)
									->with('resumerequest',$resumerequest)
									->with('resumeapproved',$resumeapproved)
									->with('demand',$demand);
		}else{

		$resume=count(PersonalInformation::select('id')->where('agent_id',Auth::user()->id)->whereBetween('created_at',[$fdate,$tdate])->get());
		$resumerequest=count(PersonalInformation::select('id')->where('agent_id',Auth::user()->id)->where('approved_by','!=',0)->whereBetween('created_at',[$fdate,$tdate])->get());
		$resumeapproved=count(PersonalInformation::select('id')->where('agent_id',Auth::user()->id)->where('approval_status',1)->whereBetween('created_at',[$fdate,$tdate])->get());
		$demand=count(Demand::select('id')->whereBetween('created_at',[$fdate,$tdate])->get());

		return view('history.index')->with('resume',$resume)
									->with('resumerequest',$resumerequest)
									->with('resumeapproved',$resumeapproved)
									->with('demand',$demand);
		}
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deletehistory = Input::get('list');	
		if($deletehistory)
		{		
			foreach($deletehistory as $delete)
			{
				$historydel = History::where('id',$delete)->delete();
			}
			Session::flash('message','Successfully deleted');
		}else{

		}		
		
		return Redirect::to('history');
	}

}
