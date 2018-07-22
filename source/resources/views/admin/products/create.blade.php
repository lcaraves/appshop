@extends('layouts.app')

@section('htmlheader_title', 'Bienvenidos App Shop')
@section('body-class', 'product-page')
    
@section('content')
        <div class="header header-filter" style="background-image: url('{{asset('img/landing_page.jpg')}}');">
        </div>
        
        <div class="main main-raised">
            <div class="container">
            
                <div class="section">
                    <h2 class="title text-center">Registrar Nuevo Producto</h2>
                    
                    @include('common.error')
                    <form action="{{url('/admin/products')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <!-- Name -->
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del Producto</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <!-- Price -->
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio</label>
                                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>    
                        </div>
                        
                        <!-- Description -->
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción Corta</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                        </div>
                        
                        <!-- Long Description -->
                        <textarea class="form-control" placeholder="Descripción Larga" rows="5" name="long_description">
                            {{ old('long_description') }}
                        </textarea>
                        
                        <button class="btn btn-primary">Registrar Producto</button>
                        <a href="{{ url('/admin/products/') }}" class="btn btn-info">Cancelar</a>
                    </form>
                </div>

            </div>    
        </div>

        @include('layouts.footer')
        
@endsection

