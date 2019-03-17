@extends('layouts.app', ['title' => __('Sale Invoice')])

@section('content')
@include('sales.partials.header', ['title' => __($sale->description)])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header">
                    <div class="col-md-12">
                        asd
                    </div>
                </div>
                <div class="container p-2" >
                    <div class="row">
                        <div class="col-md-6 p-4">
                            <img src="img/details_1.jpg" alt="" height="400" width="400">
                        </div>
                        <div class="col-md-6">
                            <div class="container pt-4 pb-4 ml--7">
                                <div class="pt-3">
                                    <h2>Sale Name</h2>
                                    <input type="text" disabled value="{{$sale->Sale_name}}" class="form-control">
                                </div>
                                
                                <div class="pt-3">
                                    <h2>Sale Cost</h2>
                                    <input type="text" disabled value="{{$sale->Sale_cost}}" class="form-control">
                                </div>
                                <div class="pt-3">
                                    <h2>Sale Price</h2>
                                    <input type="text" disabled value="{{$sale->Sale_price}}" class="form-control">
                                </div>
                                <div class="pt-3">
                                    <h2>Sale Quantity</h2>
                                    <input type="text" disabled value="{{$sale->Sale_quantity}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pt-3 m-3">
                                <h2>Sale Description</h2>
                                <textarea type="text" disabled rows="30" class="form-control">{{$sale->description}}</textarea>
                            </div>
                            <div class="col-12 text-right">
                                <a href="{{ route('sales.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-info">{{ __('Edit Sale') }}</a>
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
