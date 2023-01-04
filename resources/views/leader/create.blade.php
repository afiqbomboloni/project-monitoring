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
            <form action="{{ route('project-leader.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <form>
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image Avatar</label>
                    <input class="form-control" type="file" id="image" name="image" required accept="image/png, image/jpg, image/jpeg">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/project-leader" class="btn btn-secondary">Batal</a>
              </form>
            </form>
        </div>
    </div>
</div>


@endsection