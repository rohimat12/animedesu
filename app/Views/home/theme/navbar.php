<?php
$currentPath = service('uri')->getPath();
$isHome = empty($currentPath) || $currentPath === '/';
$isCatalog = strpos($currentPath, 'categories') !== false || strpos($currentPath, 'genre') !== false;
?>
<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row align-items-center py-2">
            <!-- Brand Logo -->
            <div class="col-lg-3 col-md-4 col-5">
                <div class="header__logo">
                    <a href="/" class="text-decoration-none">
                        <h3 class="text-white font-weight-bold m-0">
                            Anime<span style="color: #e53637;">desu</span>
                        </h3>
                    </a>
                </div>
            </div>

            <!-- Navigation Links (Desktop) -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="header__nav">
                    <nav class="header__menu">
                        <ul class="m-0 p-0">
                            <li class="<?= $isHome ? 'active' : ''; ?>">
                                <a href="/"><i class="fas fa-home mr-1"></i> Beranda</a>
                            </li>
                            <li class="<?= $isCatalog ? 'active' : ''; ?>">
                                <a href="/categories"><i class="fas fa-th-large mr-1"></i> Katalog</a>
                            </li>
                            <?php if (!empty($halaman) && is_array($halaman)) : ?>
                                <li>
                                    <a href="#">Halaman <i class="fa fa-angle-down ml-1"></i></a>
                                    <ul class="dropdown">
                                        <?php foreach($halaman as $hal) : ?>
                                            <li><a href="/page/<?= $hal['slug']; ?>"><?= esc($hal['judul']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Live Search Bar & Admin Button & Mobile Toggle -->
            <div class="col-lg-4 col-md-8 col-7">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="search-container mr-2 flex-grow-1" style="max-width: 240px;">
                        <form action="/search" method="GET" class="m-0" id="searchForm">
                            <div class="search-input-wrap">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text" name="q" id="liveSearchInput" 
                                       placeholder="Cari anime..." autocomplete="off"
                                       value="<?= isset($query) ? esc($query) : ''; ?>" required>
                            </div>
                        </form>
                        <!-- Live Search Results Dropdown -->
                        <div id="liveSearchResults" class="live-search-dropdown"></div>
                    </div>

                    <?php if (session()->get('isLoggedIn')) : ?>
                        <a href="/admin" class="btn btn-sm btn-outline-danger mr-2" title="Admin Panel" style="white-space: nowrap; border-radius: 20px;">
                            <i class="fas fa-tachometer-alt mr-1"></i> <span class="d-none d-sm-inline">Panel</span>
                        </a>
                    <?php else : ?>
                        <a href="/login" class="btn btn-sm btn-danger text-white mr-2" title="Login Admin" style="background: #e53637; border-radius: 20px; white-space: nowrap;">
                            <i class="fas fa-lock mr-1"></i> <span class="d-none d-sm-inline">Login</span>
                        </a>
                    <?php endif; ?>

                    <!-- Mobile Menu Hamburger Button -->
                    <button class="btn btn-sm btn-outline-secondary d-lg-none" type="button" data-toggle="collapse" data-target="#mobileNavCollapse" aria-expanded="false" aria-label="Toggle navigation" style="border-radius: 8px; color: #fff; border-color: rgba(255,255,255,0.2);">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Collapse Drawer -->
        <div class="collapse d-lg-none" id="mobileNavCollapse">
            <div class="py-3 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
                <ul class="list-unstyled m-0">
                    <li class="py-1">
                        <a href="/" class="text-white d-block py-2 px-3 rounded text-decoration-none <?= $isHome ? 'bg-danger' : ''; ?>">
                            <i class="fas fa-home mr-2"></i> Beranda
                        </a>
                    </li>
                    <li class="py-1">
                        <a href="/categories" class="text-white d-block py-2 px-3 rounded text-decoration-none <?= $isCatalog ? 'bg-danger' : ''; ?>">
                            <i class="fas fa-th-large mr-2"></i> Katalog
                        </a>
                    </li>
                    <?php if (!empty($halaman) && is_array($halaman)) : ?>
                        <?php foreach($halaman as $hal) : ?>
                            <li class="py-1">
                                <a href="/page/<?= $hal['slug']; ?>" class="text-muted d-block py-2 px-3 rounded text-decoration-none">
                                    <i class="fas fa-file-alt mr-2"></i> <?= esc($hal['judul']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Client-side Live Search Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('liveSearchInput');
    const searchResults = document.getElementById('liveSearchResults');
    let debounceTimer = null;

    if (!searchInput || !searchResults) return;

    searchInput.addEventListener('input', function () {
        const query = this.value.trim();
        clearTimeout(debounceTimer);

        if (query.length < 2) {
            searchResults.style.display = 'none';
            searchResults.innerHTML = '';
            return;
        }

        debounceTimer = setTimeout(() => {
            fetch('/api/search?q=' + encodeURIComponent(query))
                .then(res => res.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    if (!data || data.length === 0) {
                        searchResults.innerHTML = '<div class="p-3 text-center text-muted small"><i class="fas fa-info-circle mr-1"></i> Tidak ada anime yang cocok</div>';
                    } else {
                        function escapeHtml(str) {
                            if (!str) return '';
                            return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
                        }

                        data.forEach(item => {
                            const a = document.createElement('a');
                            a.href = item.url;
                            a.className = 'live-search-item';
                            const statusStr = (item.status || 'Ongoing').trim();
                            const isCompleted = statusStr.toLowerCase() === 'completed';
                            const safeJudul = escapeHtml(item.judul);
                            const safeImg = escapeHtml(item.img || '/img/default.jpg');
                            const safeSkor = escapeHtml(item.skor || '-');
                            const safeTipe = escapeHtml(item.tipe || 'TV');

                            a.innerHTML = `
                                <img src="${safeImg}" alt="${safeJudul}" class="live-search-thumb">
                                <div class="live-search-info">
                                    <div class="live-search-title">${safeJudul}</div>
                                    <div class="live-search-meta">
                                        <span class="text-warning mr-2"><i class="fas fa-star"></i> ${safeSkor}</span>
                                        <span class="badge ${isCompleted ? 'badge-completed' : 'badge-ongoing'} mr-2">${statusStr}</span>
                                        <span class="text-muted">${safeTipe}</span>
                                    </div>
                                </div>
                            `;
                            searchResults.appendChild(a);
                        });
                    }
                    searchResults.style.display = 'block';
                })
                .catch(err => {
                    console.error('Search error:', err);
                });
        }, 280);
    });

    // Sembunyikan dropdown jika klik di luar
    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Tampilkan kembali jika fokus pada input yang sudah ada isinya
    searchInput.addEventListener('focus', function () {
        if (searchResults.children.length > 0 && this.value.trim().length >= 2) {
            searchResults.style.display = 'block';
        }
    });
});
</script>