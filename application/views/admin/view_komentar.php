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
            <a href="<?= base_url() ?>admin/view_genre" class="btn btn-outline-primary">List genre</a>
            <a href="<?= base_url() ?>admin/view_komentar" class="btn btn-outline-primary menu_admin_active">List komentar</a>
        </div>
    </div>
    <div class="row mt-2 konten_admin">
        <div class="col-12">
            <div class="konten_data">
            <table class="table table-hover" id="tabel">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">tanggal</th>
                        <th scope="col">nama</th>
                        <th scope="col">email</th>
                        <th scope="col">komentar</th>
                        <th scope="col">anime</th>
                        <th scope="col">status</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($komentar as $row) {
                    ?>
                    <tr>
                        <td><?= $row['tgl_komentar'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['isi_komentar'] ?></td>
                        <td><?= $row['judul_anime'] ?> - <?= $row['episode'] ?></td>
                        <?php
                            if ($row['status']=='OK') {
                                echo "<td class='text-success text-center'>".$row['status']."</td>";
                            } else {
                                echo "<td class='text-danger text-center'>".$row['status']."</td>";
                            }
                            
                        ?>
                        <td>
                        <?php
                            if ($row['status']=='OK') {
                        ?>
                        <a href="<?= base_url() ?>admin/ubah_status_komentar/<?= $row['no_komentar'] ?>?status=OK" class="btn btn-danger text-light m-1" title="block"><span class="oi oi-ban"></span></a>
                        <?php
                            } else {
                        ?>
                        <a href="<?= base_url() ?>admin/ubah_status_komentar/<?= $row['no_komentar'] ?>?status=Blocked" class="btn btn-success text-light m-1" title="unblock"><span class="oi oi-circle-check"></span></a>
                        <?php
                            }
                        ?>       
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
