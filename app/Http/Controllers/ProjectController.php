<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('site.index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::with(['team.users', 'professor'])->findOrFail($id);    

        if (!$project->team) {
            return redirect()->back()->with('error', 'Projeto não está associado a nenhuma equipe.');
        }

        return view('site.project', compact('project'));
    }

    public function addProjeto()
    {
        return view('site.addProjeto');
    }
}
