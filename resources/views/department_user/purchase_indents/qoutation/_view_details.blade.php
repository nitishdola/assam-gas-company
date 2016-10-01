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
@section('pageTitle') Quotation Values for Item  @stop
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

<div class="box box-primary">

  <div class="box-body item-view">
    <h3>Purchase Indent Details</h3>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Number</b> </div>
          <div class="col-md-6"> {{$info->purchase_indent_item->purchase_indent['purchase_indent_number']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Date</b> </div>
          <div class="col-md-6"> {{ date('d-m-Y', strtotime($info->purchase_indent_item->purchase_indent['purchase_indent_date'] )) }}</div>
        </div>

      </div>
    </div>
  </div>

</div>
