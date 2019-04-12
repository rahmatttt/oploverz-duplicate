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
            <table class="table table-hover" id="tabel">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Produser</th>
                        <th scope="col">Tgl rilis</th>
                        <th scope="col">Tgl penyiaran</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Skor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Gambar</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>No</td>
                        <td>Judul</td>
                        <td>Deskripsi</td>
                        <td>Produser</td>
                        <td>Tgl rilis</td>
                        <td>Tgl penyiaran</td>
                        <td>Durasi</td>
                        <td>Skor</td>
                        <td>Status</td>
                        <td>Gambar</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>