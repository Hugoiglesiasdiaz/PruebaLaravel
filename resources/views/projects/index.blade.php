@extends('layout')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @isset($category)
                <div>
                    <h1 class="display-4 mb-0">{{ $category->name }}</h1>
                    <a href="{{ route('projects.index') }}">Ver todos</a>
                </div>
            @else
                <h1 class="display-4 mb-0">Proyectos</h1>
            @endisset

            @can('create', $newProject)
                <a class="btn btn-primary" href="{{ route('projects.create') }}">Crear Proyecto</a>
            @endcan
        </div>
        <p class="lead text-secondary">Proyectos realizados</p>
        <div class="d-flex flex-wrap justify-content-between align-items-start">
            @forelse ($projects as $project)
                <div class="card border-0 shadow-sm mt-4" style="width: 18rem;">
                    @if ($project->image)
                        <img src="/storage/{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}"
                            style="height:150px; object-fit: cover">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $project->created_at->format('d/m/Y') }}</h6>
                        <p class="card-text">{{ $project->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm">Ver más ...</a>
                            @if ($project->category_id)
                                <a href="{{ route('categories.show', $project->category) }}" class="badge badge-secondary"
                                    style="color: black;">{{ $project->category->name }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="card border-0 shadow-sm mt-4" style="width: 18rem;">
                    <p class="list-group-item border-0 mb-3 shadow-sm">No hay proyectos para mostrar</p>
                </div>
            @endforelse
        </div>
        @can('view-deleted-projects')
        <h4>Papelera</h4>
            <ul>
                @foreach ($deletedProjects as $deletedProject)
                    <li class="list-group-item">{{ $deletedProject->title }}
                        @can('restore', $deletedProject)
                        <form method="POST" action="{{route('projects.restore',$deletedProject)}}" class="d-inline">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-info">Restaurar</button>
                        </form>
                        @endcan
                        @can('force-delete', $deletedProject)
                        <form method="POST"
                        onsubmit="return confirm('¿Estás seguro de querer eliminar permanentemente este proyecto?')"
                         action="{{route('projects.force-delete',$deletedProject)}}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar Permanentemente</button>
                            </form>
                        @endcan
                    </li>
                @endforeach
            </ul>
        @endcan
    </div>
@endsection
