@extends('layouts.accounts_user')
@section('title') Add a Chargeable Account @stop
@section('pageTitle') Add a Chargeable Account @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('section.index') }}">Sections</a>
</li>

<li>
	Create a Chargeable Account
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'chargeable_account.store', 'id' => 'chargeable_account.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('chargeable_accounts._form')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Add Account', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection