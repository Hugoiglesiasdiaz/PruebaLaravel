@extends('layout')

@section('title', 'About')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <img class="img-fluid mb-4" src="/img/about.svg" alt="Quien soy">
    </div>
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h1 class="display-4 text-primary">Quien soy</h1>
            <p class="lead text-secondary">
                Bienvenidos a mi sitio web personal, aquí podrás encontrar información sobre mis proyectos y contactarme.
            </p>
            <a class="btn btn-lg btn-block btn-primary" href{{route('contact')}}>Contáctame</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href{{route('projects.index')}}>Portafolio</a>
        </div>
    </div>
</div>

@endsection