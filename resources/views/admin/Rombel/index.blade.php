@php
    $tingkats = \App\Models\Tingkat::all();
    $jurusans = \App\Models\Jurusan::all();
@endphp
@extends('partials.admin.main')
@section('content')
    <div class="container-fluid ">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Rombel</h4>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="collapse"
                        data-bs-target="#addRombelForm">
                        <i class="bi bi-plus"></i> Tambah Rombel
                    </button>
                    <form action="{{ route('admin.rombel.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Tahun Ajaran"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tingkat</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rombels as $index => $rombel)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $rombel->tingkat->tingkat }}</td>
                                    <td>{{ $rombel->jurusan->jurusan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="collapse"
                                            data-bs-target="#editRombelForm-{{ $rombel->id }}"
                                            onclick="closeOtherEditForms('{{ $rombel->id }}')">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.rombel.destroy', $rombel->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data tahun ajaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="collapse mt-3 mb-4" id="addRombelForm">
            <div class="card card-body">
                <h5 class="card-title">Tambah Rombel</h5>
                <form action="{{ route('admin.rombel.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="rombel" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="rombel" name="rombel"
                                placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tingkat" class="form-label">Tingkat</label>
                            <select class="form-select" id="tingkat" name="tingkat_id" required>
                                @foreach ($tingkats as $tingkat)
                                    <option value="{{ $tingkat->id }}">{{ $tingkat->tingkat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select class="form-select" id="jurusan" name="jurusan_id" required>
                                @foreach ($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse"
                        data-bs-target="#addRombelForm">Batal</button>
                </form>
            </div>
        </div>

        @foreach ($rombels as $rombel)
            <div class="collapse mt-3 mb-4 edit-form-container" id="editRombelForm-{{ $rombel->id }}">
                <div class="card card-body">
                    <h5 class="card-title">Edit Rombel</h5>
                    <form action="{{ route('admin.rombel.update', $rombel->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_rombel-{{ $rombel->id }}" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="edit_rombel-{{ $rombel->id }}"
                                    name="rombel" value="{{ $rombel->rombel }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_tingkat-{{ $rombel->id }}" class="form-label">Tingkat</label>
                                <select class="form-select" id="edit_tingkat-{{ $rombel->id }}" name="tingkat_id"
                                    required>
                                    @foreach ($tingkats as $tingkat)
                                        <option value="{{ $tingkat->id }}"
                                            {{ $rombel->tingkat_id == $tingkat->id ? 'selected' : '' }}>
                                            {{ $tingkat->tingkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_jurusan-{{ $rombel->id }}" class="form-label">Jurusan</label>
                                <select class="form-select" id="edit_jurusan-{{ $rombel->id }}" name="jurusan_id"
                                    required>
                                    @foreach ($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}"
                                            {{ $rombel->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                                            {{ $jurusan->jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="collapse"
                            data-bs-target="#editRombelForm-{{ $rombel->id }}">Batal</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        // If there are validation errors, show the form automatically
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                @if (isset($editMode) && $editMode)
                    var editForm = new bootstrap.Collapse(document.getElementById(
                        'editRombelForm-{{ $rombel->id ?? '' }}'));
                    editForm.show();
                @else
                    var addForm = new bootstrap.Collapse(document.getElementById('addRombelForm'));
                    addForm.show();
                @endif
            });
        @endif

        // Function to close other edit forms when opening a new one
        function closeOtherEditForms(currentId) {
            document.querySelectorAll('.edit-form-container').forEach(form => {
                if (!form.id.includes(currentId)) {
                    const collapse = new bootstrap.Collapse(form, {
                        toggle: false
                    });
                    collapse.hide();
                }
            });

            // Also close add form when opening edit form
            const addForm = new bootstrap.Collapse(document.getElementById('addRombelForm'), {
                toggle: false
            });
            addForm.hide();
        }
    </script>
@endpush
