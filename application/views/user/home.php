<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link active" href="<?= base_url() ?>user">Home</a>
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
                    <div class="sub-judul mt-2">
                        <span>Featured Series</span>
                    </div>
                    <div class="mt-2">
                    <?php
                        foreach ($featured_anime as $row) {
                        ?>
                        <a href="<?= base_url() ?>user/detail_anime/<?= $row['no_anime'] ?>" title="<?= $row['judul_anime'] ?>">
                        <div class="thumbnail-anime text-center mr-2" >
                            <img src="<?= base_url() ?>assets/gambar/<?= $row['gambar'] ?>" >
                            <div class="caption small">
                                <span><?= $row['judul_anime'] ?></span>
                            </div>
                        </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="sub-judul mt-2">
                        <span>Rilis Terbaru</span>
                    </div>
                    <?php
                    foreach ($newest_episode as $row) {
                    ?>
                    <div class="mt-2">
                        <div class="row">
                            <div class="col-2">
                                <a href="<?= base_url() ?>user/nonton_episode/<?= $row['no_episode'] ?>?no_anime=<?= $row['no_anime'] ?>&episode=<?= $row['episode'] ?>"><img src="<?= base_url() ?>assets/gambar/<?= $row['thumbnail'] ?>" class="thumb-episode mr-1"></a>
                            </div>
                            <div class="col-10">
                                <div class="ket-episode">
                                    <a href="<?= base_url() ?>user/nonton_episode/<?= $row['no_episode'] ?>?no_anime=<?= $row['no_anime'] ?>&episode=<?= $row['episode'] ?>" class="judul-ket-episode"><?= $row['judul_anime'] ?> - <?= $row['episode'] ?> sub Indo</a> <br>
                                    <span class="small text-secondary">diupload tanggal <?= $row['tgl_rilis'] ?></span> <br>
                                    <span class="small text-secondary">Lihat daftar isi <a href="<?= base_url() ?>user/detail_anime/<?= $row['no_anime'] ?>" class="text-primary"><?= $row['judul_anime'] ?></a> untuk episode lainnya.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    echo "<hr>".$this->pagination->create_links();
                    ?>
                    <div class="sub-judul mt-2">
                        <span>Latest Series</span>
                    </div>
                    <div class="mt-2">
                        <?php
                        foreach ($latest_anime as $row) {
                        ?>
                         <a href="<?= base_url() ?>user/detail_anime/<?= $row['no_anime'] ?>" title="<?= $row['judul_anime'] ?>">
                        <div class="thumbnail-anime text-center m-2" >
                            <img src="<?= base_url() ?>assets/gambar/<?= $row['gambar'] ?>" >
                            <div class="caption small">
                                <span><?= $row['judul_anime'] ?></span>
                            </div>
                        </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
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