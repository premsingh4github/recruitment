<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Qualification;
use Redirect;
use Session;
use Input;
use App\History;
use Auth;
class QualificationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$qualification=Qualification::paginate(10);
		$qualification->setPath('qualification');
		return view('setting/qualification')->with('qualification',$qualification);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['qualificationId']!=0)
		{
		$retqualification=Qualification::whereId($request['qualificationId'])->first();
		if($retqualification)
		{
			$qualification=qualification::find($request['qualificationId']);
			$qualification->name = $request['name'];
			$qualification->save();
			Session::flash('message','qualification Updated Successfully');
		}
		}else{
			$qualification= new Qualification;
			$qualification->name = $request['name'];
			$qualification->save();
			Session::flash('message','qualification added Successfully');
				
		}
		return Redirect::to('qualification');
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
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$editqualification=Qualification::whereId($id)->first();
		$qualification=Qualification::paginate(10);
		$qualification->setpath('');
		return view('setting/qualification')->with('editqualification',$editqualification)->with('id',$id)->with('qualification',$qualification);
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
		$deleteChecked = Input::get('list');	
			if($deleteChecked)
			{		
				foreach($deleteChecked as $delete)
				{
					$resumdel1 = Qualification::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
					
			}else{
				
			}
			return Redirect::to('qualification');
	}

}
