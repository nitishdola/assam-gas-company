@extends('layouts.accounts_user')
@section('title') Update Budget Head Transactions @stop


@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('budget_head_transaction.index') }}">Budget Heads Transaction</a>
</li>

<li>
	Update Your Budget Head Transaction
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($BudgetHeadTransaction, array('route' => ['budget_head_transaction.update', Crypt::encrypt($BudgetHeadTransaction->id)], 'id' => 'BudgetHeadTransaction_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('budget_head_transactions._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection
@section('pageJs') <script> load_sections(); </script> @stop



