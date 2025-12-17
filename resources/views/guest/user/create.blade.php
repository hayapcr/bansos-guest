@extends('guest.layouts.main')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white fw-bold">Tambah User</div>
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

        <form action="{{ route('guest.user.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required maxlength="100">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>GUEST</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>ADMIN</option>
                    <option value="kades" {{ old('role') == 'kades' ? 'selected' : '' }}>KADES</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required minlength="8">
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required minlength="8">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('guest.user.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
