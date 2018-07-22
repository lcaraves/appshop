@extends('layouts.app')

@section('htmlheader_title', 'Bienvenidos App Shop')
@section('body-class', 'landing-page')

@section('styles')

@endsection
    <style>
        .team .row .col-md-4{
            margin-bottom: 5em;
        }

        .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }

        .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }
    </style>
@section('content')
        <div class="header header-filter" style="background-image: url('{{asset('img/landing_page.jpg')}}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenidos a App Shop</h1>
                        <h4>Realiza los pedidos en línea y te contactaremos para coodinar la entrega.</h4>
                        <br />
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> ¿Cómo funciona?
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">¿Porqué App Shop?</h2>
                            <h5 class="description">Puedes revisar nuestra realción completa de productos, comparar precios, y realizar tus pedidos cuando estes seguro. </h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">Atendemos tus dudas</h4>
                                    <p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estas sólo, sino que siempre estamos atentos a tus inquietudes.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Pago Seguro</h4>
                                    <p>Todo pedido que realizas será confirmado a través de una llamda, Sí no confías en los pagos en líneas puedes pagar contra entrega el valor acordado.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Información Privada</h4>
                                    <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section text-center">
                    <h2 class="title">Productos Disponibles</h2>

                    <div class="team">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="{{ $product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                                    <h4 class="title"> 
                                        <a href="{{ url('/products/'. $product->id) }}">{{$product->name}}</a>
                                        <br>
                                        <small class="text-muted">{{$product->category ? $product->category->name : 'General'}}</small>
                                    </h4>
                                    <p class="description">
                                        {{$product->description}}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            {{ $products->links() }}
                        </div>
                    </div>

                </div>


                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">Work with us</h2>
                            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Name</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Your Messge</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                               About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; {{ date('Y') }} , made with <i class="fa fa-heart heart"></i> by Creative Tim
                </div>
            </div>
        </footer>

@endsection