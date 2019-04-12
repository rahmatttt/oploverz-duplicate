<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <span class="nav-item nav-link disabled" href="#">Logged in as <?php echo $this->session->admin['username']; ?></span>
      <a class="nav-item nav-link" href="<?php echo base_url(); ?>admin/logout">logout</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="assets/gambar/logo.png" alt="logo" class="logo">
        </div>
    </div>
    <div class="row mt-5 menu_admin">
        <div class="col-12">
            <a href="" class="btn btn-outline-primary menu_admin_active">List anime</a>
            <a href="" class="btn btn-outline-primary">List genre</a>
            <a href="" class="btn btn-outline-primary">List komentar</a>
        </div>
    </div>
    <div class="row mt-2 konten_admin">
        <div class="col-12">
            <a href="#" class="btn btn-primary mb-4">Tambah Anime</a>
            <table class="table table-hover" id="tabel">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Produser</th>
                        <th scope="col">Tgl rilis</th>
                        <th scope="col">Tgl penyiaran</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Skor</th>
                        <th scope="col">Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($anime as $row) {
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><img src="assets/gambar/<?= $row['gambar'] ?>" alt="thumbnail" class="admin_thumb"></td>
                        <td><?= $row['judul_anime'] ?></td>
                        <td><?= $row['produser'] ?></td>
                        <td><?= $row['jdwl_rilis'] ?></td>
                        <td><?= $row['tgl_penyiaran'] ?></td>
                        <td><?= $row['durasi'] ?></td>
                        <td><?= $row['skor'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><a href="#" class="btn btn-success text-light" title="preview"><span class="oi oi-eye"></span></a></td>
                        <td><a href="#" class="btn btn-warning text-light" title="edit"><span class="oi oi-pencil"></span></a></td>
                        <td><a href="#" class="btn btn-danger text-light" title="delete"><span class="oi oi-trash"></span></a></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>