@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
@include('products.partials.header', ['title' => __($product->product_name)])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="container p-2" >
                    <div class="row">
                        <div class="col-md-6 p-4">
                            <img src="img/details_1.jpg" alt="" height="400" width="400">
                        </div>
                        <div class="col-md-6">
                            <div class="container pt-4 pb-4 ml--7">
                                <div class="pt-3">
                                    <h2>Product Name</h2>
                                    <input type="text" disabled value="{{$product->product_name}}" class="form-control">
                                </div>
                                
                                <div class="pt-3">
                                    <h2>Product Cost</h2>
                                    <input type="text" disabled value="{{$product->product_cost}}" class="form-control">
                                </div>
                                <div class="pt-3">
                                    <h2>Product Price</h2>
                                    <input type="text" disabled value="{{$product->product_price}}" class="form-control">
                                </div>
                                <div class="pt-3">
                                    <h2>Product Quantity</h2>
                                    <input type="text" disabled value="{{$product->product_quantity}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pt-3 m-3">
                                <h2>Product Description</h2>
                                <textarea type="text" disabled rows="30" class="form-control">{{$product->product_description}}</textarea>
                            </div>
                            <div class="col-12 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                <a href="{{ route('products.edit', $product->pid) }}" class="btn btn-sm btn-info">{{ __('Edit Product') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    @include('layouts.footers.auth')
</div>

@endsection
