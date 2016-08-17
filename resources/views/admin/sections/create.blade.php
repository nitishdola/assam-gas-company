@extends('layouts.admin')
@section('title') Add a Section @stop
@section('pageTitle') Add a Section @stop

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
	Create a Section
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'section.store', 'id' => 'sections.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.sections._form')
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
			          <th> Department</th>
			          <th class="hidden-xs">
			              Section Name
			          </th>
			          <th>
			              Section Code
			          </th>
			          <th>Edit</th>
			      </tr>
			  </thead>
			  <tbody>
			  @foreach($results as $k => $v)
			  	<tr>
				   	<td> {{ $k+1 }} </td>
				   	<td class="hidden-xs"> {{ $v->department['name'] }} </td>
				    <td class="hidden-xs"> {{ $v->name }} </td>
				    <td> {{ $v->department_code }} </td>
				    <td> <a href="{{ route('department.edit', Crypt::encrypt($v->id) ) }}" title="Edit Section">Edit</a>
				    </td>
			    </tr>
			  @endforeach
			  </tbody>
			</table>
			<a href="{{ route('section.index') }}" class="btn btn-info"> View All</a>
			@else
			<h5> No entries yet </h5>
			@endif

			</div>
		</div>
	</div>
</div>
@endsection