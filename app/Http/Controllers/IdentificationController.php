<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Identification;
use Redirect;
use Session;
use Input;
use App\History;
use Auth;

class IdentificationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$identification=Identification::paginate(10);
		$identification->setPath('identification');
		return view('setting/identification')->with('identification',$identification);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['identificationId']!=0)
		{
		$retidentification=Identification::whereId($request['identificationId'])->first();
		if($retidentification)
		{
			$identification=Identification::find($request['identificationId']);
			$identification->name = $request['name'];
			$identification->save();
			Session::flash('message','Identification Updated Successfully');
		}
		}else{
			$identification= new Identification;
			$identification->name = $request['name'];
			$identification->save();
			Session::flash('message','Identification added Successfully');
				
		}
		return Redirect::to('identification');
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
		$editidentification=Identification::whereId($id)->first();
		$identification=Identification::paginate(1);
		$identification->setpath('');
		return view('setting/identification')->with('editidentification',$editidentification)->with('id',$id)->with('identification',$identification);
	
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
					$resumdel1 = Identification::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
					
			}else{
				
			}
			return Redirect::to('identification');
	}

}
