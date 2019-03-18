@extends('layouts.app', ['title' => __('Customer Management')])

@section('content')
    @include('products.partials.header', ['title' => __('')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 order-xl-1">
                <div class="card bg-secondary shadow mt--4">
                    <div class="card-header bg-white border-0">
                        <div class="row ">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Customer Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('customers.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <form method="POST" action="{{ route('customers.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                
                                <h6 class="heading-small text-muted mb-4">{{ __('Customer information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('customer_name') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="customer_name">{{ __('Customer Name') }}</label>
                                                    <input type="text" name="customer_name" id="customer_name" class="form-control 
                                                    form-control-alternative{{ $errors->has('customer_name') ? ' is-invalid' : '' }}" 
                                                    value="{{ old('customer_name') }}" required autofocus>
            
                                                    @if ($errors->has('customer_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('customer_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('customer_email') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="customer_email">{{ __('Customer Email') }}</label>
                                                    <input type="text" name="customer_email" id="customer_email" class="form-control 
                                                    form-control-alternative{{ $errors->has('customer_email') ? ' is-invalid' : '' }}" 
                                                    value="{{ old('customer_email') }}" required autofocus>
            
                                                    @if ($errors->has('customer_email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('customer_email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('customer_address') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="customer_address">{{ __('Customer Address') }}</label>
                                                    <input type="text" name="customer_address" id="customer_address" class="form-control 
                                                    form-control-alternative{{ $errors->has('customer_address') ? ' is-invalid' : '' }}" 
                                                    value="{{ old('customer_address') }}" required autofocus>
            
                                                    @if ($errors->has('customer_address'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('customer_address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('customer_contact') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="customer_contact">{{ __('Customer Contact') }}</label>
                                                    <input type="text" name="customer_contact" id="customer_contact" class="form-control 
                                                    form-control-alternative{{ $errors->has('customer_contact') ? ' is-invalid' : '' }}" 
                                                    value="{{ old('customer_contact') }}" required autofocus>
            
                                                    @if ($errors->has('customer_contact'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('customer_contact') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> 
                                            </div>
                                        </div>
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