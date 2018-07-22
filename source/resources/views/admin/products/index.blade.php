@extends('layouts.app')

@section('htmlheader_title', 'Listado de Productos')
@section('body-class', 'product-page')
    
@section('content')
        <div class="header header-filter" style="background-image: url('{{asset('img/landing_page.jpg')}}');">
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center">
                    <h2 class="title">Listado de Productos Disponibles</h2>

                    <div class="team">
                        <div class="row">
                            <a href=" {{url('/admin/products/create')}} " class="btn btn-primary btn-round">Nuevo Producto</a>
                            @include('admin.products.table')

                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        @include('layouts.footer')
        
@endsection
