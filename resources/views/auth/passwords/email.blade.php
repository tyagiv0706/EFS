@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Password Help</div>
				<center>
				<body style="background-color:powderblue;">
				To Reset your password call our customer support.
				<h5>We believe that the customers are our number one priority at all times!!</h5>
				 <br> <font color= "DeepSkyBlue"><marquee>Reach Us Anytime 24X7, 365 Days</marquee> </font>
				 </center>
				 <br> <br> <br> <br>
				 Customer Support: 1-877.463.4233
				 <br>
				 Email:support@efs.com
				
				
				
               <!-- <div class="panel-body"> 
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>-->
            </div>
        </div>
    </div>
</div>
@endsection
