@extends('layouts.accounts_user')
@section('title') Add a Budget Head @stop
@section('pageTitle') Add a Budget Head @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('budget_head.index') }}">Budget Heads</a>
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
			    {!! Form::open(array('route' => 'budget_head.store', 'id' => 'budget_head.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('budget_heads._form')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Add Budget Head', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection
@section('pageJs') <script> load_sections(); </script> @stop