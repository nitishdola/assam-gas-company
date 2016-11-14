<div class="box box-primary">
  <div class="box-body item-view">
    <div class="row">
      <div class="col-md-5">
        <div class="col-md-12 item-field">
          <div class="col-md-4"><i class="fa fa-gg"></i><b> Requisition Number</b> </div>
          <div class="col-md-4"> {{$info->requisition_number}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-4"><i class="fa fa-gg"></i><b> Department</b> </div>
          <div class="col-md-4"> {{$info->department['name']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-4"><i class="fa fa-gg"></i><b> Department Code</b> </div>
          <div class="col-md-4"> {{$info->department['department_code']}}</div>
        </div>


        <div class="col-md-12 item-field">
          <div class="col-md-4"><i class="fa fa-gg"></i> <b>Job Number </b></div>
          <div class="col-md-4">{{$info->job_number}} </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-4 no-padding"><i class="fa fa-gg"></i><b> Chargeable Account</b> </div>
          <div class="col-md-4 no-padding">{{$info->chargeable_account['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-4 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
          <div class="col-md-4 no-padding">{{$info->financial_year}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-4"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
          <div class="col-md-4">{{$info->nature_of_work}} </div>
        </div>
      </div>
    </div>
  </div>

  <hr class="style13">
  <div class="box-body item-view">
    <table class="table table-striped">
      <thead>
        <tr>
          <th> # </th>
          <th> Item ( Code ) </th>
          <th> Description of Stores </th>
          <th> Unit</th>
          <th> Stock in Hand </th>
          <th> Quantity Demanded </th>
          <th> Quantity Issued </th>
          <th> Rate </th>
          <th> Remarks </th>
          <th> Current Status </th>
        </tr>
      </thead>

      <tbody>
        @foreach($requisition_items as $k => $v)
        <tr id="row_{{$v->id}}">
          <td>{{ $k+1 }}</td>
          <td>{{$v->item_measurement['item_name']}} (<b> {{$v->item_measurement['item_code']}} </b> )</td>
          <td> {{ $v->store_description}}</td>
          <td> {{ $v->item_measurement['measurement_unit']->name}}</td>
          <td> {{ $v->item_measurement['stock_in_hand']}}</td>
          <td> {{ $v->quantity_demanded}}</td> 
          <td> {{ $v->quantity_issued}}</td>
          <td> {{ $v->rate}}</td>
          <td> {{ $v->remarks}}</td>
          <td  id="current_status_{{$v->id}}"> 
          @if($v->current_status == 'issued')
          <a onclick="receiveItem({{ $v->id }})" href="javascript:void(0)" class="btn btn-success btn-xs">Receive</a> 
          @else
          {{ ucwords(str_replace('_', ' ',$v->current_status)) }} </td>
          @endif

        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="row">
      <hr>
      <div class="col-md-12">
        <div class="col-md-3 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Issued By</b> </div>
          <div class="col-md-6"> {{$info->requisition_number}}</div>
        </div>

        <div class="col-md-3 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Authorize for Issue By</b> </div>
          <div class="col-md-6"> {{$info->department['name']}}</div>
        </div>

        <div class="col-md-3 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Issued By</b> </div>
          <div class="col-md-6"> {{$info->department['department_code']}}</div>
        </div>

        <div class="col-md-3 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Received By</b> </div>
          <div class="col-md-6"> {{$info->department['department_code']}}</div>
        </div>

      </div>
    </div>

  </div>
</div>
