@extends('layouts.admin')
@section('title') Add a Rack @stop
@section('pageTitle') Add a Rack @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'rack.store', 'id' => 'rack.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.racks._form')
			        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
			<div class="col-xs-2"></div>
			<div class="col-xs-5 pull-right">
			<h3>Latest Entries</h3>
			@if(count($results))
			<table class="table table-striped table-bordered table-advance table-hover">
			  <thead>
			      <tr>
			          <th>
			              #
			          </th>
			          <th class="hidden-xs">
			              Rack Name
			          </th>
			          <th>Edit</th>
			      </tr>
			  </thead>
			  <tbody>
			  @foreach($results as $k => $v)
			  	<tr>
				   	<td> {{ $k+1 }} </td>
				    <td class="hidden-xs"> {{ $v->name }} </td>
				    <td> <a href="{{ route('rack.edit', Crypt::encrypt($v->id) ) }}" title="Edit rack"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
				    </td>
			    </tr>
			  @endforeach
			  </tbody>
			</table>
			<a href="{{ route('rack.index') }}" class="btn btn-info"> View All</a>
			@else
			<h5> No entries yet </h5>
			@endif

			</div>
		</div>
	</div>
</div>
@endsection