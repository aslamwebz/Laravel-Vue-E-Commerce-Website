@extends('layouts.app', ['title' => __('Order Management')])

@section('content')
@include('products.partials.header', ['title' => __($order->order_details)])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="container p-2" >
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container pt-4 pb-4 ">
                                <div class="pt-3">
                                    <h2>Order To</h2>
                                    <input type="text" disabled value="{{$order->order_to}}" class="form-control">
                                </div>
                                
                                <div class="pt-3">
                                    <h2>Order Date</h2>
                                    <input type="text" disabled value="{{$order->order_date}}" class="form-control">
                                </div>
                                <div class="pt-3">
                                    <h2>Due Date</h2>
                                    <input type="text" disabled value="{{$order->due_date}}" class="form-control">
                                </div>
                                <div class="pt-3">
                                    <h2>Order Status</h2>
                                    <input type="text" disabled value="{{$order->order_status}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pt-3 m-3">
                                <h2>Order Description</h2>
                                <textarea type="text" disabled rows="30" class="form-control">{{$order->order_details}}</textarea>
                            </div>
                            <div class="col-12 text-right">
                                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-info">{{ __('Edit Order') }}</a>
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
