@extends('layouts.app')

@section('content')
    <h1>Mutual Funds</h1>
    <a href="{{url('/mutualfunds/create')}}" class="btn btn-success">Create Mutual Fund</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Cust No</th>
            <th>Cust Name</th>
            <th>Name</th>
            <th>units</th>
            <th>Purchase price</th>
            <th>Purchase Date</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($mutualfunds as $mutualfunds)
            <tr>
                <td>{{ $mutualfunds->customer->cust_number }}</td>
                <td>{{ $mutualfunds->customer->name }}</td>
                <td>{{ $mutualfunds->name }}</td>
                <td>{{ $mutualfunds->units }}</td>
                <td>{{ $mutualfunds->purchase_price }}</td>
                <td>{{ $mutualfunds->purchased }}</td>
                <td><a href="{{url('mutualfunds',$mutualfunds->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('mutualfunds.edit',$mutualfunds->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['mutualfunds.destroy', $mutualfunds->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

