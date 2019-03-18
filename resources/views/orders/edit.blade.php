@extends('layouts.app', ['title' => __('Order Management')])

@section('content')
    @include('orders.partials.header', ['title' => __('Add Order')])   

                                        

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Order Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form method="POST" action="{{ route('orders.update', $order->id) }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <h6 class="heading-small text-muted mb-4">{{ __('Order information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('order_to') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="order_to">{{ __('Ordered To') }}</label>
                                        <input type="text" name="order_to" id="order_to" class="form-control 
                                        form-control-alternative{{ $errors->has('order_to') ? ' is-invalid' : '' }}" 
                                        value="{{ $order->order_to }}" required autofocus>

                                        @if ($errors->has('order_to'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('order_to') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('order_date') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="order_date">{{ __('Order Date') }}</label>
                                        <input type="text" name="order_date" id="order_date" class="form-control 
                                        form-control-alternative{{ $errors->has('order_date') ? ' is-invalid' : '' }}" 
                                        value="{{ $order->order_date }}" required autofocus>

                                        @if ($errors->has('order_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('order_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('due_date') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="due_date">{{ __('Due Date') }}</label>
                                        <input type="text" name="due_date" id="due_date" class="form-control 
                                        form-control-alternative{{ $errors->has('due_date') ? ' is-invalid' : '' }}" 
                                        value="{{ $order->due_date }}" required autofocus>

                                        @if ($errors->has('due_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('due_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('order_details') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="order_details">{{ __('Order Details') }}</label>
                                        <input type="text" name="order_details" id="order_details" class="form-control 
                                        form-control-alternative{{ $errors->has('order_details') ? ' is-invalid' : '' }}" 
                                        value="{{ $order->order_details }}" autofocus required>

                                        <a href="#" class="btn btn-info">Create Invoice</a>

                                        @if ($errors->has('order_details'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('order_details') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('order_status') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="order_status">{{ __('Order status') }}</label>
                                        <input type="text" name="order_status" id="order_status" class="form-control 
                                        form-control-alternative{{ $errors->has('order_status') ? ' is-invalid' : '' }}" 
                                        value="{{ $order->order_status }}" required autofocus>

                                        @if ($errors->has('order_status'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('order_status') }}</strong>
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