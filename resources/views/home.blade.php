@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-12">
        <img class="img-fluid mb-4" src="/img/home.svg" alt="Desarrollo Web">
    </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-primary">Desarrollo web</h1>
            <p class="lead text-secondary">
                Bienvenidos a mi sitio web personal, aquí podrás encontrar información sobre mis proyectos y contactarme.
            </p>
            <a class="btn btn-lg btn-block btn-primary" href{{route('contact')}}>Contáctame</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href{{route('projects.index')}}>Portafolio</a>
        </div>
    </div>
</div>
@endsection