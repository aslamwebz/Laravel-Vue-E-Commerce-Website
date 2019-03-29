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
                                <h3 class="mb-0">{{ __('Purchase Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('purchases.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <form method="POST" action="{{ route('purchases.update', $purchase->id) }}"  autocomplete="offf" >
                                @csrf
                                @method('put')
                                <h6 class="heading-small text-muted mb-4">{{ __('Edit Purchase Data') }}</h6>
                                <div class="row border-box mt--4">
                                    <div class="col-md-4">
                                         <div class="form-group{{ $errors->has('supplier_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="supplier_name">{{ __('Customer Name') }}</label>
                                         <input type="text" id="supplier_name" name="supplier_name" @keyup="supplierGet" @change="supplierAdd" required class="form-control" autocomplete="offf"  list="browsersCustomers" value="{{$purchase->supplier_name}}">
                                                <datalist id="browsersCustomers">
                                                    <span v-for="name in supplierNames ">
                                                        <option v-bind:value="name.supplier_name">
                                                    </span>
                                                </datalist>
                                            @if ($errors->has('supplier_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('supplier_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group{{ $errors->has('supplier_address') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="supplier_address">{{ __('Address') }}</label>
                                            <input type="text" name="supplier_address" autocomplete="offf" id="supplier_address" class="form-control form-control-alternative{{ $errors->has('supplier_address') ? ' is-invalid' : '' }}" value="{{$purchase->supplier_address}}" required autofocus>

                                            @if ($errors->has('supplier_address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('supplier_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('supplier_contact') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="supplier_contact">{{ __('Contact') }}</label>
                                            <input type="text" name="supplier_contact" autocomplete="offf" id="supplier_contact" class="form-control form-control-alternative{{ $errors->has('supplier_contact') ? ' is-invalid' : '' }}" value="{{$purchase->supplier_contact}}" required autofocus>

                                            @if ($errors->has('supplier_contact'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('supplier_contact') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" data-toggle="modal" data-target="#supplierModal" class="btn btn-primary btn-sm">Add Customer</button>
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
                                            <input type="hidden" id="test" value="{{json_encode(unserialize($purchase->purchases))}}">
                                        <span v-for="item in items" :key="item.i">
                                            <tr>
                                                <div class="row" >
                                                    <div class="col-md-4" v-bind:id="item">
                                                        <input type="text"  @keyup="submitSearch" @change="itemAdd" name="nameArray[]"  required class="form-control" autocomplete="offf"  list="browsers" >
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
                                                        <input type="text" name="priceArray[]" class="form-control" disabled >
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" name="quantityArray[]" class="form-control" @change="totalCount" required  >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" sname="totalArray[]" class="form-control" id="total" readonly >
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
                                            value="{{$purchase->discount}}" @change="discountCounter"  autofocus>

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
                                            value="{{$purchase->tax}}" @change="taxCounter" autofocus>

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
                                                v-model="subTotal" required autofocus readonly>
    
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
                                            v-model="grandTotal" required autofocus readonly>

                                            @if ($errors->has('grand_total'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('grand_total') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('purchased_by') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="purchased_by">{{ __('Seller') }}</label>
                                                <input type="text" name="purchased_by" id="purchased_by" 
                                                class="form-control form-control-alternative{{ $errors->has('purchased_by') ? ' is-invalid' : '' }}" 
                                                value="{{  $purchase->purchased_by }}"  required autofocus autocomplete="offf">

                                                @if ($errors->has('purchased_by'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('purchased_by') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success mt-4  float-right" >{{ __('Update Receipt') }}</button>
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
    

 

    <!-- Modal for Customer Add-->
    <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route('suppliers.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Customer Name</label>
                    <input type="text" class="form-control" name="supplier_name" required>
                </div>
                <div class="form-group">
                    <label for="">Customer Email</label>
                    <input type="text" class="form-control" name="supplier_email" required>
                </div>
                <div class="form-group">
                    <label for="">Customer Address</label>
                    <input type="text" class="form-control" name="supplier_address" required>
                </div>
                <div class="form-group">
                    <label for="">Customer Contact</label>
                    <input type="text" class="form-control" name="supplier_contact" required>
                </div>
                <input type="text" class="hidden" value="purchase" name="type">
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>

<script>

    let products;
    check();

    function check(e){
        let test = document.getElementById('test');
        products = JSON.parse(test.value);

    }

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
            subTotal:'',
            grandTotal:'',
            tax:'',
            supplierNames:[],
        },
        mounted(){
            $('#addButton').hide();
            // Get Current Invoices
            this.getInvoices();
        },
        methods:{
            add(){
                // Adding an item with a numeric val to serve as a key point and push it to item array
                this.item = this.i;
                this.items.push(this.item);
                $('#addButton').hide();
            },
            rem(item){

                // Get and remove the item from the invoice
                const todoIndex = this.items.indexOf(item);
                this.items.splice(todoIndex, 1);

                // let id = item;
                // var totalCount = $(`#${+id}`).siblings().eq(4).children().val();
                // this.grandTotal = parseInt(this.grandTotal - totalCount);
                // if(this.grandTotal < 0){
                //     this.grandTotal = 0;
                // }

                this.subTotalCount();
                this.grandTotalCounter();
                $('#addButton').show();
                 // if removed and item decrese the value of i by one to maintain the correct indexing
                this.i--;

            },
            // Empty search
            removeSearchQuery: function() {
                this.searchQuery = '';
                this.isResult = false;
            },
            // Submit the search to backend and assign the value to result names
            submitSearch: function() {
                // searching for the query
                axios.get('/api/indexP?q=' + this.query)
                .then((data) => {
                    this.resultName = data.data;
                })
                .catch({})
            },
            itemAdd(){
                // assign an index
               let id =  this.item;
                // Search for the query which came from the index id  
               axios.get('/api/indexP?q=' + $(`#${+id}`).children().val())
                .then((data) => {
                    // Get the product from backend
                    this.resultName = data.data;
                    for(let key in this.resultName){
                        // assign the values
                        this.result.id = this.resultName[key]['pid'];
                        this.result.cost = this.resultName[key]['product_cost'];
                        this.result.price = this.resultName[key]['product_price'];
                        // Assign the cost and price
                        let cost = $(`#${+id}`).siblings().eq(1).children();
                        let price = $(`#${+id}`).siblings().eq(2).children();
                        cost.val(this.result.cost);
                        price.val(this.result.price);
                        this.i++;
                    }
                })
                .catch({})
            },
            totalCount(){
                $('#addButton').show();
                // assign an index
                let id = this.item;  
                // var itemTotal = $(`#${+id}`).siblings().eq(4).children();
                // var curTotal = e.target.value * this.result.cost;
                // itemTotal.val(curTotal);
                let price = $(`#${+id}`).siblings().eq(2).children();
                let quantity = $(`#${+id}`).siblings().eq(3).children();
                let totalInput = $(`#${+id}`).siblings().eq(4).children();
                // Get total and assign it
                let total = price.val() * quantity.val();
                totalInput.val(total);
                // Count subtotal
                this.subTotalCount();
            },
            subTotalCount(){
                var subtotal = 0;
                for(let key in this.items){
                    let t = $(`#${+key}`).siblings().eq(4).children();
                    subtotal += parseInt(t.val());
                }
                this.subTotal = subtotal;
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


                this.grandTotal = this.subTotal;

                if(this.tax >= 1){
                    this.grandTotal += this.tax;
                }

                if(this.discount >= 1){
                    this.grandTotal -= this.discount;
                }

            },
            // Customer Section
            supplierGet(){
                axios.get('/api/indexS?q=' + $('#supplier_name').val())
                .then((data) => {
                    this.supplierNames = data.data;
                });
            },
            // Search the supplier and add it to supplier section
            supplierAdd(){
                axios.get('/api/indexS?q=' + $('#supplier_name').val())
                .then((data) => {
                    for(let key in this.supplierNames){
                        $('#supplier_address').val(this.supplierNames[key]['supplier_address']);
                        $('#supplier_contact').val(this.supplierNames[key]['supplier_contact']);
                        $('#supplier_email').val(this.supplierNames[key]['supplier_email']);
                    }
                })
                .catch({
                })
            },
            clear(){
                $('#supplier_name').val('');
                $('#supplier_address').val('');
                $('#supplier_contact').val('');
                $('#supplier_email').val('');
            },
            getInvoices(){
                // products.forEach(data => {
                //    data['price'] = parseInt(data['price']);
                //    data['quantity'] = parseInt(data['quantity']);
                //    console.log(data);
                //     this.items.push(data);
                //     this.i++;
                // });

                products.forEach(product => {
                    this.item = this.i;
                    this.getProduct(product);
                    this.items.push(this.item);
                    this.i++;
                });               
                $('#addButton').show();


            },
            getProduct(product){
                // console.log(product['product_name']);
                let id = this.item;
                axios.get('/api/indexP?q=' + product['product_name'])
                    .then((data) => {
                    this.resultName = data.data;
                    // console.log(this.resultName);
                    for(let key in this.resultName){
                        // console.log(this.resultName[key]['product_name']);
                        this.result.id = this.resultName[key]['pid'];
                        this.result.name = this.resultName[key]['product_name'];
                        this.result.cost = this.resultName[key]['product_cost'];
                        this.result.price = this.resultName[key]['product_price'];
                        this.result.quantity = product['quantity'];
                        let totalval =  this.result.price * this.result.quantity;
                        // this.total = parseInt(this.total + totalval);
                        let name = $(`#${+id}`).children();
                        let cost = $(`#${+id}`).siblings().eq(1).children();
                        let price = $(`#${+id}`).siblings().eq(2).children();
                        let quantity = $(`#${+id}`).siblings().eq(3).children();
                        let total = $(`#${+id}`).siblings().eq(4).children();
                        name.val(this.result.name);
                        cost.val(this.result.cost);
                        price.val(this.result.price);
                        quantity.val(this.result.quantity);
                        total.val(totalval);
                        // this.result.cost = '';
                        // this.result.price = '';
                        this.subTotalCount();

                    }
                })
                .catch({})
            }


        }
    });
</script>

@endsection

