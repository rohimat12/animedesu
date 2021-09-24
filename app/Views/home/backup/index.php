            <!-- secsion -->
            <div class="container">
            <div class="row mt-4">
                <!-- content -->
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header border-left-primary bg-white py-3">
                            <h6 class="m-0 font-weight-bold">Anime Ongoing</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($anime as $data) : ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="item-anime">
                                        <div class="anime-item">
                                            <a href="/anime/<?= $data['slug']; ?>">
                                                <img src="<?= $data['img']; ?>" alt="<?= $data['judul']; ?>"
                                                    srcset=""></a>
                                            <div class="eps">Episode <?= $data['total_episode']; ?></div>
                                            <div class="comment"><i class="fa fa-star text-warning"></i> <?= $data['skor']; ?>
                                            </div>
                                            <div class="view"><i class="fa fa-eye"></i> 11</div>
                                        </div>
                                        <div class="item-judul">
                                            <h5><a href="/anime/<?= $data['slug']; ?>"><?= $data['judul']; ?></a></h5>
                                        </div>
                                    </div>
                                </div>  
                                <?php endforeach ?>                              
                            </div>
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="dataTable_previous"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content -->

                <!-- sidebar -->
                <div class="col-lg-4 col-md-6 col-xm-6">
                    <!-- top sidebar -->
                    <div class="card shadow mb-4">
                        <div class="card-header border-left-primary bg-white py-3">
                            <h6 class="m-0 font-weight-bold">Top Anime</h6>
                        </div>
                        <div class="card-body">
                            <?php foreach($complete as $selesai): ?>
                            <div class="top-anime">
                                <img src="<?= $selesai['img']; ?>" alt="<?= $selesai['judul']; ?>">
                                <div class="eps">Episode <?= $selesai['total_episode']; ?></div>
                                <div class="view"><i class="fa fa-eye"></i> 11</div>
                                <h5><a href="/anime/<?= $selesai['slug']; ?>"><?= $selesai['judul']; ?></a></h5>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!-- end top sidebar -->

                    <!-- bottom sidebar -->
                    <div class="card shadow mb-4">
                        <div class="card-header border-left-primary bg-white py-3">
                            <h6 class="m-0 font-weight-bold">Ogoing Anime</h6>
                        </div>
                        <div class="card-body">
                        <?php foreach($ongoing as $data) : ?>
                            <div class="ongoing-anime">
                                
                                <div class="ongoing-image col-md-4">
                                    <img src="<?= $data['img']; ?>" alt="<?= $data['judul']; ?>">
                                </div>
                                <div class="ongoing-text">
                                    <h5><a href="<?= $data['slug']; ?>"><?= $data['judul']; ?></a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                                
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                    <!-- end bottom sidebar -->
                </div>
                <!-- end sidebar -->
            </div>
        </div>
        <!-- End Section -->

        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>