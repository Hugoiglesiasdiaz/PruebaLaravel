<?php


namespace App\Http\Controllers;
use App\Models\Project;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('portfolio', ['projects'=> Project::orderBy('created_at', 'DESC')->paginate(2)]);
    }

}