<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm" style="border-bottom: 1px solid #eaecf4;">

            <!-- Sidebar Toggle Button (Desktop & Mobile) -->
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3 text-secondary" style="font-size: 1.1rem; width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;" title="Sembunyikan/Tampilkan Menu">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Page Title Indicator -->
            <div class="d-flex align-items-center mr-auto">
                <span class="badge badge-danger mr-2 py-1 px-2 font-weight-bold text-uppercase" style="background: #e53637; font-size: 11px; letter-spacing: 0.5px;">
                    Panel
                </span>
                <h6 class="m-0 font-weight-bold text-gray-800 d-none d-sm-inline-block" style="font-size: 0.95rem;">
                    <?= esc(trim(explode('|', $judul ?? 'Dashboard')[0])); ?>
                </h6>
            </div>

            <!-- Topbar Navbar Right -->
            <ul class="navbar-nav ml-auto align-items-center">

                <!-- Quick Action: Tambah Anime -->
                <li class="nav-item mr-2 d-none d-sm-inline-block">
                    <a href="/admin/new-anime" class="btn btn-sm btn-danger shadow-sm font-weight-bold" style="background: #e53637; border: none; border-radius: 6px; padding: 6px 14px;">
                        <i class="fas fa-plus fa-sm mr-1"></i> Tambah Anime
                    </a>
                </li>

                <!-- Quick Link: Lihat Website Publik -->
                <li class="nav-item mr-2">
                    <a href="/" target="_blank" class="btn btn-sm btn-outline-secondary font-weight-bold" style="border-radius: 6px; padding: 6px 12px;" title="Buka website publik di tab baru">
                        <i class="fas fa-external-link-alt fa-sm mr-1"></i> <span class="d-none d-md-inline">Lihat Web</span>
                    </a>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information Dropdown -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle py-1 px-2 rounded" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="transition: background 0.2s;">
                        <div class="d-flex align-items-center">
                            <div class="text-right mr-2 d-none d-lg-block" style="line-height: 1.2;">
                                <div class="font-weight-bold text-gray-800" style="font-size: 0.85rem;"><?= esc(session()->get('name') ?? 'Administrator'); ?></div>
                                <div class="text-muted small" style="font-size: 0.72rem;">Administrator</div>
                            </div>
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white font-weight-bold shadow-sm" style="width: 36px; height: 36px; background: linear-gradient(135deg, #e53637 0%, #1e293b 100%); font-size: 14px;">
                                <?= strtoupper(substr(session()->get('name') ?? 'A', 0, 1)); ?>
                            </div>
                        </div>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in mt-2 border-0"
                        aria-labelledby="userDropdown" style="border-radius: 10px; min-width: 200px; box-shadow: 0 10px 25px rgba(0,0,0,0.12) !important;">
                        <div class="dropdown-header text-uppercase font-weight-bold text-muted" style="font-size: 11px;">Menu Admin</div>
                        <a class="dropdown-item py-2" href="/admin/setting">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-primary"></i>
                            Pengaturan Sistem
                        </a>
                        <a class="dropdown-item py-2" href="/admin/statistik">
                            <i class="fas fa-chart-line fa-sm fa-fw mr-2 text-success"></i>
                            Statistik Konten
                        </a>
                        <a class="dropdown-item py-2" href="/" target="_blank">
                            <i class="fas fa-globe fa-sm fa-fw mr-2 text-info"></i>
                            Kunjungi Website
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item py-2 text-danger font-weight-bold" href="/logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                            Keluar (Logout)
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->