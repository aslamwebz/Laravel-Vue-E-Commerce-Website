@extends('layouts.app', ['title' => __('Sales Management')])

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7 ">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Sales') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">{{ __('Add Sales Data') }}</a>
                                </div>
                            </div>
                        </div>      
                        <div class="col-12">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
    
                        <div class="table-responsive p-1">
                            <table class="table align-items-center table-flush table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Product ID</th>
                                        <th>Description</th>
                                        <th>Sale Date</th>
                                        <th>Sold To</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{$sale->id}}</td>
                                            <td>{{$sale->product_id}}</td>
                                            <td><a href="{{route('sales.show', $sale->id)}}">{{$sale->description}}</a></td>
                                            <td>{{$sale->sale_date}}</td>
                                            <td>{{$sale->sold_to}}</td>
                                            <td>{{$sale->quantity}}</td>
                                            <td>{{$sale->unit_price}}</td>
                                            <td>{{$sale->total}}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item" href="{{ route('sales.show', $sale->id) }}">{{ __('View') }}</a>
                                                            <a class="dropdown-item" href="{{ route('sales.edit', $sale->id) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this product?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $sales->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
      @include('layouts.footers.auth')
</div>
@endsection