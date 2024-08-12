@csrf
@if ($project->image)
            <img class="card-img-top mb-2" src="/storage/{{ $project->image }}" alt="{{ $project->title }} style="height:250px; object-fit: cover"">    
@endif

<div class="custom-file mb-2">
    <input name="image" type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Seleccionar imagen</label>
</div>

<div class="form-group">
    <label for="category_id">Categoría del proyecto</label>
    <select name="category_id" id="category_id" class="form-control border-0 bg-light shadow-sm">
    <option value="">Seleccione</option>
    @foreach ($categories as $id => $name)
        <option value="{{$id}}" {{$id == old('category_id',$project->category_id) ? 'selected' : ''}}>{{$name }}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
    <label>
        Título del proyecto <br>
        <input class="form-control border-0 bg-light shadow-sm" type="text" id="name" name="title"
            value="{{ old('title', $project->title) }}">
    </label>
</div>
<br>
<div class="form-group">
    <label>
        Url del proyecto <br>
        <input class="form-control border-0 bg-light shadow-sm" type="text" id="url" name="url"
            value="{{ old('url', $project->url) }}">
    </label>
</div>
<br>
<div class="form-group">
    <label>
        Descripción del proyecto <br>
        <textarea class="form-control border-0 bg-light shadow-sm" id="description" name="description">{{ old('title', $project->description) }}</textarea>
    </label>
</div>
<br>

<button class="btn btn-primary btn-lg w-100" type="submit">{{ $btnText }}</button>
<a class="btn btn-link w-100" href="{{ route('projects.index') }}">Cancelar</a>
