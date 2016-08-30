<?php $count = 1; ?>
<table class="table table-striped table-bordered table-advance table-hover">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th class="hidden-xs">
                Unit Name
            </th>
            <th>
                Unit Code
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
            <td> {{ $v->measurement_code }} </td>
            <td> {{ $v->creator['name'] }} </td>
            <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
            <td> <a href="{{ route('measurement_unit.edit', Crypt::encrypt($v->id) ) }}" title="Edit Unit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </td>
            <td> <a onclick="return confirm('Are you sure you want to delete this unit ?');" href="{{ route('measurement_unit.disable', Crypt::encrypt($v->id) ) }}" title="Remove Unit"><i class="fa fa-trash"></i>Remove</a> </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
{!! $results->render() !!}
</div>