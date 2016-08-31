<?php $count = 1; ?>
<table class="table table-striped table-bordered table-advance table-hover">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th class="hidden-xs">
                Department
            </th>
            <th> Section Name </th>
            <th>
                Section Code
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
            <td> {{ $v->department['name'] }} </td>
            <td class="hidden-xs"> {{ $v->name }} </td>
            <td> {{ $v->section_code }} </td>
            <td> {{ $v->creator['name'] }} </td>
            <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
            <td> <a href="{{ route('section.edit', Crypt::encrypt($v->id) ) }}" title="Edit Section"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </td>
            <td> <a onclick="return confirm('Are you sure you want to delete this section ?');" href="{{ route('section.disable', Crypt::encrypt($v->id) ) }}" title="Remove Section"><i class="fa fa-trash-o fa-fw"></i>Remove</a> </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
{!! $results->render() !!}
</div>