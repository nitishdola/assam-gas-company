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
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Nature of Work</b> </div>
          <div class="col-md-6">{{$info->nature_of_work}} </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="style13">
  <div class="box-body item-view">
    <h4><u>Items Required</u></h4>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Item</th>
          <th>Measurement Unit</th>
          <th>Item Code</th>
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
          <td>{{$v->item_measurement['item_code']}}</td>
          <td>{{$v->item_measurement['stock_in_hand']}}</td>
          <td>{{$v->store_description}}</td>
          <td id="qty_dem_{{$v->id}}">{{$v->quantity_demanded}}</td>
          <td>{{$v->rate}}</td>
          <td>{{$v->remarks}}</td>
          <td>
            <!--
              If Item is arrived & not sent to HOD for authorized
            !-->
            @if($v->current_status == 'at_inventory')
            <a href="#" class="btn btn-success">Send to HOD for Authorization</a>
            <!--
              If Item sent to HOD for authorize & not yet authorize
            !-->
            @elseif($v->current_status == 'sent_to_hod')
            <a href="" class="btn btn-success">Authorize for Issue</a>
            <!--
              If Item is authorized for Issue
            !-->
            @elseif($v->current_status == 'authorized_for_issue')
            <button type="button" class="btn btn-primary" onclick="showModal({{$v->id}})">ISSUE ITEM</button>
            @endif

            @if($v->current_status == 'at_inventory')
            <a href="#" class="btn btn-danger">Item Not Available</a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script>
function showModal( id ) {
    $('#item_required').val($('#qty_dem_'+id).text());
    $('#item_issued').val($('#qty_dem_'+id).text());
    $('#exampleModal').modal('show');
}
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">ISSUE </h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Item Required :</label>
            <input type="text" readonly class="form-control" id="item_required">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Item Issued :</label>
            <input type="text" class="form-control" id="item_issued">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">ISSUE</button>
      </div>
    </div>
  </div>
</div>
