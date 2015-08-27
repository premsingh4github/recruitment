<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Fieldofstudy;
use Redirect;
use Session;
use Input;
use App\History;
use Auth;
class FieldofstudyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fieldofstudy=Fieldofstudy::paginate(10);
		$fieldofstudy->setPath('fieldofstudy');
		return view('setting/fieldofstudy')->with('fieldofstudy',$fieldofstudy);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['fieldofstudyId']!=0)
		{
		$retfieldofstudy=Fieldofstudy::whereId($request['fieldofstudyId'])->first();
		if($retfieldofstudy)
		{
			$fieldofstudy=Fieldofstudy::find($request['fieldofstudyId']);
			$fieldofstudy->name = $request['name'];
			$fieldofstudy->save();
			Session::flash('message','fieldofstudy Updated Successfully');
		}
		}else{
			$fieldofstudy= new Fieldofstudy;
			$fieldofstudy->name = $request['name'];
			$fieldofstudy->save();
			Session::flash('message','fieldofstudy added Successfully');
				
		}
		return Redirect::to('fieldofstudy');
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
		$editfieldofstudy=Fieldofstudy::whereId($id)->first();
		$fieldofstudy=Fieldofstudy::paginate(10);
		$fieldofstudy->setpath('');
		return view('setting/fieldofstudy')->with('editfieldofstudy',$editfieldofstudy)->with('id',$id)->with('fieldofstudy',$fieldofstudy);
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
					$resumdel1 = Fieldofstudy::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
					
			}else{
				
			}
			return Redirect::to('fieldofstudy');
	}

}
