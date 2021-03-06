@extends('layouts.accounts_user')
@section('title') Update Your Chargeable Account @stop


@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('chargeable_account.index') }}">Chargeable Account</a>
</li>



@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($ChargeableAccount, array('route' => ['chargeableaccount.update', Crypt::encrypt($ChargeableAccount->id)], 'id' => 'ChargeableAccount', 'class' => 'form-horizontal row-border')) !!}
		        @include('chargeable_accounts._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection
@section('pageJs') <script> load_sections(); </script> @stop



