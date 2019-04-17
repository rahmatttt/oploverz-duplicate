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
            <a href="<?= base_url() ?>admin" class="btn btn-outline-primary">List anime</a>
            <a href="<?= base_url() ?>admin/view_genre" class="btn btn-outline-primary menu_admin_active">List genre</a>
            <a href="<?= base_url() ?>admin/view_komentar" class="btn btn-outline-primary">List komentar</a>
        </div>
    </div>
    <div class="row mt-2 konten_admin">
        <div class="col-12">
            <!-- modal tambah -->
            <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="oi oi-plus text-primary"></span> Tambah Genre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url(); ?>admin/tambah_genre/" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="genre">Genre :</label>
                                <input type="text" class="form-control" id="genre" placeholder="nama genre" name="nama_genre">                            
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                        <input type="submit" value="Save" form="form-tambah" class="btn btn-primary">
                    </div>
                    </div>
                </div>
            </div>
            <!-- end modal tambah -->
            <a href="#" data-target="#tambah" data-toggle="modal" class="btn btn-primary mb-4">Tambah Genre</a>
            <div class="konten_data">
            <table class="table table-hover" id="tabel">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Genre</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($genre as $row) {
                    ?>
                    <!-- modal delete -->
                    <div class="modal fade" id="delete<?= $row['no_genre']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete<?= $row['no_genre']; ?>Title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><span class="oi oi-trash text-danger"></span> Hapus <?= $row['nama_genre']; ?>?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                                <a href="<?= base_url(); ?>admin/delete_genre/<?= $row['no_genre']; ?>" class="btn btn-danger">hapus</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal delete -->
                    <!-- modal edit -->
                    <div class="modal fade" id="edit<?= $row['no_genre']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?= $row['no_genre']; ?>Title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><span class="oi oi-pencil text-warning"></span> Edit <?= $row['nama_genre']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url(); ?>admin/edit_genre/<?= $row['no_genre']; ?>" method="post" id="form-edit<?= $row['no_genre'] ?>">
                                    <div class="form-group">
                                        <label for="genre">Genre :</label>
                                        <input type="text" class="form-control" id="genre" placeholder="nama genre" name="nama_genre" value="<?= $row['nama_genre'] ?>">                            
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                                <input type="submit" value="Save" form="form-edit<?= $row['no_genre'] ?>" class="btn btn-warning text-light">
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal edit -->
                    <tr>
                        <td><?= $row['nama_genre'] ?></td>
                        <td>
                        <a href="#" data-target="#edit<?= $row['no_genre'];?>" data-toggle="modal" class="btn btn-warning text-light m-1" title="edit"><span class="oi oi-pencil"></span></a>
                        <a href="#" data-target="#delete<?= $row['no_genre'];?>" data-toggle="modal" class="btn btn-danger text-light m-1" title="delete"><span class="oi oi-trash"></span></a>
                        </td>
                    </tr>
                    
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<a href="<?= base_url() ?>user" class="btn btn-primary rounded-circle user-admin-btn">Go to user view</a>
