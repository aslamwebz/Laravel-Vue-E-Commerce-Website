@extends('layouts.app', ['title' => __('Sales Management')])

@section('content')
    @include('products.partials.header', ['title' => __('')])   

    <style>
    .border-box{
        border-top:1px solid #636b6f;
        border-bottom: 1.5px solid #f2f2f2;
        padding:20px 10px;
    }

    input.form-control{
        height: 40px !important;
        margin: 5px 0px;
    }
    </style>

    <div class="container-fluid mt--9" id="createApp">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Sales Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('sales.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <form method="POST" action="{{ route('sales.store') }}"  autocomplete="offf" >
                                @csrf
                                <h6 class="heading-small text-muted mb-4">{{ __('Add Sales Data') }}</h6>
                                <div class="row border-box mt--4">
                                    <div class="col-md-4">
                                         <div class="form-group{{ $errors->has('customer_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="customer_name">{{ __('Customer Name') }}</label>
                                                <input type="text" id="customer_name" name="customer_name" @keyup="customerGet" @change="customerAdd" required class="form-control" autocomplete="offf"  list="browsersCustomers">
                                                <datalist id="browsersCustomers">
                                                    <span v-for="name in customerNames ">
                                                        <option v-bind:value="name.customer_name">
                                                    </span>
                                                </datalist>
                                            @if ($errors->has('customer_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('customer_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group{{ $errors->has('customer_address') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="customer_address">{{ __('Address') }}</label>
                                            <input type="text" name="customer_address" autocomplete="offf" id="customer_address" class="form-control form-control-alternative{{ $errors->has('customer_address') ? ' is-invalid' : '' }}" value="{{ old('customer_address') }}" required autofocus>

                                            @if ($errors->has('customer_address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('customer_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('customer_contact') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="customer_contact">{{ __('Contact') }}</label>
                                            <input type="text" name="customer_contact" autocomplete="offf" id="customer_contact" class="form-control form-control-alternative{{ $errors->has('customer_contact') ? ' is-invalid' : '' }}" value="{{ old('customer_contact') }}" required autofocus>

                                            @if ($errors->has('customer_contact'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('customer_contact') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" data-toggle="modal" data-target="#customerModal" class="btn btn-primary btn-sm">Add Customer</button>
                                        <button v-on:click.prevent="clear" class="btn btn-primary btn-sm float-right" id="clear">Clear</button>
                                    </div>
                                </div>
                                       
                                <div class="row border-box">
                                    <div class="col-md-12  border-top-3">
                                        <div class="form-group">
                                            <div class="row bd-t">
                                                <div class="col-md-4">
                                                    <label class="form-control-label" for="product-name">{{ __('Product Name') }}</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-control-label" for="product-name">{{ __('Cost') }}</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-control-label" for="product-name">{{ __('Price') }}</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-control-label" for="product-name">{{ __('Quantity') }}</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-control-label" for="product-name">{{ __('Total') }}</label>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-control-label" for="product-name"></label>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <span v-for="item in items" :key="item.i">
                                            <tr>
                                                <div class="row" >
                                                    <div class="col-md-4" v-bind:id="item">
                                                        <input type="text"  @keyup="submitSearch" @change="itemAdd" name="nameArray[]"  required class="form-control" autocomplete="offf"  list="browsers">
                                                    </div>
                                                    <datalist id="browsers">
                                                        <span v-for="name in resultName ">
                                                            <option v-bind:value="name.product_name">
                                                        </span>
                                                    </datalist>
                                                    <div class="col-md-2">
                                                        <input type="text" name="costArray[]" class="form-control" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="priceArray[]" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" name="quantityArray[]" class="form-control" @change="totalCount" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" sname="totalArray[]" class="form-control" id="total" disabled>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-outline-danger" type="button" v-on:click.prevent="rem(item)"id="button-del">X</button>
                                                    </div>
                                                </div>
                                            </tr>   
                                        </span>
                                    </div>

                                    </div>
                                    <div class="col-md-12">
                                        <button v-on:click.prevent="add" class="btn btn-primary" id="addButton">Add Product</button>
                                    </div>
                                </div>

                                <div class="row border-box">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="product-quantity">{{ __('Discount') }}</label>
                                            <input type="number" name="discount" id="product-quantity" 
                                            class="form-control form-control-alternative{{ $errors->has('discount') ? ' is-invalid' : '' }}" 
                                            value="{{ old('discount') }}" @change="discountCounter"  autofocus>

                                            @if ($errors->has('discount'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('discount') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('tax') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="product-quantity">{{ __('Tax') }}</label>
                                            <input type="number" name="tax" id="product-quantity" 
                                            class="form-control form-control-alternative{{ $errors->has('tax') ? ' is-invalid' : '' }}" 
                                            value="{{ old('tax') }}" @change="taxCounter" autofocus>

                                            @if ($errors->has('tax'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tax') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('payment_type') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="product-quantity">{{ __('Payment Type') }}</label>
                                            <select name="payment_type" id="product-quantity" 
                                            class="form-control form-control-alternative{{ $errors->has('payment_type') ? ' is-invalid' : '' }}" 
                                            value="{{ old('payment_type') }}" required autofocus>
                                                <option value="cash" selected>Cash</option>
                                                <option value="visa">Visa</option>
                                                <option value="master">Master</option>
                                                <option value="paypal">Paypal</option>
                                                <option value="check">Check</option>
                                            </select>
                                            @if ($errors->has('payment_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('payment_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('total') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="total">{{ __('Sub Total') }}</label>
                                                <input type="number" name="total" id="total" 
                                                class="form-control form-control-alternative{{ $errors->has('total') ? ' is-invalid' : '' }}" 
                                                v-model="total" required autofocus >
    
                                                @if ($errors->has('total'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('total') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('grand_total') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="grand_total">{{ __('Grand Total') }}</label>
                                            <input type="number" name="grand_total" id="grand_total" 
                                            class="form-control form-control-alternative{{ $errors->has('grand_total') ? ' is-invalid' : '' }}" 
                                            v-model="grandTotal" required autofocus >

                                            @if ($errors->has('grand_total'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('grand_total') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('sold_by') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="sold_by">{{ __('Seller') }}</label>
                                                <input type="text" name="sold_by" id="sold_by" 
                                                class="form-control form-control-alternative{{ $errors->has('sold_by') ? ' is-invalid' : '' }}" 
                                                value="{{  auth()->user()->name }}"  required autofocus autocomplete="offf">

                                                @if ($errors->has('sold_by'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('sold_by') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success mt-4  float-right" >{{ __('Add') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @include('layouts.footers.auth')
    

 

    <!-- Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route('customers.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="">Customer Email</label>
                    <input type="text" class="form-control" name="customer_email" required>
                </div>
                <div class="form-group">
                    <label for="">Customer Address</label>
                    <input type="text" class="form-control" name="customer_address" required>
                </div>
                <div class="form-group">
                    <label for="">Customer Contact</label>
                    <input type="text" class="form-control" name="customer_contact" required>
                </div>
                <input type="text" class="hidden" value="sales" name="type">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
            <div class="modal-footer mt--5">
        
            </div>
          </div>
        </div>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
    const app = new Vue({
        el:'#createApp',
        data:{
            items:[],
            item:0,
            i:0,
            query:'',
            resultName:[],
            result:[{
                id:'pid',
                cost:'cost',
                price:'price',
            }],
            currentItem:'',
            total:'',
            grandTotal:'',
            tax:'',
            customerNames:[],
        },
        mounted(){
            this.items.push(this.item);
            // $('#submitButton').hide();
            $('#addButton').hide();
        },
        methods:{
            add(){
                this.item = this.i;
                this.items.push(this.item);
                $('#addButton').hide();
            },
            rem(item){
                const todoIndex = this.items.indexOf(item);
                this.items.splice(todoIndex, 1);

                let id = item;
                var totalCount = $(`#${+id}`).siblings().eq(4).children().val();
                this.grandTotal = parseInt(this.grandTotal - totalCount);
                if(this.grandTotal < 0){
                    this.grandTotal = 0;
                }

                this.grandTotalCounter();
                $('#addButton').show();

            },
            removeSearchQuery: function() {
                this.searchQuery = '';
                this.isResult = false;
            },
            submitSearch: function() {
                axios.get('/api/indexP?q=' + this.query)
                .then((data) => {
                    // console.log(data.data)
                    this.resultName = data.data;
                    // console.log(this.resultName);
                    
                })
                .catch({})
            },
            itemAdd(){
               let id =  this.item;  
               axios.get('/api/indexP?q=' + $(`#${+id}`).children().val())
                .then((data) => {
                    // console.log(data.data)
                    this.resultName = data.data;
                    // console.log(this.resultName);
                    for(let key in this.resultName){
                        // console.log(this.resultName[key]['product_name']);
                        this.result.id = this.resultName[key]['pid'];
                        this.result.cost = this.resultName[key]['product_cost'];
                        this.result.price = this.resultName[key]['product_price'];
                        let cost = $(`#${+id}`).siblings().eq(1).children();
                        let price = $(`#${+id}`).siblings().eq(2).children();
                        cost.val(this.result.cost);
                        price.val(this.result.price);
                        // this.result.cost = '';
                        // this.result.price = '';
                        this.i++;
                    }
                })
                .catch({})
            },
            totalCount(e){
                $('#addButton').show();
                let id = this.item;  
                var totalCount = $(`#${+id}`).siblings().eq(4).children();
                var curTotal = e.target.value * this.result.cost;
                totalCount.val(curTotal);
                this.total = parseInt(this.total + curTotal);

                this.grandTotalCounter();
            },
         
            taxCounter(e){
                this.tax = parseInt(this.grandTotal * e.target.value /100);
                this.grandTotalCounter();
            },
            discountCounter(e){
                this.discount = parseInt(this.grandTotal * e.target.value /100);
                this.grandTotalCounter();
            },
            grandTotalCounter(){
                // if(this.grandTotal <= 0){
                //     $('#submitButton').hide();
                // } else{
                //     $('#submitButton').show();
                // }

                this.grandTotal = this.total;

                if(this.tax >= 1){
                    this.grandTotal += this.tax;
                }

                if(this.discount >= 1){
                    this.grandTotal -= this.discount;
                }

            },
            // Customer Section
            customerGet(){
                // console.log($('#customer_name').val())
                axios.get('/api/indexC?q=' + $('#customer_name').val())
                .then((data) => {
                    this.customerNames = data.data;
                });
            },
            customerAdd(){
                axios.get('/api/indexC?q=' + $('#customer_name').val())
                .then((data) => {
                    for(let key in this.customerNames){
                        $('#customer_address').val(this.customerNames[key]['customer_address']);
                        $('#customer_contact').val(this.customerNames[key]['customer_contact']);
                        $('#customer_email').val(this.customerNames[key]['customer_email']);
                    }
                })
                .catch({
                })
            },
            addCustomer(){
                axios.post('/api/store')
                .then({
                    
                })
                .catch({

                })
            },
            clear(){
                $('#customer_name').val('');
                $('#customer_address').val('');
                $('#customer_contact').val('');
                $('#customer_email').val('');
            }


        }
    });
</script>

@endsection

