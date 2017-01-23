<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Investment;
use App\Stock;
use App\Customer;
use Auth;

class InvestmentController extends Controller
{
     public function index()
	    {

	        $investments=Investment::all();
	        if(Auth::check())
	        	        return view('investments.index',compact('investments'));
	        else
	        	        return view('/auth/login');

	    }

	    public function show($id)
	    {

	        $investment = Investment::findOrFail($id);

	        return view('investments.show',compact('investment'));
	    }


	    public function create()
	    {

	        $customers = Customer::lists('name','id');
	        return view('investments.create', compact('customers'));
	    }

	    /**
	     * Store a newly created resource in storage.
	     *
	     * @return Response
	     */
	    public function store(Request $request)
	    {

		$this->validate($request, [
	   'category' => 'required',
	   'description' => 'required',
	   'acquired_value'=>'required',
	   'acquired_date'=>'required',
	   'recent_value'=>'required',
	   'recent_date'=>'required',
   ]);

	       $investment= new Investment($request->all());
	       $investment->save();

	              return redirect('investments');
	    }

	    public function edit($id)
	    {
	        $investment=Investment::find($id);
	        return view('investments.edit',compact('investment'));
	    }

	    /**
	     * Update the specified resource in storage.
	     *
	     * @param  int  $id
	     * @return Response
	     */
	    public function update($id,Request $request)
	    {
	        //
	        $investment= new Investment($request->all());
	        $investment=Investment::find($id);
	        $investment->update($request->all());
	        return redirect('investments');
	    }

	    public function destroy($id)
	    {
	        Investment::find($id)->delete();
	        return redirect('investments');
    }
}
