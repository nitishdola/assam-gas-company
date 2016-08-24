@extends('layouts.accounts_user')
@section('title') Add a Budget Head Transactions @stop
@section('pageTitle') Add a Budget Head Transactions @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('budget_head_transaction.index') }}">Budget Transaction</a>
</li>

<li>
	Create a Budget Head
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'budget_head_transaction.store', 'id' => 'budget_head_transation.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('budget_head_transactions._form')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Add', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>


@endsection