@extends('guest.layouts.main')

@section('title', 'Tambah Program Bantuan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Program Bantuan</h1>

    <form action="{{ route('guest.program_bantuan.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="kode" class="block text-gray-700 font-semibold mb-2">Kode Program</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
            @error('kode')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_program" class="block text-gray-700 font-semibold mb-2">Nama Program</label>
            <input type="text" name="nama_program" id="nama_program" value="{{ old('nama_program') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
            @error('nama_program')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tahun" class="block text-gray-700 font-semibold mb-2">Tahun</label>
            <input type="number" name="tahun" id="tahun" value="{{ old('tahun') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
            @error('tahun')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="anggaran" class="block text-gray-700 font-semibold mb-2">Anggaran (Rp)</label>
            <input type="number" name="anggaran" id="anggaran" value="{{ old('anggaran') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" required>
            @error('anggaran')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('guest.program_bantuan.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">Batal</a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
