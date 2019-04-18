<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link" href="<?= base_url() ?>user">Home</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/daftar_isi">Daftar Isi</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/ongoing">ON-GOING</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/genre">Genres</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/faq">FAQ</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/dmca">DMCA</a>
    </div>
    <form action="<?= base_url() ?>user/search_anime" method="POST" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2 search-bar" type="search" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>

<div class="container main-container">
    <div class="row">
        <div class="col-12">
            <a href="<?= base_url() ?>user"><img src="<?= base_url(); ?>assets/gambar/logo.png" alt="logo" class="logo"></a>
        </div>
    </div>
    <div class="row mt-5 konten_user">
        <div class="col-12">
            <div class="row genres">
                <div class="col-12">
                    <?php
                    foreach ($genre as $row) {
                    ?>
                    <a href="<?= base_url() ?>user/anime_genre/<?= $row['no_genre'] ?>" class="badge btn btn-outline-primary mr-2"><?= $row['nama_genre'] ?></a>
                    <?php
                    }
                    ?>
                    <a href="<?= base_url() ?>user/genre" class="badge btn btn-outline-primary mr-2">genre lainnya >>></a>
                </div>
            </div>
            <div class="row konten-utama mt-3">
                <div class="col-12">
                    <div class="recommend-anime small">
                        <span class="bg-primary text-light mr-2 p-1">recommended</span>
                        <?php
                        foreach ($recommend_anime as $row) {
                        ?>
                        <a href="<?= base_url() ?>user/detail_anime/<?= $row['no_anime'] ?>" class="mr-2 text-dark"><?= $row['judul_anime'] ?></a>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    foreach ($anime as $row) {
                    ?>
                    <div class="mt-2">
                        <h5>Tonton atau Download "<?= $row['judul_anime'] ?>" Subtitle Indonesia</h5>
                        <div class="row">
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
                    </div>
                    <div class="mt-2">
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
                    </div>
                    <div class="mt-2">
                        <table class="table table-striped table-dark-hover">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col"># episode</th>
                                    <th scope="col">Judul episode</th>
                                    <th scope="col">tanggal posting</th>
                                    <th scope="col">download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($episode as $row_episode) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>user/nonton_episode/<?= $row_episode['no_episode'] ?>?no_anime=<?= $row['no_anime'] ?>&episode=<?= $row_episode['episode'] ?>"><?= $row_episode['episode'] ?></a></td>
                                    <td ><a href="<?= base_url() ?>user/nonton_episode/<?= $row_episode['no_episode'] ?>?no_anime=<?= $row['no_anime'] ?>&episode=<?= $row_episode['episode'] ?>"><?= $row_episode['judul_episode'] ?></a></td>
                                    <td><?= $row_episode['tgl_rilis'] ?></td>
                                    <td class="bg-primary text-center"><a href="<?= base_url() ?>user/nonton_episode/<?= $row_episode['no_episode'] ?>?no_anime=<?= $row['no_anime'] ?>&episode=<?= $row_episode['episode'] ?>"class="text-light">download</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($this->session->has_userdata('admin')) {
?>
    <a href="<?= base_url() ?>admin" class="btn btn-primary rounded-circle user-admin-btn">Go to admin view</a>
<?php
}
?>