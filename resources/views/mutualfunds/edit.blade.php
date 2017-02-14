@extends('layouts.app')
@section('content')
    <h1>Update Mutual fund</h1>
    {!! Form::model($mutualfunds,['method' => 'PATCH','route'=>['mutualfunds.update',$mutualfunds->id]]) !!}
     <div class="form-group">
        {!! Form::label('name', 'Mutual Fund Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        {!! Form::label('symbol', 'Symbol:') !!}
        {!! Form::text('symbol',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('units', 'Units:') !!}
        {!! Form::text('units',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('purchase_price', 'Purchase Price:') !!}
        {!! Form::text('purchase_price',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('purchased', 'Purchase Date:') !!}
        {!! Form::text('purchased',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop

