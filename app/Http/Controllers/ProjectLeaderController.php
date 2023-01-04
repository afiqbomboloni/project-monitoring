<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectLeaderRequest;
use App\Models\ProjectLeader;
use App\Models\ProjectMonitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectLeaderController extends Controller
{
    public function index()
    {   
        $limit = 5;
        $total = ProjectLeader::count();
        $leaders = ProjectLeader::orderBy('id', 'desc')->paginate($limit);
        $no = $limit * ($leaders->currentPage() - 1);
        return view('leader.index', compact('leaders', 'no', 'total'));
    }
    public function create()
    {
        
        return view('leader.create');
    }
    public function add(Request $request)
    {
       $this->validate($request, [
        'name' => 'required',
        'email' => 'required|string|email|unique:project_leader',
        'image' => 'nullable|image|mimes:png,jpg, jpeg'
       ]);
       $leader = new ProjectLeader();
       $leader->name = $request->name;
       $leader->email = $request->email;

       $image = $request->image;
       $fileName = time().'.'.$image->getClientOriginalExtension();
       $image->move('images/', $fileName);

       $leader->image = $fileName;
       $leader->save();
       return redirect('/project-leader')->with('pesan', 'Data Leader Berhasil Disimpan');
    }

    public function edit($id)
    {
        $leader = ProjectLeader::find($id);
        return view('leader.edit', compact( 'leader'));
        
    }

    public function update(Request $request, $id)
    {
        $leader = ProjectLeader::find($id);
        if($request->has('image'))
        {
            $leader->name = $request->name;
            $leader->email = $request->email;
            
            $image = $request->image;
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move('images/', $fileName);
            $leader->image = $fileName;

            
        } else {
            $leader->name = $request->name;
            $leader->email = $request->email;

        }

        $leader->update();
        return redirect('/project-leader')->with('pesan', 'Data Leader Berhasil Dihapus');
    }

    public function destroy($id)
    {
        $leader = ProjectLeader::find($id);
        $fileName = $leader->image;
        File::delete('images/'.$fileName);
        $leader->delete();
        return redirect('/project-leader')->with('pesan', 'Data Berhasil dihapus');
    }
        
}
