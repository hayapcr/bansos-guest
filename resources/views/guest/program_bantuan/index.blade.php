@extends('guest.layouts.main')

@section('content')
<div class="container">
    <h3 class="text-success fw-bold mb-4">Daftar Program Bantuan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('guest.program_bantuan.create') }}" class="btn btn-success mb-3">+ Tambah Program</a>

    <table class="table table-bordered align-middle">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Program</th>
                <th>Tahun</th>
                <th>Anggaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama_program }}</td>
                    <td>{{ $row->tahun }}</td>
                    <td>Rp{{ number_format($row->anggaran,0,',','.') }}</td>
                    <td>
                        <a href="{{ route('guest.program_bantuan.edit', $row->program_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('guest.program_bantuan.destroy', $row->program_id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
