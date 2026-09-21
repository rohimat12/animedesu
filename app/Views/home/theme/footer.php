<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4">
                <div class="footer__logo">
                    <a href="/" class="text-decoration-none">
                        <h4 class="text-white font-weight-bold m-0">
                            Anime<span style="color: #e53637;">desu</span>
                        </h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="footer__nav text-center">
                    <ul>
                        <li class="active"><a href="/">Beranda</a></li>
                        <li><a href="/admin">Admin Panel</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 text-right">
                <p class="m-0 text-muted" style="font-size: 13px;">
                    Copyright &copy; <?= date('Y'); ?> Animedesu. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Smooth scroll to top button
    document.getElementById('scrollToTopButton')?.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

</body>
</html>