<?php


namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Project;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index', ['projects' => Project::orderBy('created_at', 'DESC')->get()]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects.create',[
            'project' => new Project
        ]);
    }

    public function store(SaveProjectRequest $request){

        $project = new Project ($request->validated()); 
        $project->image = $request->file('image')->store('images');
        $project->save();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        // Verificamos si hay una imagen cargada y la procesamos en consecuencia
    if ($request->hasFile('image')) {
        // Eliminamos la imagen existente si la hay
        if ($project->image) {
            Storage::delete($project->image);
        }
        // Guardamos la nueva imagen
        $project->image = $request->file('image')->store('images');
    }

    // Actualizamos el proyecto con los datos validados
    $project->update(array_filter($request->validated()));

    return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con éxito');
    }	

    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito');
    }

}