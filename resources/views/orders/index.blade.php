@extends('layouts.app', ['title' => __('Order Management')])

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7 ">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Orders') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary">{{ __('Add Order') }}</a>
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
                            <table class="table align-items-center table-bordered table-flush"id="productTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Ordered By</th>
                                        <th>Order Date</th>
                                        <th>Due Date</th>
                                        <th>Order Details</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td><a href="{{route('orders.show', $order->id)}}">{{$order->order_to}}</a></td>
                                            <td>{{$order->order_date}}</td>
                                            <td>{{$order->due_date}}</td>
                                            <td>{{$order->order_details}}</td>
                                            <td>{{$order->order_status}}</td>
                                            <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                
                                                                <a class="dropdown-item" href="{{ route('orders.edit', $order->id) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this order?") }}') ? this.parentElement.submit() : ''">
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
                                {{ $orders->links() }}
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