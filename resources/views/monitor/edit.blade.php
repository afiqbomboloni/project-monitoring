@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Edit Project</h4>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
            @endif
            <form action="{{ route('project-monitor.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <form>
                <div class="mb-3">
                  <label class="form-label">Project Name</label>
                  <input type="text" class="form-control" name="project_name" id="project_name" value="{{ $project->project_name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Client</label>
                    <input type="text" class="form-control" name="client" id="client" value="{{ $project->client }}">
                  </div>
                  <div class="mb-3">
                    <label for="">Project Leader</label>
                        <select name="leader_id" class="form-control @error('leader_id') is-invalid @enderror">
                            <option value="">Pilih Project Leader</option>
                            @foreach ($leader as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                        @error('leader_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ date('Y-m-d',strtotime($project->start_date)) }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ date('Y-m-d',strtotime($project->end_date)) }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Progress</label>
                    <input type="number" class="form-control" name="progress" id="progress" value="{{ $project->progress }}">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/project-monitor" class="btn btn-secondary">Batal</a>
              </form>
            </form>
        </div>
    </div>
</div>


@endsection