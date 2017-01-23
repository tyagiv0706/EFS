<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Stock;
use App\Customer;
use Auth;

class StockController extends Controller
{
    public function index()
    {
        //
        $stocks=Stock::all();
        	        if(Auth::check())
        				return view('stocks.index',compact('stocks'));
        	        else
	        	        return view('/auth/login');
    }

    public function show($id)
    {

        $stock = Stock::findOrFail($id);

        return view('stocks.show',compact('stock'));
    }


    public function create()
    {

        $customers = Customer::lists('name','id');
        return view('stocks.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
	   'symbol' => 'required',
	   'name' => 'required',
	   'shares'=>'required',
	   'purchase_price'=>'required',
	   'purchased'=>'required',
	   ]);


       $stock= new Stock($request->all());
       $stock->save();

              return redirect('stocks');
    }

    public function edit($id)
    {
        $stock=Stock::find($id);
        return view('stocks.edit',compact('stock'));
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
        $stock= new Stock($request->all());
        $stock=Stock::find($id);
        $stock->update($request->all());
        return redirect('stocks');
    }

    public function destroy($id)
    {
        Stock::find($id)->delete();
        return redirect('stocks');
    }
}
