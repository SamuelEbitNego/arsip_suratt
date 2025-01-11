@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-4">
        <h2><b>Mengelola Pengguna</b></h2>
    </div>
    <form>
        <div class="d-flex flex-wrap gap-2 mb-3">
            <a href="{{ route('superadmin.users.create') }}" class="btn btn-primary mb-3">
                <i class="fa-solid fa-circle-plus"></i> Tambahkan Akun
            </a>
            <div class="col-md-3">
                <input type="email" name="email" class="form-control" placeholder="Cari Email">
            </div>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <button type="submit" class="btn btn-primary" cold-md-3>
                    <i class="fas fa-search"></i> Cari Surat
                </button>
            </div>
        </div>
    </form>

    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="d-flex flex-column flex-md-row gap-2">
                            <a href="{{ route('superadmin.users.edit', $user->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-user-pen"></i> Ubah
                            </a>
                            <form action="{{ route('superadmin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection