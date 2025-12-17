@extends('guest.layouts.main')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-success">Edit User</h3>
    <a href="{{ route('guest.user.index') }}" class="btn btn-outline-secondary rounded-pill px-3">Kembali</a>
  </div>

  <div class="card mb-3 border-0 shadow-sm rounded-4">
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('guest.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label fw-semibold">Nama</label>
          <input id="name" name="name" type="text" class="form-control"
                 value="{{ old('name', $user->name) }}" required maxlength="100">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Email</label>
          <input id="email" name="email" type="email" class="form-control"
                 value="{{ old('email', $user->email) }}" required>
        </div>

        {{-- ==================== ROLE ==================== --}}
        <div class="mb-3">
          <label for="role" class="form-label fw-semibold">Role</label>
          <select name="role" id="role" class="form-control rounded-3" required>
            <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>GUEST</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>ADMIN</option>
            <option value="kades" {{ $user->role == 'kades' ? 'selected' : '' }}>KADES</option>
          </select>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="password" class="form-label fw-semibold">
              Password (kosongkan jika tidak ingin mengganti)
            </label>
            <input id="password" name="password" type="password" class="form-control" minlength="8">
          </div>

          <div class="col-md-6 mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                   class="form-control" minlength="8">
          </div>
        </div>

        <div class="d-flex gap-2">
          <button class="btn btn-success rounded-pill px-4">Update</button>
          <a href="{{ route('guest.user.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
