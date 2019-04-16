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
            <a href="<?= base_url() ?>admin" class="btn btn-outline-primary menu_admin_active">List anime</a>
            <a href="<?= base_url() ?>admin/view_genre" class="btn btn-outline-primary">List genre</a>
            <a href="<?= base_url() ?>admin/view_komentar" class="btn btn-outline-primary">List komentar</a>
        </div>
    </div>
    <div class="row mt-2 konten_admin">
        <div class="col-3 col-md-1">
            <h1 class="mt-2"><span class="oi oi-pencil text-warning"></span></h1>
        </div>
        <div class="col-9 col-md-11">
            <h1>Edit Episode</h1>
            <hr>
        </div>
    </div>
    <div class="row konten_admin">
        <div class="col-md-12">
            <?php 
            foreach ($episode as $row) {
            ?>

            <form action="" method="post" enctype="multipart/form-data" class="form_admin">
                <div class="form-group">
                    <label for="judul">Judul Anime</label>
                    <input type="text" class="form-control" id="judul" value="<?php foreach($anime as $row_anime){echo $row_anime['judul_anime']; } ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="episode">Episode</label>
                    <input type="text" class="form-control" id="episode" placeholder="episode" value="<?= $row['episode'] ?>" name="episode">
                    <small class="form-text text-danger"><?= form_error('episode'); ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Judul Episode</label>
                    <input type="text" class="form-control" id="judul" placeholder="Judul Episode" value="<?= $row['judul_episode'] ?>" name="judul_episode">
                    <small class="form-text text-danger"><?= form_error('judul_episode'); ?></small>
                </div>
                <div class="form-group">
                    <label for="Deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="Deskripsi" class="ckeditor"><?= $row['deskripsi'] ?></textarea>
                    <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                </div>
                
                <div class="form-group">
                    <label for="link_streaming">link streaming</label>
                    <input type="text" class="form-control" id="link_streaming" placeholder="link streaming" value="<?= $row['link_streaming'] ?>" name="link_streaming">
                    <small class="form-text text-danger"><?= form_error('link_streaming'); ?></small>
                </div>
                <div class="form-group">
                    <label for="fileGambar">Thumbnail</label> <br>
                    <input type="file" id="fileGambar" name="gambar" size="20"> <br>
                    <img src="<?= base_url() ?>assets/gambar/<?= $row['thumbnail'] ?>" alt="" class="admin_thumb mt-1" id="gambar">
                </div>
                <input type="hidden" name="old_pict" value="<?= $row['thumbnail'] ?>">
                <input class="btn btn-warning text-light" type="submit" value="Edit">
            </form>
            <?php
            } 
            ?>
        </div>
    </div>
</div>

<a href="#" class="btn btn-primary rounded-circle user-admin-btn">Go to user view</a>
