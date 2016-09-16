<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\mutualfunds;
use App\Customer;

class MutualfundController extends Controller
{
    public function index()
    {
        
        $mutualfunds=mutualfunds::all();
        return view('mutualfunds.index',compact('mutualfunds'));
    }

    public function show($id)
    {
        
        $mutualfunds = mutualfunds::findOrFail($id);

        return view('mutualfunds.show',compact('mutualfunds'));
    }


    public function create()
    {

        $customers = Customer::lists('name','id');
        return view('mutualfunds.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)   
    {
		$this->validate($request, [
        'name' => 'required',
        'units' => 'required',
		'purchase_price' => 'required',
		'purchased' => 'required',        
    ]);
	
       $mutualfunds= new mutualfunds($request->all());
       $mutualfunds->save();

       return redirect('mutualfunds');
    }

    public function edit($id)
    {
        $mutualfunds=mutualfunds::find($id);
        return view('mutualfunds.edit',compact('mutualfunds'));
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
        $mutualfunds= new mutualfunds($request->all());
        $mutualfunds=mutualfunds::find($id);
        $mutualfunds->update($request->all());
        return redirect('mutualfunds');
    }

    public function destroy($id)
    {
        mutualfunds::find($id)->delete();
        return redirect('mutualfunds');
    }

}
