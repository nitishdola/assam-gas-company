@extends('layouts.accounts_user')
@section('title') Update Your Budget Head @stop


@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('budget_head.index') }}">Budget Heads</a>
</li>



@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($BudgetHead, array('route' => ['head.update', Crypt::encrypt($BudgetHead->id)], 'id' => 'BudgetHead_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('budget_heads._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection



