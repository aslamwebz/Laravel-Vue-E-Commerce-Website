@extends('layouts.app', ['title' => __('Sale Invoice')])

@section('content')
@include('sales.partials.header', ['title' => __($sale->description)])   

<style>
body{
  background-color: #F6F6F6; 
}

.headerLeft h1{
  color:#aaa;
  margin: 0px;
  font-size:28px;
}
.header{
  border-bottom: 2px solid #417482;
  padding: 10px;
}
.headerRight p{
  margin: 0px;
  font-size:10px;
  color:#88CFE3;
  text-align: right;
}
.contentSection{
  background-color: #fff;
  padding: 0px;
}
.content{
  background-color: #fff;
  padding:20px;
}
.content h1{
  font-size:22px;
  margin:0px;
}
.content p{
  margin: 0px;
  font-size: 11px;
}
.content span{
  font-size: 11px;
  color:#F2635F;
}
.panelPart{
  background-color: #fff;
}
.panel-body{
  background-color: #3BA4C2;
  color:#fff;
  padding: 5px;
}
.panel-footer {
  background-color:#fff; 
}
.panel-footer h1{
  font-size: 20px;
  padding:15px;
  border:1px dotted #DDDDDD;
}
.panel-footer p{
  font-size:13px;
  background-color: #F6F6F6;
  padding: 5px;
}
.tableSection{
  background-color: #fff;
}
.tableSection h1{
  font-size:18px;
  margin:0px;
}
th{
  background-color: #383C3D;
  color:#fff;
}
.table{
  padding-bottom: 10px;
  margin:0px;
  border:1px solid #DDDDDD;
}
td:nth-child(2){
  text-align: left;
}
td { 
  height: 100%;
}
.bg {
 background-color: #f00;
  width: 100%; 
  height: 100%; 
  display: block; 
}
.lastSectionleft{
  background-color: #fff;
  padding-top:20px;
}
.Sectionleft p{
  border:1px solid #DDDDDD;
  height:140px;
  padding: 5px;
}
.Sectionleft span{
  color:#42A5C5;
}
.lastPanel{
  text-align:center;
}
.panelLastLeft p,.panelLastRight p{
  font-size:11px;
  padding:5px 2px 5px 10px;
}
</style>

<div class="container-fluid mt--7">
    <div class="container" id="printDiv">
        <div class="row">
            <div class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-2 col-xs-12 brandSection">
                <div class="row">
                    <div class="col-md-12 col-sm-12 content">
                        <h1>Invoice<strong> {{ '#0000' . $sale->id }}</strong></h1>
                        <p>{{ $sale->sale_date }}</p>
                        <span>Payment due by 25 November 2020</span>
                    </div>
                    <div class="col-md-12 col-sm-12 panelPart">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 panelPart">
                              <div class="panel panel-default">
                                  <div class="panel-body">
                                      FROM
                                  </div>
                                  <div class="panel-footer">
                                      <div class="row pt-3 pl-1">
                                          <br>
                                          <div class="col-md-6 col-sm-6 col-xs-6">
                                                <h4>{{ $sale->sold_by }}</h4>
                                                <h4>{{ $sale->customer_address }}</h4>
                                                <h4>{{ $sale->cutomer_email }}</h4>
                                                <h4>{{ $sale->customer_contact }}</h4>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 panelPart">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        TO
                                    </div>
                                    <div class="">
                                        <div class="row pt-3 pl-1">
                                            <br>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                {{-- <h1>LOGO</h1> --}}
                                                <h4>{{ $sale->customer_name }}</h4>
                                                <h4>{{ $sale->customer_address }}</h4>
                                                <h4>{{ $sale->cutomer_email }}</h4>
                                                <h4>{{ $sale->customer_contact }}</h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 tableSection p-4">
                            <h1>ITEMS</h1>
                            <br>
                            <table class="table">
                              <thead>
                                <tr class="tableHead">
                                  <th>Description</th>
                                  <th>Quantity</th>
                                  <th>Unit Price</th>
                                  <th>TOTAL</th>
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach( unserialize($sale->items) as $item)
                                   
                                    @php
                                    @endphp
                                        <tr>
                                            <td>{{ $item['product_name'] }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>{{ $item['price'] }}</td>
                                            <td>{{ $item['price'] * $item['quantity'] }}</td>
                                        </tr>
                                @endforeach  
                              </tbody>
                          </table>
                        </div>
                        <div class="col-md-12 col-sm-12 lastSectionleft "> 
                           <div class="container">
                                <div class="row">
                                        <div class="col-md-8 col-sm-6 Sectionleft">
                                            <p><i>Special Notes</i></p>
                                            <span><i>Lorem ipsum dolor sit amet,ipsum dolor.</i> </span>
                                        </div>
                                        <div class="col-md-4 col-sm-6"> 
                                          <div class="panel panel-default">
                                              <div class="panel-body lastPanel">
                                                  AMOUNT DUE
                                              </div>
                                              <div class="panel-footer lastFooter mt-3">
                                                  <div class="row">
                                                      <div class="col-md-5 col-sm-6 col-xs-6 panelLastLeft">
                                                        <p>SUBTOTAL</p>
                                                        <p>TAX</p>
                                                        <p>Discount</p>
                                                        <p>TOTAL</p>
                                                      </div>
                                                      <div class="col-md-7 col-sm-6 col-xs-6 panelLastRight">
                                                        <p>{{$sale->total}}</p>
                                                        <p>{{$sale->tax}}</p>
                                                        <p>{{$sale->discount}}</p>
                                                        <p><strong>{{$sale->grand_total}}</strong></p>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" onclick="pprint()">Print Receipt</button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>      
    @include('layouts.footers.auth')
</div>

<script>
    function pprint(){
        var printContents = document.getElementById('printDiv').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents ;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection
