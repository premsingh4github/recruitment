<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Industry;
use Redirect;
use Session;
use Input;
use App\History;
use Auth;
class IndustryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$industry=Industry::paginate(10);
		$industry->setPath('industry');
		return view('setting/industry')->with('industry',$industry);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['industryId']!=0)
		{
		$retindustry=Industry::whereId($request['industryId'])->first();
		if($retindustry)
		{
			$industry=Industry::find($request['industryId']);
			$industry->name = $request['name'];
			$industry->save();
			Session::flash('message','Industry Updated Successfully');
		}
		}else{
			$industry= new Industry;
			$industry->name = $request['name'];
			$industry->save();
			Session::flash('message','Industry added Successfully');
					
		}
		return Redirect::to('industry');
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
		$editindustry=Industry::whereId($id)->first();
		$industry=Industry::paginate(10);
		$industry->setpath('');
		return view('setting/industry')->with('editindustry',$editindustry)->with('id',$id)->with('industry',$industry);
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
					$resumdel1 = Industry::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
					
			}else{
				
			}
			return Redirect::to('industry');
	}

}
