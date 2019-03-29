@extends('layouts.app', ['title' => __('Purchases Management')])

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
                                    <a href="{{ route('purchases.create') }}" class="btn btn-sm btn-primary">{{ __('Add Purchase Data') }}</a>
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
                                        <th>Invoice No</th>
                                        <th>Purchase Date</th>
                                        <th>Seller</th>
                                        <th>Payment Type</th>
                                        <th>Buyer</th>
                                        <th>Grand Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td><a href="{{route('purchases.show', $purchase->id)}}">#0000{{$purchase->id}}</a></td>
                                            {{-- <td>
                                               @foreach( unserialize($sale->items) as $item)
                                                    {{ $item['product_name'] }}
                                               @endforeach
                                            </td> --}}
                                            <td>{{$purchase->purchase_date}}</td>
                                            <td><a href="#">{{$purchase->supplier_name}}</a></td>
                                            <td>{{$purchase->payment_type}}</td>
                                            <td>{{$purchase->purchased_by}}</td>
                                            <td>{{$purchase->grand_total}}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item" href="{{ route('purchases.show', $purchase->id) }}">{{ __('View') }}</a>
                                                            <a class="dropdown-item" href="{{ route('purchases.edit', $purchase->id) }}">{{ __('Edit') }}</a>
                                                            {{-- <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this product?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button> --}}
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
                                {{ $purchases->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
      @include('layouts.footers.auth')
</div>
@endsection