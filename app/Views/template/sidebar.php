<?php
$currentAdminPath = service('uri')->getPath();
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-custom sidebar sidebar-dark accordion shadow" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="/admin">
        <div class="sidebar-brand-icon">
            <i class="fas fa-play-circle text-danger fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-2 text-white font-weight-bold" style="letter-spacing: 0.5px;">
            Anime<span style="color: #e53637;">desu</span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($currentAdminPath === 'admin' || $currentAdminPath === 'admin/') ? 'active' : ''; ?>">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Konten Anime
    </div>

    <!-- Nav Item - Anime Collapse Menu -->
    <li class="nav-item <?= strpos($currentAdminPath, 'anime') !== false ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnime" aria-expanded="true"
            aria-controls="collapseAnime">
            <i class="fas fa-fw fa-tv"></i>
            <span>Anime Series</span>
        </a>
        <div id="collapseAnime" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/anime"><i class="fas fa-fw fa-folder mr-2"></i>Semua Anime</a>
                <a class="collapse-item" href="/admin/new-anime"><i class="fas fa-fw fa-plus mr-2"></i>Tambah Baru</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Episode Collapse Menu -->
    <li class="nav-item <?= strpos($currentAdminPath, 'episode') !== false ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEpisode"
            aria-expanded="true" aria-controls="collapseEpisode">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Episode</span>
        </a>
        <div id="collapseEpisode" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/episode"><i class="fas fa-fw fa-folder mr-2"></i>Semua Episode</a>
                <a class="collapse-item" href="/admin/new-episode"><i class="fas fa-fw fa-plus mr-2"></i>Tambah Episode</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Halaman Collapse Menu -->
    <li class="nav-item <?= strpos($currentAdminPath, 'page') !== false ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHalaman" aria-expanded="true"
            aria-controls="collapseHalaman">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Halaman</span>
        </a>
        <div id="collapseHalaman" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/page"><i class="fas fa-fw fa-folder mr-2"></i>Semua Halaman</a>
                <a class="collapse-item" href="/admin/new-page"><i class="fas fa-fw fa-plus mr-2"></i>Tambah Halaman</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistem
    </div>

    <!-- Nav Item - Statistik -->
    <li class="nav-item <?= strpos($currentAdminPath, 'statistik') !== false ? 'active' : ''; ?>">
        <a class="nav-link" href="/admin/statistik">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Statistik</span></a>
    </li>

    <!-- Nav Item - Pengaturan -->
    <li class="nav-item <?= strpos($currentAdminPath, 'setting') !== false ? 'active' : ''; ?>">
        <a class="nav-link" href="/admin/setting">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Pengaturan</span></a>
    </li>

    <!-- Nav Item - Lihat Website Utama -->
    <li class="nav-item">
        <a class="nav-link" href="/" target="_blank">
            <i class="fas fa-fw fa-external-link-alt"></i>
            <span>Lihat Website</span></a>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link text-danger" href="/logout">
            <i class="fas fa-fw fa-sign-out-alt text-danger"></i>
            <span>Keluar (Logout)</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->