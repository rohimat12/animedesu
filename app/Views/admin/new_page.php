<div class="container-fluid">

	<div class="row">
		<div class="col-lg-9">

			<!-- new Anime Manual -->
			<div class="card mb-4">
				<div class="card-header">
					Tambah Halaman Baru

				</div>
				<div class="card-body">
                    <form action="/admin/save_page/">
                        <div class="form-group row">
                            <label for="JudulHalaman" class="col-sm-2 col-form-label">Judul Halaman</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul" class="form-control" id="JudulHalaman" placeholder="Judul Halaman">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editor" class="col-sm-2 col-form-label">Isi Halaman</label>
                            <div class="col-sm-10">
                                <textarea name="post" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
				</div>
			</div>
		</div>
	</div>

	<script>
		CKEDITOR.replace('post');
	</script>