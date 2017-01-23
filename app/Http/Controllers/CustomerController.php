<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
use App\Investment;
use App\Stock;
use App\mutualfunds;
use Auth;


class CustomerController extends Controller
{
    public function index()
    {

        $customers=Customer::all();
        	        if(Auth::check())
        				return view('customers.index',compact('customers'));
        	        else
	        	        return view('/auth/login');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show',compact('customer'));
    }


    public function create()
    {
        return view('customers.create');
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
	   'address' => 'required',
	   'city'=>'required',
	   'state'=>'required',
	   'zip'=>'required',
	   'email'=>'required',
	   'home_phone'=>'required',
	   'cell_phone'=>'required',
	   ]);

       $customer= new Customer($request->all());
       $customer->save();

	   return redirect('customers');
    }

    public function edit($id)
    {
        $customer=Customer::find($id);
        return view('customers.edit',compact('customer'));
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
        $customer= new Customer($request->all());
        $customer=Customer::find($id);
        $customer->update($request->all());
        return redirect('customers');
    }

    public function destroy($id)
    {
      		//Deleting all stocks of the customer.
	        $stocks = Stock::where('customer_id', $id)->lists('id');

	        foreach ($stocks as $stock) {
	                Stock::find($stock)->delete();
	            }

	        //Deleting all investments of the customer.
	        $investments = Investment::where('customer_id', $id)->lists('id');

	        foreach ($investments as $investment) {
	                Investment::find($investment)->delete();
	                }

	        //Deleting all funds of the customer.
	        $mutualfunds = mutualfunds::where('customer_id', $id)->lists('id');

	        foreach ($mutualfunds as $mutualfund) {
	                mutualfunds::find($mutualfund)->delete();
                }

    	    Customer::find($id)->delete();
    	    return redirect('customers');
    }

    public function stringify($id)
    {
       // $customer=Customer::where('id', $id)->select('customer_id','name','address','city','state','zip','home_phone','cell_phone')->first();
        $customer = Customer::where('cust_number', $id)->select('cust_number','name','address','city','state','zip','home_phone','cell_phone')->first();

        $customer = $customer->toArray();
        return response()->json($customer);
    }

}
