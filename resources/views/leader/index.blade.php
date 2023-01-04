@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Data Leader
                <a href="{{ route('project-leader.create') }}"
                class="btn btn-primary" style="float: right">
                <i class="bi bi-plus"></i>
                Tambah Leader
                </a>
            </h4>
        </div>
        <div class="card-body">
            @if (Session::has('pesan'))
                <div class="alert alert-success">
                    {{ Session::get('pesan') }}
                </div>
                
            @endif
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image Avatar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaders as $leader)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $leader->name }}</td>
                            <td>{{ $leader->email }}</td>
                            <td>
                                <img src="{{ asset('images/'.$leader->image) }}" style="width: 100px"></td>
                                
                            <td>

                                <a href="{{ route('project-leader.edit', $leader->id) }}" class="btn btn-success"><i class="bi bi-pen"></i>Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    <div>Jumlah Project: {{ $total }}</div>
    <div>{{ $leaders->links('pagination::bootstrap-4') }}</div>
</div>

@endsection