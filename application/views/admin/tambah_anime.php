<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <span class="nav-item nav-link disabled" href="#">Logged in as <?php echo $this->session->admin['username']; ?></span>
      <a class="nav-item nav-link" href="<?php echo base_url(); ?>admin/logout">logout</a>
    </div>
  </div>
</nav>

<div class="container main-container">
    <div class="row">
        <div class="col-12">
            <img src="<?= base_url(); ?>assets/gambar/logo.png" alt="logo" class="logo">
        </div>
    </div>
    <div class="row mt-5 konten_admin">
        <div class="col-3 col-md-1">
            <h1 class="mt-2"><span class="oi oi-plus text-primary"></span></h1>
        </div>
        <div class="col-9 col-md-11">
            <h1>Tambah Anime</h1>
            <hr>
        </div>
    </div>
    <div class="row konten_admin">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data" class="form_admin">
                <div class="form-group">
                    <label for="judul">Judul Anime</label>
                    <input type="text" class="form-control" id="judul" placeholder="Judul Anime" name="judul">
                    <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                </div>
                <div>
                    <label for="genre">Genre</label>
                    <div id="genre" class="form-group form-check multi-kolom-4">
                        <?php
                        foreach ($all_genre as $row_genre) {
                        ?>
                        <input type="checkbox" name="genre[]" class="form-check-input" id="genre" value="<?= $row_genre['no_genre'] ?>">
                        <label class="form-check-label" for="genre"><?= $row_genre['nama_genre']; ?></label> <br>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="Deskripsi" class="ckeditor"></textarea>
                    <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                </div>
                <div class="form-group">
                    <label for="produser">Produser</label>
                    <input type="text" class="form-control" id="produser" placeholder="produser" name="produser">
                    <small class="form-text text-danger"><?= form_error('produser'); ?></small>
                </div>
                <div class="form-group">
                    <label for="jadwal">Jadwal rilis</label>
                    <input type="text" class="form-control" id="jadwal" placeholder="jadwal (hari)" name="jadwal">
                    <small class="form-text text-danger"><?= form_error('jadwal'); ?></small>
                </div>
                <div class="form-group">
                    <label for="tgl_penyiaran">Tanggal penyiaran</label>
                    <input type="date" class="form-control" id="tgl_penyiaran" name="tgl_penyiaran">
                    <small class="form-text text-danger"><?= form_error('tgl_penyiaran'); ?></small>
                </div>
                <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" id="durasi" placeholder="durasi" name="durasi">
                    <small class="form-text text-danger"><?= form_error('durasi'); ?></small>
                </div>
                <div>
                    <label for="skor">Skor</label>
                    <input type="text" class="form-control" id="skor" placeholder="skor" name="skor">
                    <small class="form-text text-danger"><?= form_error('skor'); ?></small>
                </div>
                <div>
                    <label for="status">Status</label>
                    <div class="form-group form-check" id="status">
                        <input class="form-check-input" type="radio" name="status" id="status" value="ongoing" checked>
                        <label class="form-check-label" for="status">
                            ongoing
                        </label> <br>
                        <input class="form-check-input" type="radio" name="status" id="status" value="completed">
                        <label class="form-check-label" for="status">
                            completed
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fileGambar">Gambar</label> <br>
                    <input type="file" id="fileGambar" name="gambar" size="20"> <br>
                    <img src="#" alt="" class="admin_thumb mt-1" id="gambar">
                </div>
                <input class="btn btn-primary text-light" type="submit" value="Save">
            </form>
        </div>
    </div>
</div>

<a href="#" class="btn btn-primary rounded-circle user-admin-btn">Go to user view</a>
