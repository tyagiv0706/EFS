@extends('layouts.app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
      </table>
    </div>

	<div class="container">	
	<br>
	<?php
    $stotal = 0;
	$investment_initial =0;
	$investment_current =0;
	$mftotal=0;
	$initialportfolio=0;
	$currentportfolio=0;
	?>

	<h2>Stocks </h2>

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
				<th>Total Stock Value</th>
               </tr>
            </thead>
            <tbody>
                @foreach($customer->stocks as $stock)
                    <tr>
                        <td>{{ $stock->symbol }}</td>
                        <td>{{ $stock->name }}</td>
                        <td>{{ $stock->shares }}</td>
                        <td>{{ $stock->purchase_price }}</td>
                        <td>{{ $stock->purchased }}</td>
                        <td> <?php echo '$'. $stock['shares']*$stock['purchase_price'];
                            $stotal = $stotal + $stock['shares'] * $stock['purchase_price']?>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
		
		<h5>
            <?php echo 'Total Stock Portfolio - $' , number_format($stotal,2) ; ?>
        </h5>
</div>

<div class="container">	
	<h2>Investments </h2>
            <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Category </th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value</th>
				<th>Recent Date</th>
               </tr>
            </thead>
            <tbody>
                @foreach($customer->investments as $investment)
                    <tr>
                        <td>{{ $investment->category }}</td>
                        <td>{{ $investment->description }}</td>
                        <td>{{ $investment->acquired_value }}
						<?php $investment_initial = $investment_initial + $investment['acquired_value'] ?>
						</td>
                        <td>{{ $investment->acquired_date }}</td>
                        <td>{{ $investment->recent_value }}
						<?php
                        $investment_current = $investment_current + $investment['recent_value']
                        ?>
						</td>
						
                        <td>{{ $investment->recent_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
		
		<h5>
            <?php echo 'Total Initial Investment Portfolio - $' ,number_format( $investment_initial,2); ?>
            <br>
			<br>
            <?php echo 'Total Current Investment Portfolio - $' ,number_format( $investment_current,2); ?>
        </h5>
    </div>
	
	<div class="container">	
	<br>
	
	
	<h2>Mutual Funds</h2>

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Mutual Fund Name</th>
                <th>Number of units</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
				<th>Mutual Funds Value</th>
               </tr>
            </thead>
            <tbody>
                @foreach($customer->mutualfunds as $mutualfunds)
                    <tr>
                        <td>{{ $mutualfunds->name }}</td>
                        <td>{{ $mutualfunds->units }}</td>
                        <td>{{ $mutualfunds->purchase_price }}</td>
                        <td>{{ $mutualfunds->purchased }}</td>
						<td> <?php echo '$'. $mutualfunds['units']*$mutualfunds['purchase_price'];
						$mftotal = $mftotal + $mutualfunds['units'] * $mutualfunds['purchase_price'] ?>
                        </td>
                   
                    </tr>
                @endforeach
            </tbody>
</table>

<h5>
          <?php echo 'Total of Mutual funds Portfolio - $' , number_format($mftotal,2) ; ?>
</h5>
    
<br>
	<br>
	<div class="table table-striped table-bordered table-hover">
	 
     <h4><b> Summary of Portfolio <b></h4>
	 			<br>
		<?php $initialportfolio = $investment_initial +   $stotal + $mftotal ;
				$currentportfolio = $investment_current+$stotal+$mftotal;		?>
		<?php echo 'Total of Initial Portfolio - $' , number_format ($initialportfolio,2) ; ?>
        
		<br>
		<br>
		<?php echo 'Total of Current Portfolio - $' , number_format ($currentportfolio,2) ; ?>
		
		
		</div>

</div>
		
@stop


