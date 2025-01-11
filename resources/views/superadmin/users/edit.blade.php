@extends('layouts.app')

@section('content')
<div class="container">
     <h2>Edit User</h2>

     @if ($errors->any())
     <div class="alert alert-danger">
          <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
          </ul>
     </div>
     @endif
     <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
          </div>
          <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
          </div>
          <div class="form-group">
               <label for="role">Role</label>
               <select name="role" id="role" class="form-control" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
               </select>
          </div>
          <div class="form-group">
               <label for="password">Password (leave blank to keep current password)</label>
               <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
               <label for="password_confirmation">Confirm Password</label>
               <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i> Update User</button>
          <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary"><i class="fa-solid fa-power-off"></i> Cancel</a>
     </form>
</div>
@endsection