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
        <div class="col-12">
            <a href="<?= base_url() ?>admin/tambah_anime" class="btn btn-primary mb-4">Tambah Anime</a>
            <div class="konten_data">
            <table class="table table-hover" id="tabel">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Produser</th>
                        <th scope="col">Jadwal rilis</th>
                        <th scope="col">Tgl penyiaran</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Skor</th>
                        <th scope="col">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($anime as $row) {
                    ?>
                    <!-- modal delete -->
                    <div class="modal fade" id="delete<?= $row['no_anime']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete<?= $row['no_anime']; ?>Title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><span class="oi oi-trash text-danger"></span> Hapus <?= $row['judul_anime']; ?>?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                                <a href="<?= base_url(); ?>admin/delete_anime/<?= $row['no_anime']; ?>" class="btn btn-primary">hapus</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal delete -->
                    <tr>
                        <td><?= $no ?></td>
                        <td><img src="assets/gambar/<?= $row['gambar'] ?>" alt="thumbnail" class="admin_thumb"></td>
                        <td><?= $row['judul_anime'] ?></td>
                        <td>
                            <?php
                            $this->load->model('m_genre');
                            $genre = $this->m_genre->getGenreByAnime($row['no_anime']);
                            foreach($genre as $data){
                                echo $data['nama_genre'].", ";
                            }
                            ?>
                        </td>
                        <td><?= $row['produser'] ?></td>
                        <td><?= $row['jdwl_rilis'] ?></td>
                        <td><?= $row['tgl_penyiaran'] ?></td>
                        <td><?= $row['durasi'] ?></td>
                        <td><?= $row['skor'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                        <a href="<?= base_url(); ?>admin/detail_anime/<?= $row['no_anime']?>" class="btn btn-success text-light m-1" title="detail"><span class="oi oi-eye"></span></a>
                        <a href="<?= base_url(); ?>admin/edit_anime/<?= $row['no_anime']?>" class="btn btn-warning text-light m-1" title="edit"><span class="oi oi-pencil"></span></a>
                        <a href="#" data-target="#delete<?= $row['no_anime'];?>" data-toggle="modal" class="btn btn-danger text-light m-1" title="delete"><span class="oi oi-trash"></span></a>
                        </td>
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
</div>

<a href="#" class="btn btn-primary rounded-circle user-admin-btn">Go to user view</a>
