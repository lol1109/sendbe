<?php $this->load->view("gallery/Side/header"); ?>
<?php $this->load->view("gallery/Side/navbar"); ?>
<!--Konten-->
<div class="page-wrapper">
    <!-- <div class="page-header d-print-none">
        <div class="container-xl">
            <h2 class="page-title text-center" style="display: block; text-align: center;">Profile</h2>
        </div>
    </div> -->
    <div class="page-body">
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col-3 d-none d-md-block border-end">
                    <div class="card-body">
                        <div class="mb-3 mt-4 text-center">
                            <span class="avatar avatar-xl rounded" style="box-shadow: none;background-image: url(<?= base_url('dist/img/avatar/kucing.JPG') ?>)"></span>
                        </div>
                        <div class="card-title mb-1 text-center"><?= $this->session->userdata('Username') ?></div>
                        <div class="text-muted text-center  mb-4">Software Engginering</div>
                        <div class="mb-2">
                          <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6l0 13"></path><path d="M12 6l0 13"></path><path d="M21 6l0 13"></path></svg>
                          Went to: <strong>SMK Labor Pekanbaru</strong>
                        </div>
                        <div class="mb-2">
                          <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path><path d="M12 12l0 .01"></path><path d="M3 13a20 20 0 0 0 18 0"></path></svg>
                          Worked at: <strong>Student</strong>
                        </div>
                        <div class="mb-2">
                          <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                          Lives in: <strong>Pekanbaru</strong>
                        </div>
                        <div class="mb-2">
                          <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                          From: <strong><span class="flag flag-country-id"></span>
                            Indonesia</strong>
                        </div>
                        <div class="mb-2">
                          <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                          Birth date: <strong>28/08/2006</strong>
                        </div>
                        <div>
                          <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 7v5l3 3"></path></svg>
                          Time zone: <strong>Jakarta/Pekanbaru</strong>
                        </div>
                      </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4 text-center">Album</h2>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 flex-nowrap overflow-auto">
                                <?php
                                foreach ($albums as $album) :
                                ?>
                                    <div class="col col-sm-2">
                                        <div class="card card-sm">
                                            <!-- Photo -->
                                            <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(<?= base_url('dist/img/gambar/galeri.jpg') ?>)"></div>
                                            <div class="card-body">
                                                <h3 class="card-title"><?= $album->NamaAlbum ?></h3>
                                                <p class="text-muted"><?= $album->Deskripsi ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h2 class="mb-4 text-center">Image</h2>
                            <?php
                                if (empty($Images)) {
                                    echo '<p class="text-muted text-center"> Tidak Ada Komentar </p>';
                                } else {
                            ?>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 flex-nowrap overflow-auto" id="imageContainer">
                            <?php
                                    foreach ($Images as $dt) :
                            ?>
                                    <div class="col col-sm-2">
                                        <div class="card card-sm">
                                            <a href="#" class="komenModals d-block" data-toggle="modal" data-target="#modal-image" data-id="<?= $dt->FotoID ?>" data-judul="<?= $dt->JudulFoto ?>" data-deskripsi="<?= $dt->DeskripsiFoto ?>" data-src="<?= base_url('dist/img/gambar/' . $dt->LokasiFile) ?>"><img src="<?= base_url('dist/img/gambar/' . $dt->LokasiFile) ?>" class="card-img-top"></a>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div><?= $dt->NamaLengkap ?></div>
                                                        <div class="text-muted"><?= date('d F Y', strtotime($dt->TanggalUnggah)); ?></div>
                                                    </div>
                                                    <!-- <div class="ms-auto">
                                                        <a href="#" class="komenModals text-muted" data-toggle="modal" data-target="#modal-image" data-id="<?= $dt->FotoID ?>" data-judul="<?= $dt->JudulFoto ?>" data-deskripsi="<?= $dt->DeskripsiFoto ?>" data-src="<?= base_url('dist/img/gambar/' . $dt->LokasiFile) ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M12 21C13.78 21 15.5201 20.4722 17.0001 19.4832C18.4802 18.4943 19.6337 17.0887 20.3149 15.4442C20.9961 13.7996 21.1743 11.99 20.8271 10.2442C20.4798 8.49836 19.6226 6.89471 18.364 5.63604C17.1053 4.37737 15.5016 3.5202 13.7558 3.17293C12.01 2.82567 10.2004 3.0039 8.55585 3.68508C6.91131 4.36627 5.50571 5.51983 4.51677 6.99987C3.52784 8.47991 3 10.22 3 12C3 13.488 3.36 14.89 4 16.127L3 21L7.873 20C9.109 20.639 10.513 21 12 21Z" stroke="#515151" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <span><?= count($komentarData[$dt->FotoID]) ?></span>
                                                        </a>
                                                        <a href="#" class="like-button ms-3 text-muted" data-photo-id="<?= $dt->FotoID ?>" data-user-id="<?= $this->session->userdata('Username') ?>" data-tanggal="<?= date('Y-m-d'); ?>">
                                                            <?php
                                                            // Cek apakah pengguna telah melakukan like pada foto ini
                                                            $userLiked = in_array($dt->FotoID, array_column($likesData, 'FotoID'));
                                                            ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="<?= $userLiked ? '#F44336' : 'none' ?>">
                                                                <path d="M7.5 4C4.4625 4 2 6.4625 2 9.5C2 15 8.5 20 12 21.163C15.5 20 22 15 22 9.5C22 6.4625 19.5375 4 16.5 4C14.64 4 12.995 4.9235 12 6.337C11.4928 5.6146 10.8191 5.02505 10.0358 4.61824C9.25245 4.21144 8.38265 3.99938 7.5 4Z" stroke="#515151" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <span class="like-number"><?= count($likesData[$dt->FotoID]) ?></span>
                                                        </a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("gallery/Side/fotter"); ?>