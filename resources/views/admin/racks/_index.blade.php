<?php $count = 1; ?>
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
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $k => $v)
        <tr>
            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
            <td class="hidden-xs"> {{ $v->name }} </td>
            <td> <a href="{{ route('rack.edit', Crypt::encrypt($v->id) ) }}" title="Edit rack">Edit</a>
            </td>
            <td> <a onclick="return confirm('Are you sure you want to delete this rack ?');" href="{{ route('rack.disable', Crypt::encrypt($v->id) ) }}" title="Remove rack"><i class="fa fa-trash"></i>Remove</a> </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
{!! $results->render() !!}
</div>