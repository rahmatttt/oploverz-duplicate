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
                        <h4>Bantu share ya...</h4>
                    </div>
                    <div class="mt-5 profil_anime small">
                        <?php
                        foreach ($anime_episode as $row) {
                        ?>
                        <span class="judul-ket-episode"><?= $row['judul_anime'] ?> - <?= $row['episode'] ?> Subtitle Indonesia</span><br>
                        <span>Rilis tanggal <?= $row['tgl_rilis'] ?>, Lihat daftar isi <a href="<?= base_url() ?>user/detail_anime/<?= $row['no_anime'] ?>"><?= $row['judul_anime'] ?></a> untuk episode lainnya.</span>
                        <?php    
                        }
                        ?>
                    </div>
                    <hr>
                    <div>
                        <button class="btn btn-orange float-right" id="light-toggle">lights off</button><br>
                    </div>
                    <div class="mt-4">
                        <?php
                        foreach ($anime_episode as $row) {
                        ?>
                        <iframe src="<?= $row['link_streaming'] ?>" width="100%" height="640"></iframe>
                        <?php    
                        }
                        ?>
                    </div>
                    <div class="mt-2 text-center next-prev-episode">
                        <?php
                        foreach ($prev_episode as $row) {
                        if (count($prev_episode) != 0) {
                        ?>
                            <a href="<?= base_url() ?>user/nonton_episode/<?= $row['no_episode'] ?>?no_anime=<?= $row['no_anime'] ?>" class="btn btn-grey"><< episode sebelumnya</a>
                        <?php
                        } 
                        }
                        ?>
                        
                        <a href="<?= base_url() ?>user/detail_anime/<?= $row['no_anime'] ?>" class="btn btn-orange">lihat semua episode</a>
                        
                        <?php
                        foreach ($next_episode as $row) {
                        if (count($next_episode) != 0) {
                        ?>
                        <a href="<?= base_url() ?>user/nonton_episode/<?= $row['no_episode'] ?>?no_anime=<?= $row['no_anime'] ?>" class="btn btn-grey">episode selanjutnya >></a>
                        <?php
                        } 
                        }
                        ?>
                    </div>
                    <div class="mt-3">
                        <?php
                        foreach ($anime_episode as $row) {
                        ?>
                        <span class="judul-ket-episode"><?= $row['judul_anime'] ?> - <?= $row['episode'] ?> Subtitle Indonesia mp4</span>
                        <?php    
                        }
                        ?>
                    </div>
                    <div class="mt-2">
                        <div class="download">
                            <?php
                            foreach ($anime_episode as $row) {
                            ?>
                            <div class="judul-ket-episode text-light bg-primary p-1">Oploverz - <?= $row['judul_anime'] ?> - <?= $row['episode'] ?> Subtitle Indonesia mp4</div>
                            <?php    
                            }
                            ?>
                            <div class="link_download p-1">
                                <?php
                                foreach ($link_download as $row) {
                                ?>
                                <a href="<?= $row['link'] ?>" target="_blank"><?= $row['nama_link'] ?></a><span> | </span>
                                <?php    
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6>Info :</h6>
                        <p>
                        Mau tahu anime yang sedang tayang musim ini apa aja? Klik di samping ini => <a href="<?= base_url() ?>user/ongoing">Tonton Anime Musim Ini</a> <br>
                        Mau genre lain, klik di samping ini => <a href="<?= base_url() ?>user/genre">Tonton anime berdasarkan Genre</a> <br>
                        Dan ini daftar anime populer di oploverz, klik di samping ini => <a href="<?= base_url() ?>user/popular_series">Anime Populer di oploverz</a>
                        </p>
                    </div>
                    <hr>
                    <div class="row">
                        <?php
                        foreach ($anime_episode as $row) {
                        ?>
                        <div class="col-2">
                            <img src="<?= base_url() ?>assets/gambar/<?= $row['gambar'] ?>" class="ket-thumb">    
                        </div>
                        <div class="col-10">
                            <span><b>informasi tentang "<?= $row['judul_anime'] ?>"</b></span> <br>
                            <span><b>status : </b><?= $row['status'] ?></span> <br>
                            <span><b>durasi : </b><?= $row['durasi'] ?> per menit</span><br>
                            <span>
                                <b>genre : </b>
                                <?php
                                foreach ($genre_anime as $data) {
                                ?>
                                <a href="<?= base_url() ?>user/anime_genre/<?= $data['no_genre']?>"><?= $data['nama_genre'] ?>, </a>
                                <?php
                                }
                                ?>
                            </span>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="profil_anime">
                        <?php
                        foreach ($anime_episode as $row) {
                        ?>
                        <?= $row['deskripsi'] ?>
                        <?php    
                        }
                        ?>
                    </div>
                    <hr>
                    <hr>
                </div>
                <div class="comment">
                    <?php foreach($anime_episode as $row) { ?>   
                    <form action="<?= base_url() ?>user/tambah_komentar/<?= $row['no_episode']?>?no_anime=<?= $row['no_anime'] ?>" method="post">
                    <?php } ?>
                        <textarea name="isi_komentar" placeholder="Streaming anime episode lama rusak, silakan download saja, dan sebelum bilang tidak bisa download, silakan baca menu CARA DOWNLOAD di bagian atas website, jika link memang rusak, kalian bisa laporkan di sini, terima kasih..."></textarea>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nama*" name="nama">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="E-mail*" name="email">
                        </div>
                        <div class="text-right">
                            <input type="submit" value="Post Comment" class="btn btn-secondary">
                        </div>
                    </form>
                    <hr>
                </div>
                <div class="comment">
                    <?php
                    foreach ($komentar as $row) {
                    ?>
                    <h5 class="text-primary"><?= $row['nama'] ?></h5>
                    <div class="small">
                        <?php
                        if ($row['status'] == "OK") {
                            echo $row['isi_komentar'];
                        } else {
                            echo"<span class='text-secondary'><span class='oi oi-ban'></span> pesan ini telah diblokir oleh admin</span>";
                        }
                        
                        ?>
                    </div>
                    <hr>
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