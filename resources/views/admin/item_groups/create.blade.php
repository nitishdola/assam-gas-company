@extends('layouts.admin')
@section('title') Add a item group @stop
@section('pageTitle') Add a item group @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('item_group.index') }}">Item Groups</a>
</li>

<li>
	Add a Item group
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'item_group.store', 'id' => 'item_group.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.item_groups._form')
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
			              Item Group Name
			          </th>
			          <th>
			              Item Group Code
			          </th>
			          <th>Edit</th>
			      </tr>
			  </thead>
			  <tbody>
			  @foreach($results as $k => $v)
			  	<tr>
				   	<td> {{ $k+1 }} </td>
				    <td class="hidden-xs"> {{ $v->name }} </td>
				    <td> {{ $v->department_code }} </td>
				    <td> <a href="{{ route('department.edit', Crypt::encrypt($v->id) ) }}" title="Edit Department">Edit</a>
				    </td>
			    </tr>
			  @endforeach
			  </tbody>
			</table>
			<a href="{{ route('department.index') }}" class="btn btn-info"> View All</a>
			@else
			<h5> No entries yet </h5>
			@endif

			</div>
		</div>
	</div>
</div>
@endsection