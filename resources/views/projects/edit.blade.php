@extends('layout')

@section('title', 'Crear Proyecto')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto"></div>
        



        @include('partials.validation-errors')


        <form class="bg-white py-3 shadow rounded" method="POST" enctype="multipart/form-data" action="{{ route('projects.update', $project) }}">
        <h1 class="display-4">Editar proyecto</h1>
        <hr>
            @method('PATCH')

            @include('projects._form', ['btnText' => 'Actualizar'])

        </form>
    </div>
</div>
</div @endsection