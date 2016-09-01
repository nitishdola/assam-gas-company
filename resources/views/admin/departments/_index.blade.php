<?php $count = 1; ?>

<table class="table table-striped table-bordered table-advance table-hover">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th class="hidden-xs">
                Department Name
            </th>
            <th>
                Department Code
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
            <td> {{ $v->department_code }} </td>
            <td> {{ $v->creator['name'] }} </td>
            <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
            <td> <a href="{{ route('department.edit', Crypt::encrypt($v->id) ) }}" title="Edit Department"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </td>
            <td> <a onclick="return confirm('Are you sure you want to delete this department ?');" href="{{ route('department.disable', Crypt::encrypt($v->id) ) }}" title="Remove Department"><i class="fa fa-trash-o fa-fw"></i>Remove</a> </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
{!! $results->render() !!}
</div>