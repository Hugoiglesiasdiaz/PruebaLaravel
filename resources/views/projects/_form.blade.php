@csrf

<label>
    Título del proyecto <br>
    <input class="form-control border-0 bg-light shadow-sm" type="text" id="name" name="title" value="{{ old('title', $project->title)}}">
</label>
<br>
<label>
    Url del proyecto <br>
    <input class="form-control border-0 bg-light shadow-sm" type="text" id="url" name="url" value="{{ old('url', $project->url)}}">
</label>
<br>
<label>
    Descripción del proyecto <br>
    <textarea class="form-control border-0 bg-light shadow-sm" id="description" name="description">{{ old('title', $project->description)}}</textarea>
</label>
<br>
<button class="btn btn-primary btn-lg w-100" type="submit">{{$btnText}}</button>
<a class="btn btn-link w-100" href="{{route('projects.index')}}">Cancelar</a>