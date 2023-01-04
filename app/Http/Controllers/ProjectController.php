<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\ProjectLeader;
use App\Models\ProjectMonitoring;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function index()
    {
        $limit = 5;
        $total = ProjectMonitoring::count();
        
        $projects = ProjectMonitoring::with('leader')->paginate($limit);
        $no = $limit * ($projects->currentPage() - 1);
        return view('monitor.index', compact('projects', 'no', 'total'));
    }

    public function create()
    {
        $leader = ProjectLeader::all();
        return view('monitor.create', compact('leader'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'project_name' => 'required|unique:project_monitoring|string',
            'client' => 'required',
            'leader_id' => 'nullable',
            'start_date' => 'required|date|after:tomorrow',
            'end_date' => 'required|date|after:start_date',
            'progress' => 'required'
        ]);

        $projects = new ProjectMonitoring;
        $projects->project_name = $request->project_name;
        $projects->client = $request->client;
        $projects->leader_id = $request->leader_id;
        $projects->start_date = $request->start_date;
        $projects->end_date = $request->end_date;
        $projects->progress = $request->progress;

        $projects->save();
        return redirect('/project-monitor');


    }
    public function edit($id)
    {
        $project = ProjectMonitoring::findOrFail($id);
        $leader = ProjectLeader::all();
        return view('monitor.edit', compact('project', 'leader'));
        
    }
    public function update(Request $request, $id)
    {
        $project = ProjectMonitoring::find($id);
        $project->project_name = $request->project_name;
        $project->client = $request->client;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->progress = $request->progress;

        $project->update();
        return redirect('/project-monitor')->with('pesan', 'Data project Berhasil Diupdate');
    }
    public function destroy($id)
    {
        $project = ProjectMonitoring::find($id);
        
        $project->delete();
        return redirect('/project-monitor');
    }


    public function search(Request $request)
    {
        $limit = 5;
        $find = $request->word;
        $projects = ProjectMonitoring::where('project_name', 'like', '%'.$find.'%')->paginate($limit);
        $no = $limit * ($projects->currentPage() - 1);
        return view('monitor.search', compact('projects', 'no', 'find'));
    }
}
