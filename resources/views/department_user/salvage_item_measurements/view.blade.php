
@extends('layouts.department_user')

@section('pageTitle') View Item @stop
<style>
  .item-field{padding: 6px 0;background: #f6f6f6;margin-bottom: 4px;}
  h4 {text-align: center;padding: 15px 0;text-decoration: underline;}

 
</style>

@section('content')
<div class="row">
  <div class="col-md-12">

  <button type="button" class="btn btn-info"><a href="{{ route('salvage_item_measurement.edit', Crypt::encrypt($info->id) ) }}">Edit</a></button>
<button type="button" class="btn btn-info"><a href="{{ route('salvage_item_measurement.index', Crypt::encrypt($info->id) ) }}">Back</a></button>
    <div class="box box-primary">
        <div class="box-body item-view">
          <h4><b>Item Measurement</b> </h4>


              <div class="row">
              <div class="col-md-6" style="padding-left:5px; padding-right:0px;">
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Item Code</b> </div>
                  <div class="col-md-6"> {{ $info->item_code }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Barcode</b> </div>
                  <div class="col-md-6"> {{ $info->barcode }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> <b>Item Name </b></div>
                  <div class="col-md-6"> {{ $info->item_name }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b>Item Description</b> </div>
                  <div class="col-md-6"> {{ $info->item_description }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> <b>Part Number</b> </div>
                  <div class="col-md-6"> {{ $info->part_number }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b>Manufacturer</b></div>
                  <div class="col-md-6">{{ $info->manufacturer }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> <b>Expiry Date</b> </div>
                  <div class="col-md-6"> {{ $info->expiry_date }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b>Select Item Group</b> </div>
                  <div class="col-md-6">{{ $info->item_group['name'] }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Select Item Sub Group</b> </div>
                  <div class="col-md-6">{{ $info->item_sub_group['name'] }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> <b>Unit of Measurement</b> </div>
                  <div class="col-md-6">{{ $info->measurement_unit['name'] }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Asset Type</b> </div>
                  <div class="col-md-6"> {{ $info->asset_type }}</div>
                </div>
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b>Insured</b> </div>
                  <div class="col-md-6"> {{ $info->insured }}</div>
                </div>
                  <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> <b>ABC</b> </div>
                  <div class="col-md-6"> {{ $info->abc }}</div>
                </div>
              
              </div>

              <div class="col-md-6" style="padding-left:5px; padding-right:5px;">
                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Review</b> </div>
                  <div class="col-md-6 no-padding"> {{ $info->review }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Product Preference </b></div>
                  <div class="col-md-6 no-padding"> {{ $info->product_preference }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Minimum Stock Level</b> </div>
                  <div class="col-md-6 no-padding"> {{ $info->minimum_stock_level }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Maximum Stock Level</b> </div>
                  <div class="col-md-6 no-padding">{{ $info->maximum_stock_level }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Reorder Stock Level</b> </div>
                  <div class="col-md-6 no-padding">{{ $info->reorder_stock_level }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Location </b></div>
                  <div class="col-md-6 no-padding">{{ $info->location['name'] }}  </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Rack
                   </b></div>
                  <div class="col-md-6 no-padding">{{ $info->rack['name'] }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Bin Number</b> </div>
                  <div class="col-md-6 no-padding"> {{ $info->bin_number }}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Kardex Number</b> </div>
                  <div class="col-md-6 no-padding"> {{ $info->kardex_number }}</div>
                </div>

                  <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i> <b>Store Code</b>
 </div>
                  <div class="col-md-6 no-padding">{{ $info->store_code }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b>Latest Rate </b></div>
                  <div class="col-md-6 no-padding">{{ $info->latest_rate }} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Weighted Average Rate</b></div>
                  <div class="col-md-6 no-padding">{{ $info->weighted_average_rate }} </div>
                </div>
                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Opening Stock</b></div>
                  <div class="col-md-6 no-padding"> {{ $info->opening_stock }}</div>
                </div>
                 <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> XYZ</b></div>
                  <div class="col-md-6 no-padding"> {{ $info->xyz }}</div>
                </div>
                 
              </div>
             
              <div class="col-md-10 col-md-offset-1">
               
              

            </div>
            <hr>
          
        </div>

	</div>
</div>
</div>
@stop
