@extends('partials.admin.main')
@section('content')
    <div class="container-fluid ">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Data Tahun Ajaran</h4>
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
                        data-bs-target="#addTahunAjaranForm">
                        <i class="bi bi-plus"></i> Tambah Tahun Ajaran
                    </button>
                    <form action="{{ route('admin.tahunAjaran.index') }}" method="GET" class="d-flex">
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
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tahunAjarans as $index => $tahunAjaran)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $tahunAjaran->tahun_ajaran }}</td>
                                    <td>{{ $tahunAjaran->semester }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="collapse"
                                            data-bs-target="#editTahunAjaranForm-{{ $tahunAjaran->id }}"
                                            onclick="closeOtherEditForms('{{ $tahunAjaran->id }}')">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.tahunAjaran.destroy', $tahunAjaran->id) }}"
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

        <div class="collapse mt-3 mb-4" id="addTahunAjaranForm">
            <div class="card card-body">
                <h5 class="card-title">Tambah Tahun Ajaran Baru</h5>
                <form action="{{ route('admin.tahunAjaran.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tahun_ajaran" class="form-label">Tahun Ajaran/Periode</label>
                            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran"
                                placeholder="Contoh: 2023/2024" required>
                        </div>
                        <div class="col-md-6">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" id="semester" name="semester" required>
                                <option value="">Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse"
                        data-bs-target="#addTahunAjaranForm">Batal</button>
                </form>
            </div>
        </div>

        @foreach ($tahunAjarans as $tahunAjaran)
            <div class="collapse mt-3 mb-4 edit-form-container" id="editTahunAjaranForm-{{ $tahunAjaran->id }}">
                <div class="card card-body">
                    <h5 class="card-title">Edit Tahun Ajaran</h5>
                    <form action="{{ route('admin.tahunAjaran.update', $tahunAjaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_tahun_ajaran-{{ $tahunAjaran->id }}" class="form-label">Tahun
                                    Ajaran/Periode</label>
                                <input type="text" class="form-control" id="edit_tahun_ajaran-{{ $tahunAjaran->id }}"
                                    name="tahun_ajaran" value="{{ $tahunAjaran->tahun_ajaran }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_semester-{{ $tahunAjaran->id }}" class="form-label">Semester</label>
                                <select class="form-select" id="edit_semester-{{ $tahunAjaran->id }}" name="semester"
                                    required>
                                    <option value="Ganjil" {{ $tahunAjaran->semester == 'Ganjil' ? 'selected' : '' }}>
                                        Ganjil</option>
                                    <option value="Genap" {{ $tahunAjaran->semester == 'Genap' ? 'selected' : '' }}>Genap
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="collapse"
                            data-bs-target="#editTahunAjaranForm-{{ $tahunAjaran->id }}">Batal</button>
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
                        'editTahunAjaranForm-{{ $tahunAjaran->id ?? '' }}'));
                    editForm.show();
                @else
                    var addForm = new bootstrap.Collapse(document.getElementById('addTahunAjaranForm'));
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
            const addForm = new bootstrap.Collapse(document.getElementById('addTahunAjaranForm'), {
                toggle: false
            });
            addForm.hide();
        }
    </script>
@endpush
