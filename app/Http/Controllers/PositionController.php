<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\position;
use Redirect;
use Session;
use Input;
use App\History;
use Auth;
class PositionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$position=Position::paginate(10);
		$position->setPath('position');
		return view('setting/position')->with('position',$position);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if($request['positionId']!=0)
		{
		$retposition=Position::whereId($request['positionId'])->first();
		if($retposition)
		{
			$position=Position::find($request['positionId']);
			$position->name = $request['name'];
			$position->save();
			Session::flash('message','position Updated Successfully');
		}
		}else{
			$position= new Position;
			$position->name = $request['name'];
			$position->save();
			Session::flash('message','position added Successfully');
				
		}
		return Redirect::to('position');
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
		$editposition=Position::whereId($id)->first();
		$position=Position::paginate(10);
		$position->setpath('');
		return view('setting/position')->with('editposition',$editposition)->with('id',$id)->with('position',$position);
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
					$resumdel1 = Position::where('id',$delete)->delete();
				}
				Session::flash('message','Successfully deleted');
				
			}else{
				
			}
			return Redirect::to('position');
	}

}
