@extends('layouts.admin')
@section('title') Add a measurement unit @stop
@section('pageTitle') Add a measurement unit @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'measurement_unit.store', 'id' => 'measurement_unit.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.measurement_units._form')
			        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
			<div class="col-xs-2"></div>
			<div class="col-xs-4 pull-right">
			<h3>Latest Entries</h3>
			@if(count($results))
			<table class="table table-striped table-bordered table-advance table-hover">
			  <thead>
			      <tr>
			          <th>
			            #
			          </th>
			          <th class="hidden-xs">
			            Measurement Unit Name
			          </th>
			          <th>
			            Code
			          </th>
			          <th>Edit</th>
			      </tr>
			  </thead>
			  <tbody>
			  @foreach($results as $k => $v)
			  	<tr>
				   	<td> {{ $k+1 }} </td>
				    <td class="hidden-xs"> {{ $v->name }} </td>
				    <td> {{ $v->measurement_unit_code }} </td>
				    <td> <a href="{{ route('measurement_unit.edit', Crypt::encrypt($v->id) ) }}" title="Edit Unit">Edit</a>
				    </td>
			    </tr>
			  @endforeach
			  </tbody>
			</table>
			<a href="{{ route('measurement_unit.index') }}" class="btn btn-info"> View All</a>
			@else
			<h5> No entries yet </h5>
			@endif

			</div>
		</div>
	</div>
</div>
@endsection