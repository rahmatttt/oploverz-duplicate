<div class="main-container">
    <div class="text-center block">
        <img src="assets/gambar/logo.png" alt="logo">
        <h1>Admin login</h1>
        <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="form text-left">
            <form action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="username"  placeholder="username" autocomplete="off">
                <small class="form-text text-danger"><?= form_error('username'); ?></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <small class="form-text text-danger"><?= form_error('password'); ?></small>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="check">
                <label class="form-check-label" for="check">show password</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<script src="assets/script/show_password.js"></script>