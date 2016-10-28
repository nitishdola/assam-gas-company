<div style="width:1350px; overflow-y:scroll" >
  <table class="table" id="req_table">
    <thead>
      <tr>
        <th class="col-md-2">Item</th>
        <th class="col-md-2">Store Description</th>
        <th class="col-md-2">Measurement Unit</th>
        <th class="col-md-1">Quantity Demanded</th>
        <th class="col-md-1">Rate</th>
        <th class="col-md-1">Stock In Hand</th>
        <th class="col-md-3">Remarks(If Any)</th>
      </tr>
    </thead>

    <tbody>
      <tr class="tr_clone">
        <td class="col-md-2">{!! Form::select('item_measurement_id[]', $item_measurements, null, ['class' => 'select2 required col-md-12 item_measurement', 'id' => 'item_measurement_id', 'autocomplete' => 'off', 'required' => 'true']) !!}</td>
        <td class="col-md-2">{!! Form::textarea('store_description[]', null, ['class' => 'form-control required', 'id' => 'store_description', 'cols' => 3, 'rows' => 2, 'placeholder' => 'Description of Stores', 'autocomplete' => 'off', 'required' => 'true']) !!}</td>
        <td class="col-md-2">{!! Form::select('measurement_unit_id[]', $units, null, ['class' => 'required form-control col-md-12', 'id' => 'measurement_unit_id', 'autocomplete' => 'off', 'required' => 'true']) !!}</td>
        <td class="col-md-1">{!! Form::number('quantity_demanded[]', null, ['class' => 'form-control required', 'id' => 'quantity_demanded', 'step' => '0.01', 'placeholder' => 'Quantity Demanded', 'autocomplete' => 'off', 'required' => 'true']) !!}</td>
        <td class="col-md-1">{!! Form::number('rate[]', null, ['class' => 'rate form-control required', 'id' => 'rate', 'placeholder' => 'Rate', 'readonly' => true, 'step' => '0.01', 'autocomplete' => 'off', 'required' => 'true']) !!}</td>
        <td class="col-md-1"><div class="col-md-3 stock_in_hand" style="margin-top:4px">0</div>
        </td>
        <td class="col-md-3">{!! Form::textarea('remarks[]', null, ['class' => 'form-control required', 'id' => 'remarks', 'rows' => 2, 'placeholder' => 'Remarks if any', 'autocomplete' => 'off',]) !!}</td>
      </tr>
    </tbody>
  </table>
</div>

<div id="col-md-12">
	<a href="javascript:void(0)" class="btn btn-warning add_more_item">Add More Item <i class="fa fa-plus-square" aria-hidden="true"></i></a>

	<a href="javascript:void(0)" class="btn btn-danger remove_item" style="display:none">Remove <i class="fa fa-minus-square" aria-hidden="true"></i></a>
</div>
