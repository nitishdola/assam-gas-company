<?php $accept = false; ?>
<div class="box box-primary" style="padding:20px;">
  <div class="box-body item-view">
    <h4>Purchase Indent Details</h4>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Number</b> </div>
          <div class="col-md-6"> {{$info->purchase_indent_number}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Date</b> </div>
          <div class="col-md-6"> {{ date('d-m-Y', strtotime($info->purchase_indent_date)) }}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Reference Number </b></div>
          <div class="col-md-6">{{$info->reference_number}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Reference Date</b> </div>
          <div class="col-md-6">{{ date('d-m-Y', strtotime($info->reference_date)) }} </div>
        </div>

        @if($info->remarks)
        <div class="col-xs-12">
          <div class="col-md-2 no-padding"><strong> Remarks</strong></div>
          <div class="col-md-6 no-padding">
            {{ $info->remarks }}
          </div>
        </div>
        @endif

      </div>

      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Budget Head</b> </div>
          <div class="col-md-6 no-padding">{{$info->budget_head['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Store Control No</b> </div>
          <div class="col-md-6 no-padding">{{$info->store_control_number }} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Prepared By </b></div>
          <div class="col-md-6 no-padding">{{$info->creator['name']}} </div>
        </div>

        @if($info->checker['name'])
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Checked By </b></div>
          <div class="col-md-6 no-padding">{{$info->checker['name']}} </div>
        </div>
        @endif

        @if($info->approved_by['name'])
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Approved By HOD </b></div>
          <div class="col-md-6 no-padding">{{$info->approved_by['name']}} </div>
        </div>
        @endif

        <div class="col-xs-12">
          <div class="col-md-6 no-padding"><strong> Justification for Purchase</strong></div>
          <div class="col-md-6 no-padding">
            {{ $info->justification_of_the_purchase }}
          </div>
        </div>

      </div>





      <div class="col-xs-4 col-md-offset-4">

          <?php if($info->approval_hod_id == NULL && $info->approval_hod_date == NULL){ ?>
            @if($info->checked_by != NULL && $info->checked_on != NULL)
              <a href="{{ route('purchase_indent.approve', Crypt::encrypt($info->id)) }}" onclick="return confirm('Are you sure you want to Approve this indent ?');" class="btn btn-danger">Verify This Purchase Indent ( by HOD )</a>
            @elseif($info->checked_by == NULL && $info->checked_on == NULL)
              <a href="{{ route('purchase_indent.check', Crypt::encrypt($info->id)) }}"  onclick="return confirm('Are you sure you want to Check this indent ?');" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Check This Purchase Indent</a>
            @endif
          <?php }else{
            $accept = true;
          } ?>
        </div>

    </div>
  </div>

  <div class="box-body item-view">
    <h4>Requisition Details</h4>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Number</b> </div>
          <div class="col-md-6"> {{$info->requisition['requisition_number']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Department</b> </div>
          <div class="col-md-6"> {{$info->requisition->department['name']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Job Number </b></div>
          <div class="col-md-6">{{$info->requisition['job_number']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
          <div class="col-md-6">{{$info->requisition['nature_of_work']}} </div>
        </div>


      </div>

      <div class="col-md-6">


        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
          <div class="col-md-6 no-padding">{{$info->requisition['financial_year']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Raised By </b></div>
          <div class="col-md-6 no-padding">{{$info->requisition->department_user['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Issued By </b></div>
          <div class="col-md-6 no-padding">{{$info->requisition->department_user_hod['name']}} </div>
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
          <th>Add Quotation Values/ Direct Purchase</th>
        </tr>
      </thead>

      <tbody>
        @foreach($purchase_indent_items as $k => $v)
        <tr>
          <td> {{ $k+1 }} </td>
          <td> {{$v['requisition_item']['item_measurement']->item_name}} </td>
          <td> {{$v['requisition_item']['item_measurement']['measurement_unit']->name}} </td>
          <td> {{$v->requisition_item->item_measurement['stock_in_hand']}} </td>
          <td> {{$v->requisition_item['store_description']}} </td>
          <td> {{$v->requisition_item['quantity_demanded']}} </td>
          <td> {{$v->requisition_item['rate']}} </td>
          <td> {{$v->requisition_item['remarks']}} </td>
          <td>
            @if($accept)
              @if(!count($v->quotation_values) && !count($v->previous_rates) && !$v->nits)
                <!-- <a href="{{ route('quotation_values.create', Crypt::encrypt($v->id)) }}" class="btn btn-info"><b>Add Quotation Values <i class="fa fa-plus-square" aria-hidden="true"></i> </b></a> -->
                <a href="{{ route('nit.create', Crypt::encrypt($v->id)) }}" class="btn btn-info"><b>Generate NIT <i class="fa fa-plus-square" aria-hidden="true"></i> </b></a>
                <a href="{{ route('add.previous_rates', Crypt::encrypt($v->id)) }}" class="btn btn-warning"><b>Purchase Directly <i class="fa fa-plus-square" aria-hidden="true"></i> </b></a>
             @else
                @if(!$v->nits)
                  <a href="{{ route('quotation_values.create', Crypt::encrypt($v->id)) }}" class="btn btn-info"><b>Add Quotation values for NIT <i class="fa fa-plus-square" aria-hidden="true"></i> </b></a>
                @elseif(!$v->q_accepted)
                  <a href="{{ route('quotation_values.view', Crypt::encrypt($v->id)) }}" class="btn btn-info"><b>VIEW COMPARATIVE CHART <i class="fa fa-search-plus" aria-hidden="true"></i> </b></a>
                @else
                  <a href="{{ route('quotation_values.view', Crypt::encrypt($v->id)) }}" class="btn btn-info"><b>Receive Item <i class="fa fa-search-plus" aria-hidden="true"></i> </b></a>
                @endif


                @if(count($v->previous_rates))
                  VIEW COMPARATIVE CHART
                @endif
             @endif
            <!-- <a href="{{ route('quotation_values.view', Crypt::encrypt($v->id)) }}" class="btn btn-info"><b>View Quotation Values <i class="fa fa-plus-square" aria-hidden="true"></i> </b></a> -->
            @else
            <a alt="Indent must be checked by department/HOD to add NIT rates or previous rates !" href="javascript:void()" class="btn btn-success disabled"><b>Indent not yet checked <i class="fa fa-meh-o" aria-hidden="true"></i> </b></a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
