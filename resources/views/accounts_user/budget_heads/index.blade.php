@extends('layouts.accounts_user')
@section('title') All Budget Heads @stop
@section('pageTitle') All Budget Heads @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Budget Heads |<a class="btn btn-info" href="{{ route('budget_head.download') }}"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    <?php $count = 1; ?>
				<table class="table table-striped table-bordered table-advance table-hover">
				    <thead>
				        <tr>
				            <th>
				                #
				            </th>
				            <th class="hidden-xs">
				                Budget Head Name
				            </th>
				            <th>
				                Budget Head Code
				            </th>

				            <th>
				                Department
				            </th>
				            <th>
				                Section
				            </th>
				            <th>
				                Created By
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
				            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
				            <td class="hidden-xs"> {{ $v->name }} </td>
				            <td> {{ $v->budget_head_code }} </td>
				            <td> {{ $v->department['name'] }} </td>
				            <td> {{ $v->section['name'] }} </td>
				            <td> {{ $v->creator['name'] }} </td>
				            <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
				            <td> <a href="{{ route('budget_head.edit', Crypt::encrypt($v->id) ) }}" title="Edit Department" id="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
				            </td>
				            <td> <a onclick="return confirm('Are you sure you want to delete this Budget Head ?');" href="{{ route('BudgetHeads.disable', Crypt::encrypt($v->id) ) }}" title="Remove Budget Head"><i class="fa fa-trash-o fa-fw"></i>Remove</a> </td>
				        </tr>
				        @endforeach
				    </tbody>
				</table>
				<div class="pagination">
				{!! $results->render() !!}
				</div>
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Budget Head Found !
                </div>

                <a href="{{ route('budget_head.create') }}" class="btn btn-success">Add new Budget Head</a>
		    @endif
		</div>
	</div>
</div>
@endsection