<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Currency;
use Redirect;
use Session;
use Input;
use App\History;
use Auth;
class currencyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$currency=Currency::paginate(10);
		$currency->setPath('currency');
		return view('setting/currency')->with('currency',$currency);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['currencyId']!=0)
		{
		$retcurrency=Currency::whereId($request['currencyId'])->first();
		if($retcurrency)
		{
			$currency=Currency::find($request['currencyId']);
			$currency->name = $request['name'];
			$currency->save();
			Session::flash('message','currency Updated Successfully');
		}
		}else{
			$currency= new Currency;
			$currency->name = $request['name'];
			$currency->save();
			Session::flash('message','currency added Successfully');
					
		}
		return Redirect::to('currency');
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
		$editcurrency=Currency::whereId($id)->first();
		$currency=Currency::paginate(10);
		$currency->setpath('');
		return view('setting/currency')->with('editcurrency',$editcurrency)->with('id',$id)->with('currency',$currency);
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
					$resumdel1 = Currency::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
					
			}else{
				
			}
			return Redirect::to('currency');
	}

}
