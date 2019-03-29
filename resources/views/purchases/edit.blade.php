@extends('layouts.app', ['title' => __('Sales Management')])

@section('content')
    @include('products.partials.header', ['title' => __('Add Sales')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Product Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('sales.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form method="post" action="{{ route('sales.update', $sale) }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h6 class="heading-small text-muted mb-4">{{ __('Product information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="product-name">{{ __('Product Name') }}</label>
                                        <input type="text" name="product_name" id="product-name" class="form-control form-control-alternative{{ $errors->has('product_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Name') }}" value="{{ $product->product_name }}" required autofocus>

                                        @if ($errors->has('product_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('product_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('product_quantity') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="product-quantity">{{ __('Product Quantity') }}</label>
                                        <input type="number" name="product_quantity" id="product-quantity" class="form-control form-control-alternative{{ $errors->has('product_quantity') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Quantity') }}" value="{{ $product->product_quantity }}" required autofocus>

                                        @if ($errors->has('product_quantity'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('product_quantity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('product_cost') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="product_cost">{{ __('Product Cost') }}</label>
                                                <input type="number" name="product_cost" id="product_cost" class="form-control form-control-alternative{{ $errors->has('product_cost') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Cost') }}" value="{{ $product->product_cost }}" required autofocus>

                                                @if ($errors->has('product_cost'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('product_cost') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('product_price') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="product_price">{{ __('Product Price') }}</label>
                                                    <input type="number" name="product_price" id="product_price" class="form-control form-control-alternative{{ $errors->has('product_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Price') }}" value="{{ $product->product_price }}" required autofocus>
                
                                                    @if ($errors->has('product_price'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('product_price') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('product_description') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="product_description">{{ __('Product Description') }}</label>
                                            <textarea type="text" name="product_description" rows="7" id="product_description" class="form-control form-control-alternative{{ $errors->has('product_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Description') }}"  required autofocus>{{$product->product_description }}</textarea>
        
                                            @if ($errors->has('product_description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('product_description') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('product_image') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="product_image">{{ __('Product Image') }}</label>
                                            <input type="text" name="product_image" id="product_image" class="form-control form-control-alternative{{ $errors->has('product_image') ? ' is-invalid' : '' }}" placeholder="{{ __('Product Image') }}" value="{{ $product->product_image ? $product->product_image:''}}" required autofocus>
        
                                            @if ($errors->has('product_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('product_image') }}</strong>
                                                </span>
                                            @endif
                                    </div>                                                                
                                    <div class="">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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
@endsection