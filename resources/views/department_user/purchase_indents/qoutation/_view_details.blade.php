@section('pageCss')
<style>
span.step {
  background: #6B6D72;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 5px;
  text-align: center;
  width: 1.6em;
  font-size: 2.3em;
}
.item-list {
  background: #f8f8f8;
}
</style>
@stop
<style>
  .item-field{
    padding: 6px 0;
    background: #f6f6f6;
    margin-bottom: 4px;
  }
  h5 {
    text-align: center;
    padding: 15px 0;
    text-decoration: underline;
  }
  hr.style13 {
    height: 5px;
    border: 0;
    box-shadow: 0 10px 10px -10px #8c8b8b inset;
  }
</style>

<h4>Quotation Values for Item {{ $info->requisition_item->item_measurement->item_name }}</h4>
<hr class="style13">
<div style="background:#ccc">
  <div class="col-md-6 item-field">
    <div class="col-md-4"><i class="fa fa-gg"></i><b> Purchase Indent Number</b> </div>
    <div class="col-md-3"> <button class="btn btn-success">{{$info->purchase_indent['purchase_indent_number']}}</button></div>
  </div>

  <div class="col-md-6 item-field">
    <div class="col-md-4"><i class="fa fa-gg"></i><b> Purchase Indent Date</b> </div>
    <div class="col-md-3"> <button class="btn btn-success">{{ date('d-m-Y', strtotime($info->purchase_indent['purchase_indent_date'] )) }}</button></div>
  </div>
</div>
<div style="height:100px"></div>

@foreach($values as $k => $v)
<?php $accepted = false;
if($v->is_accepted) {
  $accepted = true;
}
?>
@endforeach
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th> Vendor Name </th>
        <th> Vendor Code </th>
        <th>Value</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach($values as $k => $v)
      <tr @if($accepted) class="success" @endif>
        <td> {{ $k+1 }} </td>
        <td> {{ $v->vendor['name'] }} </td>
        <td> {{ $v->vendor['vendor_code'] }} </td>
        <td> {{ $v->value }} </td>
        <td>
          @if($v->is_accepted)
            <button class="btn btn-success disabled">Selected Rate</button>
          @endif

          @if(!$accepted)
            <a href="{{ route('quotation_values.accept', Crypt::encrypt($v->id)) }}" onclick="return confirm('Are you sure you want to accept this rate ?');" class="btn btn-info">Accept this rate from vendor</a>
          @endif

          </td>
      <tr>
      @endforeach
    </tbody>
  </table>
