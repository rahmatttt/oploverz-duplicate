<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link" href="<?= base_url() ?>user">Home</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/daftar_isi">Daftar Isi</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/ongoing">ON-GOING</a>
        <a class="nav-item nav-link" href="<?= base_url() ?>user/genre">Genres</a>
        <a class="nav-item nav-link active" href="<?= base_url() ?>user/faq">FAQ</a>
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
                        <h5>FAQ – Yang Sering Ditanyakan</h5>
                        <small class="text-secondary">Diposting oleh oploverz hari Senin, 30 November, 2015, Category: FAQ</small>
                        <hr>
                    </div>
                    <div>
                        <h6>1. Mengenai server upload</h6>
                        <p>
                            – tanya : mengapa kok g pakai indowebster dan ini atau itu atau blablabla…? <br>
                            – jawab : kami menggunakan server yang menurut kami terbaik, baik dari sisi upload maupun download. Silakan dipelajari cara downloadnya
                        </p>
                        <h6>2. Mengenai anime yang ditampilkan</h6>
                        <p>
                            – tanya : jual episode anime dalam bentuk CD/DVD gan? <br>
                            – jawab : kami tidak akan menjualbelikan anime yang kami terjemahkan, silakan download gratis di web kami
                        </p>
                        <p>
                            – tanya : kenapa gak ambil anime code breaker, zetsuen…, dll? <br>
                            – jawab : project kami menyesuaikan penerjemah yang ada, dan minat masing-masing penerjemah.
                        </p>
                        <p>
                            – tanya : jadwal rilis animenya kapan gan? <br>
                            – jawab : bisa di cek di menu jadwal rilis anime oploverz
                        </p>
                        <p>
                            – tanya : Gan episode sebelumnya yang 720p atau 1080p sudah g bisa di download gimana itu? <br>
                            – jawab : 720p atau 1090p hanya tersedia untuk episode baru saja
                        </p>
                        <p>
                            – tanya : Gan kenapa anime Prince of Tennis rilisnya bisa cepet? Dan anime DDS nya malah lambat?
                            – jawab : Tiap anime penerjemahnya beda, jadi kecepatan rilisnya pun juga berbeda. mohon maklum saja.
                        </p>
                        <h6>3. Mengenai website</h6>
                        <p>
                            – tanya : kenapa komentar/kritik dan saran saya koq ndak muncul di posting? <br>
                            – jawab : komentar berisi keluhan, cemoohan,dan pertanyaan tentang jadwal rilis tidak akan kami jawab dan tampilkan dan jika ada kritik atau saran silakan langsung inbox saja ke facebook admin oploverz dengan nama yang jelas, agar bisa segera ditindak lanjuti, itu yang kami terima menjadi masukan daripada hanya berkomentar di posting dengan pakai nama anonim atau nama tokoh anime.
                        </p>
                        <p>
                            – Tanya : Maaf gan iklannya sangat mengganggu menutupi postingnya, bisa diatur supaya tidak menutupi/menghalangi? <br>
                            – Jawab : Mohon pengertiannya juga, kami oploverz bisa update cepat sampai sekarang karena iklan tersebut. Kami perlu membayar 2 server buat website dan juga 3 buah server untuk filehosting, lalu kebutuhan koneksi internet. Karena semakin banyak pengunjung biaya operasionalnya pun akan semakin bertambah, Kami tidak meminta donasi, tapi mohon bantu kami dengan iklan saja dan dimohon untuk tidak memakai adblock, karena hal itu lambat laun akan mematikan website ini jika biaya operasional tidak terpenuhi. Dan jika kalian memakai blokir iklan dengan cara tertentu, itu akan sangat merugikan kami karena lama kelamaan mungkin kami takkan bisa bayar operasional dan update seperti sekarang.
                        </p>
                        <p>
                            – Tanya : Lalu kenapa website sebelah iklannya bisa dikit atau bahkan tidak ada iklan sama sekali, tetep bisa jalan tuh?
                            – Jawab : Kebutuhan dan cara kerja tiap website itu berbeda-beda, ditentukan dari jumlah pengunjung, dan kami juga punya filehosting sendiri, jadi kebutuhan biaya server jelas beda dengan web tanpa iklan yang pengunjungnya relatif sedikit. Semuanya kembali pada kalian masing-masing, klo emg nyaman Download di web sebelah monggo, silakan download di sana, klo nyaman di sini bisa di sini dan terima segala kondisi dan aturan web kami.
                        </p>
                        <p>
                            Intinya : <br>
                            <b>– Ingin rilisan bagus dan cepat :</b> bisa ke sini dengan iklan2 kami <br>
                            <b>– Ingin web tanpa iklan dan lebih lambat  :</b> monggo silakan ke website sebelah yang menurut kamu lebih baik dan nyaman
                        </p>
                        <h6>4. Mengenai video</h6>
                        <p>
                            – tanya : gan kenapa suara ngk keluar? aq pke gom player VLC dll memutarnya?! <br>
                            – jawab : silakan update codec audio n video kamu, bisa di download di sini : <br>
                            http://codecguide.com/download_k-lite_codec_pack_mega.htm <br>
                            dan untuk player disarankan pakai Media Player Classic, itu standar player kami.
                        </p>
                        <p>
                            – tanya : gan apa beda 10bit dengan versi biasa? <br>
                            – jawab : baca di <a href="http://www.bakaotakun.com/2011/08/10-bit-anime-encoding.html"><b>SINI</b></a>
                        </p>
                        <p>
                            – tanya : gan kok subtitlenya tidak muncul di PC/laptopku? <br>
                            – Jawab : baca tutorial ini : <a href="https://www.oploverz.in/tutorial-play-video-softsub/"><b>https://www.oploverz.in/tutorial-play-video-softsub/</b></a>
                        </p>
                        <p>
                            – tanya : gan kok subtitlenya tidak muncul di hp androidku? <br>
                            – jawab : baca di sini : <a href="https://www.oploverz.in/cara-play-video-mkv-softsub-di-hp-android/"><b>https://www.oploverz.in/cara-play-video-mkv-softsub-di-hp-android/</b></a>
                        </p>
                        <h6>5. Mengenai website/blog yang ingin share rilisan kami</h6>
                        <p>
                            – tanya : Gan boleh ane share rilisan ente? Di youtube, website atau aplikasi? Dan boleh reupload ngk? <br>
                            – jawab : Maaf untuk share di youtube dan aplikasi kami tidak mengizinkan dan tidak mengizinkan, silakan share ke website atau blog kamu, bukan ke aplikasi android dan semacamnya.
                        </p>
                        <p>Jika ada pertanyaan yang kami anggap penting, selanjutnya akan kami tampilkan di sini, terima kasih</p>
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