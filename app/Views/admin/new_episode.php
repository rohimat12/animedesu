<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-md-9">
		<div class="card">
			<div class="card-header">
				Tambah Episode Baru
			</div>
			<div class="card-body">
            <form action="/admin/save_episode" method="POST">
				<div class="form-group row">
					<label for="Judul" class="col-sm-4 col-form-label">Judul</label>
					<div class="col-sm-8">
						<input type="text" name="judul" class="form-control" id="Judul">
					</div>
				</div>
				<div class="form-group row">
					<label for="Episode Ke" class="col-sm-4 col-form-label">Pilih Anime</label>
					<div class="col-sm-8">
                    <select name="id_anime" class="custom-select" id="id_anime">
                        <option selected>Pilih Anime</option>
                        <?php foreach($anime as $j_anime) : ?>
                        <option value="<?= $j_anime['id']; ?>"><?= $j_anime['judul']; ?></option>
                        <?php endforeach ?>
                    </select>
					</div>
				</div>
				<div class="form-group row">
					<label for="Episode Ke" class="col-sm-4 col-form-label">Episode Ke-</label>
					<div class="col-sm-8">
						<input type="text" name="episode_ke" class="form-control" id="EpisodeKe">
					</div>
				</div>
				<div class="form-group row">
					<label for="Embed Player" class="col-sm-4 col-form-label">Embed Player</label>
					<div class="col-sm-8">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<input name="use_player" type="checkbox"
										aria-label="Checkbox for following text input">
								</div>
							</div>
							<input name="embed_player" type="text" class="form-control"
								aria-label="Text input with checkbox">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="Nama Player" class="col-sm-4 col-form-label">Nama Player</label>
					<div class="col-sm-8">
						<input type="text" name="judul_player" class="form-control" id="NamaPlayer">
					</div>
				</div>
				<div class="form-group row">
					<label for="Embed Player" class="col-sm-4 col-form-label">Link Download</label>
					<div class="col-sm-8">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<input name="use_download" type="checkbox"
										aria-label="Checkbox for following text input">
								</div>
							</div>
							<input name="link_download" type="text" class="form-control"
								aria-label="Text input with checkbox">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="Nama Link" class="col-sm-4 col-form-label">Nama Link</label>
					<div class="col-sm-8">
						<input type="text" name="judul_download" class="form-control" id="NamaLink">
					</div>
				</div>
				<div class="form-group row">
					<label for="Kualitas" class="col-sm-4 col-form-label">Kualitas</label>
					<div class="col-sm-8">
						<input type="text" name="kualitas" class="form-control" id="Kualitas">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary float-right">Simpan</button>
				</div>
            </form>
			</div>
		</div>
	</div>