<div class="d-none d-md-block col-md-3">
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="rounded-circle bg-white text-primary d-flex justify-content-center align-items-center mx-auto mb-2"
                style="width: 40px; height: 40px; font-size: 20px">
                <i class="bi bi-person-fill"></i>
            </div>
            <strong>Reina Ahdya</strong><br />
            <small>(Siswa/Siswi)</small>
            {{-- logout --}}
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>
        <div class="sidebar-menu">
            <a href="#"><i class="bi bi-house-door me-2"></i> Beranda</a>
            <div class="mb-2">
                <a class="d-flex justify-content-between align-items-center sidebar-menu-link" data-bs-toggle="collapse"
                    href="#masterDropdown" role="button" aria-expanded="false" aria-controls="masterDropdown">
                    <span><i class="bi bi-cash-coin me-2"></i>Data Master</span>
                    <i class="bi bi-caret-down-fill"></i>
                </a>
                <div class="collapse ps-4 pt-2" id="masterDropdown">
                    <a href="{{ route('admin.tahunAjaran.index') }}" class="d-block mb-1">Tahun Ajaran</a>
                    <a href="{{ route('admin.jurusan.index') }}" class="d-block">Jurusan</a>
                    <a href="#" class="d-block">Tingkat</a>
                    <a href="#" class="d-block">Rombel</a>
                    <a href="#" class="d-block">Kategori Pembayaran</a>
                    <a href="#" class="d-block">Data Siswa</a>
                </div>
            </div>
            <div class="mb-2">
                <a class="d-flex justify-content-between align-items-center sidebar-menu-link" data-bs-toggle="collapse"
                    href="#pembayaranDropdown" role="button" aria-expanded="false" aria-controls="pembayaranDropdown">
                    <span><i class="bi bi-cash-coin me-2"></i> Pembayaran</span>
                    <i class="bi bi-caret-down-fill"></i>
                </a>
                <div class="collapse ps-4 pt-2" id="pembayaranDropdown">
                    <a href="#" class="d-block mb-1">Pembayaran SPP</a>
                    <a href="#" class="d-block">Pembayaran Ujian</a>
                </div>
            </div>
            <a href="#"><i class="bi bi-clock-history me-2"></i> Riwayat Pembayaran</a>
        </div>
    </div>
</div>

<!-- Sidebar Mobile (Offcanvas) -->
<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="rounded-circle bg-white text-primary d-flex justify-content-center align-items-center mx-auto mb-2"
                    style="width: 40px; height: 40px; font-size: 20px">
                    <i class="bi bi-person-fill"></i>
                </div>
                <strong>Reina Ahdya</strong><br />
                <small>(Siswa/Siswi)</small>
                <div class="mt-2">
                    <button class="btn btn-outline-danger btn-sm">Logout</button>
                </div>
            </div>
            <div class="sidebar-menu">
                <a href="#"><i class="bi bi-house-door me-2"></i> Beranda</a>
                <div class="mb-2">
                    <a class="d-flex justify-content-between align-items-center sidebar-menu-link"
                        data-bs-toggle="collapse" href="#mobilePembayaranDropdown" role="button" aria-expanded="false"
                        aria-controls="mobilePembayaranDropdown">
                        <span><i class="bi bi-cash-coin me-2"></i> Pembayaran</span>
                        <i class="bi bi-caret-down-fill"></i>
                    </a>
                    <div class="collapse ps-4 pt-2" id="mobilePembayaranDropdown">
                        <a href="#" class="d-block mb-1">Pembayaran SPP</a>
                        <a href="#" class="d-block">Pembayaran Ujian</a>
                    </div>
                </div>
                <a href="#"><i class="bi bi-clock-history me-2"></i> Riwayat
                    Pembayaran</a>
            </div>
        </div>
    </div>
</div>
