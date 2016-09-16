@extends('layouts.app')
@section('content')
    <h1>Mutual Funds </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Mutual Fund Name</td>
                <td><?php echo ($mutualfunds['name']); ?></td>
            </tr>
            <tr>
                <td>Number of Mutual Funds</td>
                <td><?php echo ($mutualfunds['units']); ?></td>
            </tr>
            <tr>
                <td>Purchase Price </td>
                <td><?php echo ($mutualfunds['purchase_price']); ?></td>
            </tr>
            <tr>
                <td>Date Purchased</td>
                <td><?php echo ($mutualfunds['purchased']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

