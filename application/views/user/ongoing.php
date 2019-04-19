<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link" href="<?= base_url() ?>user">Home</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/daftar_isi">Daftar Isi</a>
        <a class="nav-item nav-link active" href="<?= base_url() ?>user/ongoing">ON-GOING</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/genre">Genres</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/faq">FAQ</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/dmca">DMCA</a>
    </div>
    <form action="<?= base_url() ?>user/search_anime" method="POST" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2 search-bar" type="search" placeholder="Search" aria-label="Search" name="search">
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
                    <a href="<?= base_url() ?>user/anime_genre/<?= $row['no_genre'] ?>?nama_genre=<?= $row['nama_genre'] ?>" class="badge btn btn-outline-primary mr-2"><?= $row['nama_genre'] ?></a>
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
                    <div class="mt-2">
                        <h5>Ongoing Series</h5>
                        <hr>
                    </div>
                    <div class="multi-kolom-2">
                        <?php
                        foreach ($anime as $row) {
                        ?>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="card card-tambahan">
                                    <div class="card-thumbnail">
                                        <img src="<?= base_url() ?>assets/gambar/<?= $row['gambar'] ?>" class="ket-thumb">
                                    </div>
                                    <div class="card-isi">
                                        <a href="<?= base_url() ?>user/detail_anime/<?= $row['no_anime'] ?>"><b><?= $row['judul_anime'] ?></b></a> <br>
                                        <span>
                                            <b>genre : </b>
                                            <?php
                                            $genre = $this->m_genre->getGenreByAnime($row['no_anime']);
                                            foreach ($genre as $data) {
                                                echo $data['nama_genre'],", ";    
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
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