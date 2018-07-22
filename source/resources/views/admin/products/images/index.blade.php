@extends('layouts.app')

@section('htmlheader_title', 'Listado de Imagenes')

@section('body-class', 'product-page')
    
@section('content')
        <div class="header header-filter" style="background-image: url('{{asset('img/landing_page.jpg')}}');">
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center">
                    <h2 class="title">Listado de Imagenes {{ $product->name}}</h2>

                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="file" name="photo" required>
                        <button type="submit" class="btn btn-primary btn-round">Subir Imagen</button>
                        <a href=" {{url('/admin/products/')}} " class="btn btn-default btn-round">Volver al Listado</a>
                    </form>
                    
                    <hr>

                    <div class="row">
                    @foreach( $images as $image )
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img src="{{$image->url}}" alt="" width="250" height="250">
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="image_id" value=" {{$image->id}} ">
                                        <button type="submit" class="btn btn-danger btn-round">Eliminar Imagen</button>
                                        
                                        @if($image->featured)
                                            <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Producto Destacado">
                                            <i class="material-icons">favorite</i>
                                            </button >
                                        @else
                                            <a href="{{ url( '/admin/products/'. $product->id .'/images/select/'.$image->id ) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                            <i class="material-icons">favorite</i>
                                            </a>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>
        
        @include('layouts.footer')
        
@endsection