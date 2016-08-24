@extends('layouts.accounts_user')
@section('title') All Budget Heads @stop
@section('pageTitle') All Budget Head Transaction @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Budget Heads
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
				                Budget Head
				            </th>

				            <th>
				                Department
				            </th>
				            <th>
				                Section
				            </th>
				            <th>
				                Budget Amount
				            </th>
				            <th>
				                Reserve Amount
				            </th>
				            <th>
				                Utilized Amount
				            </th>
				            <th>
				                Financial Year
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
				            <td> {{ $v->budget_head['name'] }} ( {{ $v->budget_head['budget_head_code'] }}) </td>
				            <td> {{ $v->department['name'] }} </td>
				            <td> {{ $v->section['name'] }} </td>
				            <td> {{ $v->budget_head_amount }} </td>
				           	<td> {{ $v->budget_head_reserve_amount }} </td>
				           	<td> {{ $v->budget_head_utilized_amount }} </td>
				           	<td> {{ $v->financial_year }} </td>
				            <td> {{ $v->creator['name'] }} </td>
				            <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
				            <td> <a href="{{ route('budget_head_transaction.edit', Crypt::encrypt($v->id) ) }}" title="Edit Transaction">Edit</a>
				            </td>
				            <td> <a onclick="return confirm('Are you sure you want to delete this Transaction ?');" href="{{ route('budget_head_transaction.disable', Crypt::encrypt($v->id) ) }}" title="Remove Transaction"><i class="fa fa-trash"></i>Remove</a> </td>
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
                  No Transactions Found !
                </div>

                <a href="{{ route('department.create') }}" class="btn btn-success">Add new Department</a>
		    @endif
		</div>
	</div>
</div>
@endsection