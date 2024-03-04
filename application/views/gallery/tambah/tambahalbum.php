<?php $this->load->view("gallery/Side/header"); ?>
<?php $this->load->view("gallery/Side/navbar"); ?>
<!--Konten-->
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <h2 class="page-title text-center" style="display: block; text-align: center;">Tambah Album</h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container container-tight py-4">
            <div class="card card-sm">
                <div class="card-body">
                    <form action="<?= base_url('Image/addAlbum') ?>" method="post" autocomplete="on">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="Judul" class="form-control" placeholder="Nama Album" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="Deskpripsi" rows="6" placeholder="Content.." style="height: 149px;" required></textarea>
                        </div>
                        <input type="hidden" name="tanggalBuat" value="<?= date('Y-m-d'); ?>">
                        <input type="hidden" name="user" value="<?= $this->session->userdata('Username') ?>">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-info w-100 mb-2">Buat Album</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("gallery/Side/fotter"); ?>