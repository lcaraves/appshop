@extends('layouts.app')

@section('htmlheader_title', 'Dashboard App Shop')
@section('body-class', 'product-page')
    
@section('content')
        <div class="header header-filter" style="background-image: url('{{asset('img/landing_page.jpg')}}');">
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section">
                    <h2 class="title text-center">Dashboard</h2>
                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <!-- Carrito de Compras -->
                        <li class="active">
                            <a href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de Compras
                            </a>
                        </li>
                        <!-- Pedidos -->
                        <li>
                            <a href="#tasks" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos Realiazados
                            </a>
                        </li>
                    </ul>
                    
                    <hr>
                    <p>Tú carrito de compras presenta {{auth()->user()->cart->details->count()}} Productos</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="text-right">Precios</th>
                                <th class="text-right">Cantidad</th>
                                <th class="text-right">SubTotal</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->cart->details as $detail)
                            <tr>
                                <td class="text-center">
                                    <img src="{{$detail->product->featured_image_url}}" alt="" height="75" class="img-rounded">
                                </td>
                                <td>
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{$detail->product->name}}</a>
                                </td>
                                <td class="text-right">&euro; {{$detail->product->price}}</td>
                                <td class="text-right">{{$detail->quantity}}</td>
                                <td class="text-right">&euro; {{$detail->quantity * $detail->product->price}}</td>
                                <td class="td-actions text-right">
                                    </button>
                                    <form action=" {{ url('/cart') }} " method="post">
                                        <!-- Info -->
                                        <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <!-- Delete -->    
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                        <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form action="{{url('/order')}}" method="post">
                        {{ csrf_field() }}
                        <div class="text-center">
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons"> done </i> Realizar Pedido
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footer')

@endsection