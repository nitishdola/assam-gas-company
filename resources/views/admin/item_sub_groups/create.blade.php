@extends('layouts.admin')
@section('title') Add a Item Sub Group @stop
@section('pageTitle') Add a Item Sub Group @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('item_sub_group.index') }}">Item Sub Groups</a>
</li>

<li>
	Add a Item sub group
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'item_sub_group.store', 'id' => 'item_sub_group.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.item_sub_groups._form')
			        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
			<div class="col-xs-2"></div>
			<div class="col-xs-6 pull-right">
			<h3>Latest Entries</h3>
			@if(count($results))
			<table class="table table-striped table-bordered table-advance table-hover">
			  <thead>
			      <tr>
			           <th>
                #
            </th>
            <th> Item Group </th>
            
            <th class="hidden-xs">
                Item Sub Group Name
            </th>
            
            <th>
                Item Sub Group Name Code
            </th>

           
            <th>
                Creation Time
            </th>
            <th>Edit</th>
            <th>Remove</th>
			      </tr>
			  </thead>
			  <tbody>
			  @foreach($results as $k => $v)
			  	<tr>
				   	<td> {{ $k+1 }} </td>
				  <td> {{ $v->item_group['name'] }} </td>
            <td class="hidden-xs"> {{ $v->name }} </td>
            <td> {{ $v->item_sub_group_code }} </td>
           
            <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
            <td> <a href="{{ route('item_sub_group.edit', Crypt::encrypt($v->id) ) }}" title="Edit Item Sub Group"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </td>
            <td> <a onclick="return confirm('Are you sure you want to delete this item sub group ?');" href="{{ route('item_sub_group.disable', Crypt::encrypt($v->id) ) }}" title="Remove Item Sub Group"><i class="fa fa-trash"></i>Remove</a> </td>
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