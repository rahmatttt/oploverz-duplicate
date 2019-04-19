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
                        <h5>DMCA</h5>
                        <small class="text-secondary">Diposting oleh oploverz hari Minggu, 29 November, 2015, Category: FAQ</small>
                        <hr>
                    </div>
                    <div>
                        <p>
                        If you have reason to believe that one of our content is violating your copyrights or some of Search Results references to illegal contents, please send a email for us. Please allow up to a 1-5 business days for an email response. Note that emailing your complaint to other parties such as our Internet Service Provider, Hosting Provider, and other third party will not expedite your request and may result in a delayed response due to the complaint not being filed properly.
                        </p>
                        <h6>Required information</h6>
                        <p>
                            Please note that we deal only with messages that meet the following requirements: <br>
                            – Please Provide us with your name, address and telephone number. We reserve the right to verify this information. <br>
                            – Explain which copyrighted material is affected. <br>
                            – Please provide the exact and complete to the url link. <br>
                            – If it a case of files with illegal contents, please describe the contents briefly in two or three points. <br>
                            – Please ensure that you can receive further enquiries from us at the e-mail address you are writing from. <br>
                            – Please write to us only in English. <br>
                        </p>
                        <div class="small">
                            <small><h6>Notice:</h6></small>
                            <p>Anonymous or incomplete messages will not be deal with it. Thank you for your understanding.</p>
                        </div>
                        <h6>DISCLAIMER:</h6>
                        <p>
                        None of the all files and video listed in this website are hosted on the server of https://www.oploverz.in all point to content hosted on third party websites. https://www.oploverz.in does not accept responsibility for content hosted on third party websites and does not have any involvement in the downloading/uploading of movies . we just post links available in internet. If you think any of the contents of this site infringes any intellectual property law and you hold the copyright of that content please report it to boztaga@gmail.com the content will be immediately removed.
                        </p>
                        <p>Thank you.</p>
                        <p>Admin</p>
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