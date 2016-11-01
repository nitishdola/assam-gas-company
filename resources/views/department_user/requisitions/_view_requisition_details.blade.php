<div class="box box-primary">
  <div class="box-body item-view">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Number</b> </div>
          <div class="col-md-6"> {{$info->requisition_number}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Department</b> </div>
          <div class="col-md-6"> {{$info->department['name']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Job Number </b></div>
          <div class="col-md-6">{{$info->job_number}} </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Chargeable Account</b> </div>
          <div class="col-md-6 no-padding">{{$info->chargeable_account['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
          <div class="col-md-6 no-padding">{{$info->financial_year}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
          <div class="col-md-6">{{$info->nature_of_work}} </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="style13">
  <div class="box-body item-view">
    <h4>Items Required</h4>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Item</th>
          <th>Measurement Unit</th>
          <th>Stock in Hand</th>
          <th>Description</th>
          <th>Quantity Demanded</th>
          <th>Previous Rate</th>
          <th>Remarks</th>
        </tr>
      </thead>

      <tbody>
        @foreach($requisition_items as $k => $v)
        <tr>
          <td>{{ $k+1 }}</td>
          <td>{{$v->item_measurement['item_name']}}</td>
          <td>{{$v->item_measurement['measurement_unit']->name}}</td>
          <td>{{$v->item_measurement['stock_in_hand']}}</td>
          <td>{{$v->store_description}}</td>
          <td>{{$v->quantity_demanded}}</td>
          <td>{{$v->rate}}</td>
          <td>{{$v->remarks}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
