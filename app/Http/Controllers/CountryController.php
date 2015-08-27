<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Country;
use Redirect;
use Session;
use Input;
use App\History;
use Auth;
class CountryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$country=Country::paginate(10);
		$country->setPath('country');
		return view('setting/country')->with('country',$country);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['countryId']!=0)
		{
		$retcountry=Country::whereId($request['countryId'])->first();
		if($retcountry)
		{
			$country=Country::find($request['countryId']);
			$country->name = $request['name'];
			$country->save();
			Session::flash('message','Country Updated Successfully');
		}
		}else{
			$country= new Country;
			$country->name = $request['name'];
			$country->save();
			Session::flash('message','Country added Successfully');
				
		}
		return Redirect::to('country');
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
		$editcountry=Country::whereId($id)->first();
		$country=Country::paginate(10);
		$country->setpath('');
		return view('setting/country')->with('editcountry',$editcountry)->with('id',$id)->with('country',$country);
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
					$resumdel1 = Country::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
				
			}else{
				
			}
			return Redirect::to('country');
	}

}
