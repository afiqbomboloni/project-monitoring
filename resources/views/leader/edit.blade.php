@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Leader</h4>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
            @endif
            <form action="{{ route('project-leader.update', $leader->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <form>
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $leader->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $leader->email }}">
                  </div>
                  <div class="mb-3">
                    <label>Avatar</label>
                    <br><img src="{{ asset('images/'.$leader->image) }}" style="width: 100px">
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Ganti Image Avatar</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg">
                    <label>*) Jika Tidak diganti kosongkan saja</label>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/project-leader" class="btn btn-secondary">Batal</a>
              </form>
            </form>
        </div>
    </div>
</div>


@endsection