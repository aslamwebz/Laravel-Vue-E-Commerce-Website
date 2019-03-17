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
                            <form method="POST" action="{{ route('sales.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <h6 class="heading-small text-muted mb-4">{{ __('Add Sales Data') }}</h6>
                                <div class="row border-box mt--4">
                                    <div class="col-md-4">
                                         <div class="form-group{{ $errors->has('customer_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="customer_name">{{ __('Customer Name') }}</label>
                                            <input type="text" name="customer_name" id="customer_name" class="form-control form-control-alternative{{ $errors->has('"customer_name') ? ' is-invalid' : '' }}" value="{{ old('"customer_name') }}" required autofocus>

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
                                            <input type="text" name="customer_address" id="customer_address" class="form-control form-control-alternative{{ $errors->has('customer_address') ? ' is-invalid' : '' }}" value="{{ old('customer_address') }}" required autofocus>

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
                                            <input type="text" name="customer_contact" id="customer_contact" class="form-control form-control-alternative{{ $errors->has('customer_contact') ? ' is-invalid' : '' }}" value="{{ old('customer_contact') }}" required autofocus>

                                            @if ($errors->has('customer_contact'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('customer_contact') }}</strong>
                                                </span>
                                            @endif
                                        </div>
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
                                                        <input type="text"  @keyup="submitSearch" @change="itemAdd" name="nameArray[]" required class="form-control" autocomplete="off"  list="browsers">
                                                    </div>
                                                    <datalist id="browsers">
                                                        <span v-for="name in resultName ">
                                                            <option v-bind:value="name.product_name">
                                                        </span>
                                                    </datalist>
                                                    <div class="col-md-2">
                                                        <input type="text" sname="costArray[]" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" sname="priceArray[]" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" name="quantityArray[]" class="form-control" @change="totalCount">
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
                                                <input type="number" name="discount" id="product-quantity" class="form-control form-control-alternative{{ $errors->has('discount') ? ' is-invalid' : '' }}" value="{{ old('discount') }}" required autofocus>

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
                                                <input type="number" name="tax" id="product-quantity" class="form-control form-control-alternative{{ $errors->has('tax') ? ' is-invalid' : '' }}" value="{{ old('tax') }}" @change="taxCounter" required autofocus>

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
                                                <select name="payment_type" id="product-quantity" class="form-control form-control-alternative{{ $errors->has('payment_type') ? ' is-invalid' : '' }}" value="{{ old('payment_type') }}" required autofocus>
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
                                            <div class="form-group{{ $errors->has('grand_total') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="product-quantity">{{ __('Grand Total') }}</label>
                                                <input type="number" name="grand_total" id="product-quantity" class="form-control form-control-alternative{{ $errors->has('grand_total') ? ' is-invalid' : '' }}" value="{{ old('grand_total') }}" v-model="grandTotal" required autofocus>

                                                @if ($errors->has('grand_total'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('grand_total') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success mt-4  float-right" id="submitButton">{{ __('Add') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>

    
        
    
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
            grandTotal:'',
            tax:'',
        },
        mounted(){
            this.items.push(this.item);
            $('#submitButton').hide();
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
                axios.get('/api/index?q=' + this.query)
                .then((data) => {
                    // console.log(data.data)
                    this.resultName = data.data;
                    // console.log(this.resultName);
                    
                })
                .catch({})
            },
            itemAdd(){
               let id =  this.item;  
               axios.get('/api/index?q=' + $(`#${+id}`).children().val())
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
                var total = e.target.value * this.result.cost;
                totalCount.val(total);
                this.grandTotal = parseInt(this.grandTotal + total);

                this.grandTotalCounter();
            },
            grandTotalCounter(){
                if(this.grandTotal <= 0){
                    $('#submitButton').hide();
                } else{
                    $('#submitButton').show();
                }
            },
            taxCounter(e){
                this.tax = parseInt(this.grandTotal * e.target.value /100);
            },
            discountCounter(e){
                this.discount = parseInt(this.grandTotal * e.target.value /100);
            }

        }
    });
</script>

@endsection

