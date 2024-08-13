<?php


namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Project;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Events\ProjectSaved;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index', [
            'newProject' => new Project,
            'projects' => Project::with('category')->latest()->paginate(),
            'deletedProjects' => Project::onlyTrashed()->get()
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        $this->authorize('create', $project = new Project);

        return view('projects.create', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);

    }

    public function store(SaveProjectRequest $request)
    {

        $project = new Project($request->validated());

        $this->authorize('create', $project);

        $project->image = $request->file('image')->store('images');
        $project->save();

        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);


        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        $this->authorize('update', $project);
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

        ProjectSaved::dispatch($project);

        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con éxito');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        // Elimina el proyecto
        $project->delete();

        // Redirige al índice de proyectos con un mensaje de éxito
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito');
    }

    public function forceDelete($projectUrl)
    {
        $project = Project::withTrashed()->where('url', $projectUrl)->firstOrFail();

        $this->authorize('force-delete', $project);
        // Verifica si la ruta del archivo no es nula o vacía antes de intentar eliminarlo
        if (!is_null($project->image) && !empty($project->image)) {
            if (Storage::exists($project->image)) {
                // Elimina el archivo del almacenamiento
                Storage::delete($project->image);

            } else {
                // Registro para saber si el archivo no existe

            }
        } else {
            // Registro para saber si la ruta del archivo es nula o vacía

        }
        // Elimina el proyecto definitivamente
        $project->forceDelete();

        // Redirige al índice de proyectos con un mensaje de éxito
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado definitivamente');
    }

    public function restore($projectUrl)
    {
        $project = Project::withTrashed()->where('url', $projectUrl)->firstOrFail();

        $this->authorize('restore', $project);

        // Restaura el proyecto
        $project->restore();

        // Redirige al índice de proyectos con un mensaje de éxito
        return redirect()->route('projects.index')->with('status', 'El proyecto fue restaurado con éxito');
    }
}