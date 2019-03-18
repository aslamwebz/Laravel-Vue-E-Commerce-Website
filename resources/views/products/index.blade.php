@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7 ">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Products') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">{{ __('Add Product') }}</a>
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
                            <table class="table align-items-center table-bordered table-flush" id="productTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Cost</th>
                                        <th>Product Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->pid}}</td>
                                            <td><a href="{{route('product.show', $product->pid)}}">{{$product->product_name}}</a></td>
                                            <td>{{$product->product_cost}}</td>
                                            <td>{{$product->product_price}}</td>
                                            <td>{{$product->product_quantity}}</td>
                                            <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <form action="{{ route('product.destroy', $product->pid) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                
                                                                <a class="dropdown-item" href="{{ route('product.edit', $product->pid) }}">{{ __('Edit') }}</a>
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
                                {{ $products->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
      @include('layouts.footers.auth')
</div>


@endsection

@section('scripts')
{{-- <script>
        $(document).ready( function () {
            $('#productTable').DataTable();
    } );
    </script> --}}
@endsection