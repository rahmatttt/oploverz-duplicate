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
    <?php 
    foreach ($anime as $row) {
    ?>
    <div class="row mt-5 konten_admin">
        <div class="col-3 col-md-1">
            <h1 class="mt-2"><span class="oi oi-eye text-success"></span></h1>
        </div>
        <div class="col-9 col-md-11">
            <h1><?= $row['judul_anime'] ?></h1>
            <hr>
        </div>
    </div>
    <div class="row konten_admin">
        <div class="col-4 col-md-2">
            <img src="<?= base_url() ?>assets/gambar/<?= $row['gambar'] ?>" alt="thumbnail" class="img-fluid">
        </div>
        <div class="col-8 col-md-10">
            <h6>Sinopsis <?= $row['judul_anime'] ?></h6>
            <p>
                <?= $row['deskripsi'] ?>
            </p>
        </div>
    </div>
    <div class="row konten_admin">
        <div class="col-12">
            <div class="profil_anime">
                <table>
                    <tr>
                        <th>Judul</th>
                        <td>:</td>
                        <td><?= $row['judul_anime'] ?></td>
                    </tr>
                    <tr>
                        <th>Episode</th>
                        <td>:</td>
                        <td><?= $jml_episode ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                    <tr>
                        <th>Disiarkan</th>
                        <td>:</td>
                        <td><?= $row['tgl_penyiaran'] ?></td>
                    </tr>
                    <tr>
                        <th>Produser</th>
                        <td>:</td>
                        <td><?= $row['produser'] ?></td>
                    </tr>
                    <tr>
                        <th>Skor</th>
                        <td>:</td>
                        <td><?= $row['skor'] ?></td>
                    </tr>
                    <tr>
                        <th>Genre</th>
                        <td>:</td>
                        <td>
                        <?php
                        foreach ($genre as $row_genre) {
                            echo $row_genre['nama_genre'].", ";
                        }
                        ?>
                         </td>
                    </tr>
                    <tr>
                        <th>Durasi</th>
                        <td>:</td>
                        <td><?= $row['durasi'] ?> per episode</td>
                    </tr>
                </table>
            </div>
            <div class="mt-2">
                <h6>list episode <?= $row['judul_anime'] ?> :</h6>
                <div class="konten_data">
                <table class="table table-hover" id="tabel">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Eps</th>
                            <th scope="col">thumbnail</th>
                            <th scope="col">Judul Episode</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal upload</th>
                            <th scope="col">Link download</th>
                            <th scope="col">Link Streaming</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($episode as $row_episode) {
                        ?>
                        <!-- modal delete -->
                        <div class="modal fade" id="delete<?= $row_episode['no_episode']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete<?= $row_episode['episode']; ?>Title" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><span class="oi oi-trash text-danger"></span> Hapus episode <?= $row_episode['episode']; ?>?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                                    <a href="<?= base_url(); ?>admin/delete_episode/<?= $row_episode['no_episode']; ?>" class="btn btn-danger">hapus</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal delete -->
                        <!-- modal deskripsi -->
                        <div class="modal fade" id="deskripsi<?= $row_episode['no_episode']; ?>" tabindex="-1" role="dialog" aria-labelledby="deskripsi<?= $row_episode['episode']; ?>Title" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= $row_episode['episode']." - ".$row_episode['judul_episode'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <?= $row_episode['deskripsi'] ?>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal deskripsi -->
                        <tr>
                            <td><?= $row_episode['episode'] ?></td>
                            <td><img src="<?= base_url() ?>assets/gambar/<?= $row_episode['thumbnail'] ?>" alt="thumbnail" class="admin_thumb"></td>
                            <td><?= $row_episode['judul_episode'] ?></td>
                            <td><a href="#" data-target="#deskripsi<?= $row_episode['no_episode'];?>" data-toggle="modal">Lihat Deskripsi</a></td>
                            <td><?= $row_episode['tgl_rilis'] ?></td>
                            <td>
                                <ul>
                                <!-- modal tambah link -->
                                <div class="modal fade" id="tambah_link" tabindex="-1" role="dialog" aria-labelledby="tambah_linkTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><span class="oi oi-plus text-primary"></span> tambah link</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url(); ?>admin/tambah_link/" method="post" id="form-tambah-link">
                                                                            
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                                            <input type="submit" value="Save" form="form-tambah-link" class="btn btn-primary">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal tambah link -->
                                <?php
                                $this->load->model('m_link_download');
                                $link = $this->m_link_download->getLinkByEpisode($row_episode['no_episode']);
                                foreach($link as $data){
                                ?>
                                    <!-- modal delete link -->
                                    <div class="modal fade" id="delete_link<?= $data['no_link']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete_link<?= $data['link']; ?>Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><span class="oi oi-trash text-danger"></span> Hapus link <?= $data['nama_link']; ?>?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="<?= $data['link'] ?>"><?= $data['link'] ?></a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                                                <a href="<?= base_url(); ?>admin/delete_link/<?= $data['no_link']; ?>" class="btn btn-danger">hapus</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal delete link -->
                                    
                                    <li>
                                        <a href="<?= $data['link'] ?>" title="<?= $data['link'] ?>"><?= $data['nama_link'] ?> </a>
                                        <a href="#" data-target="#delete_link<?= $data['no_link']; ?>" data-toggle="modal" class="badge badge-danger" title="delete link"><span class="oi oi-trash"></span></a>
                                    </li>
                                <?php
                                }
                                ?>
                                    <li><a href="#" data-target="#tambah_link" data-toggle="modal">+ tambah</a></li>
                                </ul>
                            </td>
                            <td>
                                <video width="100px" controls>
                                    <source src="<?= $row_episode['link_streaming'] ?>" type="video/mp4">
                                    Your browser does not support the video.
                                </video>
                            </td>
                            <td>
                            
                            <a href="<?= base_url(); ?>admin/edit_anime/<?= $row['no_anime']?>" class="btn btn-warning text-light m-1" title="edit"><span class="oi oi-pencil"></span></a>
                            <a href="#" data-target="#delete<?= $row['no_anime'];?>" data-toggle="modal" class="btn btn-danger text-light m-1" title="delete"><span class="oi oi-trash"></span></a>
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
    <?php
    }
    ?>
</div>

<a href="#" class="btn btn-primary rounded-circle user-admin-btn">Go to user view</a>
