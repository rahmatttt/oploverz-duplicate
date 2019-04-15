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
    <div class="row mt-5 menu_admin">
        <div class="col-12">
            <a href="" class="btn btn-outline-primary menu_admin_active">List anime</a>
            <a href="" class="btn btn-outline-primary">List genre</a>
            <a href="" class="btn btn-outline-primary">List komentar</a>
        </div>
    </div>
    <?php
    foreach ($anime as $row) {
    ?>
    <div class="row mt-2 konten_admin">
        <div class="col-3 col-md-1">
            <h1 class="mt-2"><span class="oi oi-pencil text-warning"></span></h1>
        </div>
        <div class="col-9 col-md-11">
            <h1>Edit <?= $row['judul_anime']; ?></h1>
            <hr>
        </div>
    </div>
    <div class="row konten_admin">
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data" class="form_admin">
                <div class="form-group">
                    <label for="judul">Judul Anime</label>
                    <input type="text" class="form-control" id="judul" placeholder="Judul Anime" name="judul" value="<?= $row['judul_anime'] ?>">
                    <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                </div>
                <div>
                    <label for="genre">Genre</label>
                    <div id="genre" class="form-group form-check multi-kolom-4">
                        <?php
                        $each_genre = [];
                        foreach ($genre as $key) {
                            array_push($each_genre, $key['nama_genre']);
                        } 
                        foreach ($all_genre as $row_genre) {
                            if (in_array($row_genre['nama_genre'],$each_genre)) {
                        ?>
                        <input type="checkbox" name="genre[]" class="form-check-input" id="genre" value="<?= $row_genre['no_genre'] ?>" checked>
                        <label class="form-check-label" for="genre"><?= $row_genre['nama_genre']; ?></label> <br>
                        <?php        
                            } else {
                        ?>
                        <input type="checkbox" name="genre[]" class="form-check-input" id="genre" value="<?= $row_genre['no_genre'] ?>">
                        <label class="form-check-label" for="genre"><?= $row_genre['nama_genre']; ?></label> <br>
                        <?php
                            }
                        ?>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="Deskripsi" class="ckeditor">
                        <?php
                        echo $row['deskripsi'];
                        ?>
                    </textarea>
                    <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                </div>
                <div class="form-group">
                    <label for="produser">Produser</label>
                    <input type="text" class="form-control" id="produser" placeholder="produser" name="produser" value="<?= $row['produser'] ?>">
                    <small class="form-text text-danger"><?= form_error('produser'); ?></small>
                </div>
                <div class="form-group">
                    <label for="jadwal">Jadwal rilis</label>
                    <input type="text" class="form-control" id="jadwal" placeholder="jadwal (hari)" name="jadwal" value="<?= $row['jdwl_rilis'] ?>">
                    <small class="form-text text-danger"><?= form_error('jadwal'); ?></small>
                </div>
                <div class="form-group">
                    <label for="tgl_penyiaran">Tanggal penyiaran</label>
                    <input type="date" class="form-control" id="tgl_penyiaran" name="tgl_penyiaran" value="<?= $row['tgl_penyiaran'] ?>">
                    <small class="form-text text-danger"><?= form_error('tgl_penyiaran'); ?></small>
                </div>
                <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" id="durasi" placeholder="durasi" name="durasi" value="<?= $row['durasi'] ?>">
                    <small class="form-text text-danger"><?= form_error('durasi'); ?></small>
                </div>
                <div>
                    <label for="skor">Skor</label>
                    <input type="text" class="form-control" id="skor" placeholder="skor" name="skor" value="<?= $row['skor'] ?>">
                    <small class="form-text text-danger"><?= form_error('skor'); ?></small>
                </div>
                <div>
                    <label for="status">Status</label>
                    <div class="form-group form-check" id="status">
                        <?php
                        if ($row['status'] == "ongoing") {
                        ?>
                        <input class="form-check-input" type="radio" name="status" id="status" value="ongoing" checked>
                        <label class="form-check-label" for="status">
                            ongoing
                        </label> <br>
                        <input class="form-check-input" type="radio" name="status" id="status" value="completed">
                        <label class="form-check-label" for="status">
                            completed
                        </label>
                        <?php
                        } else {
                        ?>
                        <input class="form-check-input" type="radio" name="status" id="status" value="ongoing">
                        <label class="form-check-label" for="status">
                            ongoing
                        </label> <br>
                        <input class="form-check-input" type="radio" name="status" id="status" value="completed" checked>
                        <label class="form-check-label" for="status">
                            completed
                        </label>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fileGambar">Gambar</label> <br>
                    <input type="file" id="fileGambar" name="gambar" size="20"> <br>
                    <img src="<?=base_url()?>assets/gambar/<?= $row['gambar'] ?>" alt="thumbnail" class="admin_thumb mt-1" id="gambar">
                </div>
                <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">
                <input class="btn btn-warning text-light" type="submit" value="Edit">
            </form>
            <?php  
            }
            ?>
        </div>
    </div>
</div>

<a href="#" class="btn btn-primary rounded-circle user-admin-btn">Go to user view</a>
