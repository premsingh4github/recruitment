<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Demand;
use Auth;
use DB;
use Redirect;
use App\DemandDelete;
use Input;
use App\History;
use Session;
class DemandController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$eid=Auth::user()->id;
		$dem = Demand::where('eid',$eid)->where('status',1)->orderBy('id','desc')->paginate(20);
		$dem->setPath('dem');
		// return $dem;
		return view('employer.demand')->with('dem',$dem);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('employer.demand_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		 $input = $request->input();
		    $data = $request->only('title','no_vacancy','qualification','location');
        $rules = array(
        	'title' =>'required',
        	'no_vacancy' => 'required',
        	'qualification' => 'required',
                'location' =>'required'
               
        	);
        $v= \Validator::make($data,$rules);
        if($v->fails()){
        	return view('employer.demand_create')->withErrors($v)
        				->withInput($data);
        } else {
		$eid=Auth::user()->id;
		$insert= new Demand;
		$insert->eid = $eid;
		$insert->title = $input['title'];
		$insert->no_vacancy = $input['no_vacancy'];
		$insert->qualification = $input['qualification'];
		$insert->location = $input['location'];
		$insert->status = 1;
		$insert->description = $input['description'];
		$insert->save();
		
		Session::flash('message','Demand Created Successfully');
           	return \Redirect::to('demand');
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
		$deman = \DB::table('demand')->whereId($id)->first();
		return view('employer.demand_edit')->with('deman',$deman);
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
		$update= DB::table('demand')
            ->where('id', $id)
            ->update(['title' => $input['title'],'no_vacancy' => $input['no_vacancy'], 'qualification' => $input['qualification'], 'location' => $input['location'], 'description' => $input['description']]);
          
		Session::flash('message','Demand Updated Successfully');
            return \Redirect::to('demand');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
			$deleteChecked = Input::get('demand');	
			if($deleteChecked)
			{		

		if(Auth::user()->type==3||Auth::user()->loginas==3)
		{
			foreach($deleteChecked as $delete)
			{				
			$insert= new Demanddelete;
			$insert->userId = Auth::user()->id;
			$insert->demandId = $delete;
			$insert->save();
			}
			
			Session::flash('message','Demand deleted Successfully');		
		    return Redirect::to('demand_view');
		}else{
			foreach($deleteChecked as $delete)
			{
			$memdel = DB::table('demand')->whereId($delete)->update(['status' => 0]);
			}
			
			Session::flash('message','Demand deleted Successfully');
			return Redirect::to('demand');
		}
		}
		if($id!=0)
		{
			if(Auth::user()->type==3||Auth::user()->loginas==3)
			{
				$insert= new Demanddelete;
				$insert->userId = Auth::user()->id;
				$insert->demandId = $id;
				$insert->save();
				Session::flash('message','Demand deleted Successfully');		
		   		 return Redirect::to('demand_view');

			}else{

					$memdel = DB::table('demand')->whereId($id)->update(['status' => 0]);
					Session::flash('message','Demand deleted Successfully');
					return Redirect::to('demand');
			}

		}
	}
}
