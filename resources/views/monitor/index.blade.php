@extends('layouts.master')

@section('content')
<div class="container p-5" style="background-color: #a5def2">
            <h5 class="text-center mb-5">Project Monitoring
                <a href="{{ route('project-monitor.create') }}"
                class="btn btn-primary" style="float: right">
                <i class="bi bi-plus"></i>
                Tambah Project
                </a>
            </h5>
            @if (Session::has('pesan'))
                <div class="alert alert-success">
                    {{ Session::get('pesan') }}
                </div>
                
            @endif
            <form action="{{ route('project-monitor.search') }}" method="GET">@csrf
                <div class="form-group">
                    <input type="text" name="word" placeholder="Cari Nama Project">
                </div>
            
            </form>
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th style="font-size: 14px">NO</th>
                        <th style="font-size: 14px">PROJECT NAME</th>
                        <th style="font-size: 14px">CLIENT</th>
                        <th style="font-size: 14px">PROJECT LEADER</th>
                        <th style="font-size: 14px">START DATE</th>
                        <th style="font-size: 14px">END DATE</th>
                        <th style="font-size: 14px">PROGRESS</th>
                        <th style="font-size: 14px">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td style="font-size: 12px">{{ ++$no }}</td>
                            <td style="font-size: 12px">{{ $project->project_name }}</td>
                            <td style="font-size: 12px">{{ $project->client }}</td>
                           
                                <td>
                                    <div class="d-flex align-items-center">

                                        <img
                                            src="{{ asset('images/'.$project->leader->image) }}"
                                            alt=""
                                            style="width: 45px; height: 45px"
                                            class="rounded-circle mr-1"
                                            />
                                        
                                      
                                      <div class="ms-3">
                                        <p class="font-weight-bold mb-1">{{ $project->leader->name }}</p>
                                        <p class="text-muted mb-0" style="font-size: 11px">{{ $project->leader->email }}</p>
                                      </div>
                                    </div>
                               
                            </td>
                            <td style="font-size: 12px">{{ $project->start_date->format('d M Y') }}</td>
                            <td style="font-size: 12px">{{ $project->end_date->format('d M Y') }}</td>
                            {{-- <td>{{ $project->progress }}</td> --}}
                            <td>
                                <?php
                                $width = round(($project->progress)*1,2);
                                
                                echo '
                                <div class="row d-flex align-items-center">
                                <div class="col">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="'.$width.'"
                                        aria-valuemin="0" aria-valuemax="100" style="width:'.$width.'%">
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <span class="percent">
                                    <span style="font-size: 12px">'.$width.'%</span>
                                </span>
                                </div>
                                ';
                                
                                
                                ?>
                            </td>
                            
                            <td>
                                <form action="{{ route('project-monitor.destroy', $project->id) }}" method="POST">@csrf
                                <a href="{{ route('project-monitor.edit', $project->id) }}" class="btn btn-success ml-2 btn-sm"><i class="bi bi-pen"></i>Edit</a>
                                <button onclick="return confirm('Mau dihapus?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>Jumlah Project: {{ $total }}</div>
            <div>{{ $projects->links('pagination::bootstrap-4') }}</div>
            <div class="d-flex">
                <div class="ml-auto">
                   Created by: <span class="font-weight-bold">Afiqur Rahman</span>
                </div>
           </div>
</div>


@endsection