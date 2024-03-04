<?php $this->load->view("gallery/Side/header"); ?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<?php $this->load->view("gallery/Side/navbar"); ?>
<!--Konten-->
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Galeri
                    </h2>
                    <div id="numImages" class="text-muted mt-1">1-<?php if ($ImagesData < 6) { ?><?= $ImagesData ?><?php } else { ?><?= 6 ?><?php } ?> of <?= $ImagesData ?> Image</div>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <div class="me-3">
                            <div class="input-icon">
                                <input type="text" id="searchInput" name="search" class="form-control" placeholder="Search…">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M21 21l-6 -6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <a href="<?= base_url('Image') ?>" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Add Image
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards" id="imageContainer">
                <?php
                foreach ($Images as $dt) :
                ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm">
                            <a href="#" class="komenModals d-block" data-toggle="modal" data-target="#modal-image" data-id="<?= $dt->FotoID ?>" data-judul="<?= $dt->JudulFoto ?>" data-deskripsi="<?= $dt->DeskripsiFoto ?>" data-src="<?= base_url('dist/img/gambar/' . $dt->LokasiFile) ?>"><img src="<?= base_url('dist/img/gambar/' . $dt->LokasiFile) ?>" class="card-img-top"></a>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 rounded">JL</span>
                                    <div>
                                        <div><?= $dt->NamaLengkap?></div>
                                        <div class="text-muted"><?= date('d F Y', strtotime($dt->TanggalUnggah)); ?></div>
                                    </div>
                                    <div class="ms-auto">
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
                                            $fillColor = ($userLiked == 1) ? '#F44336' : 'none';
                                            ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="<?= $userLiked ? '#F44336' : 'none' ?>">
                                                <path d="M7.5 4C4.4625 4 2 6.4625 2 9.5C2 15 8.5 20 12 21.163C15.5 20 22 15 22 9.5C22 6.4625 19.5375 4 16.5 4C14.64 4 12.995 4.9235 12 6.337C11.4928 5.6146 10.8191 5.02505 10.0358 4.61824C9.25245 4.21144 8.38265 3.99938 7.5 4Z" stroke="#515151" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="like-number"><?= count($likesData[$dt->FotoID]) ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="paginations" class="d-flex mt-2">
                <?= $pager; ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal Untuk Komentar dan memperbesar gambar -->
<div class="modal modal-blur fade" id="modal-image" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row no-wrap">
                    <h5 class="modal-title" id="modaljudul"></h5>
                    <div>
                        <form id="hapus" action="<?= base_url('Image/deleteImage') ?>" method="get">
                            <input type="hidden" name="FotoID" id="FotoID">
                        </form>
                        <a id="hapusFoto" class="navbar-brand">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" />
                            <path d="M10 11l0 6" /><path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </a>
                        <a id="editImage" class="navbar-brand">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                            <path d="M16 5l3 3" /></svg></a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <img id="modal-image-src" class="img-fluid rounded-3 mb-2">
                        <span class="text-muted" id="modaldeskripsi"></span>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <div class="card-body scrollable mb-1" style="max-height: 30rem;">
                            <div class="chat mt-2 mb-2 me-2">
                                <div class="chat-bubbles ">
                                    <?php foreach ($komentarData as $komen) : ?>
                                        <div class="chat-item">
                                            <div class="row align-items-end justify-content-end">
                                                <div class="col col-lg-6">
                                                    <div class="chat-bubble chat-bubble-me">
                                                        <div class="chat-bubble-title">
                                                            <div class="row">
                                                                <div class="col chat-bubble-author"><?= $komen->Username ?></div>
                                                                <div class="col-auto chat-bubble-date"><?= $komen->TanggalKomentar ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble-body">
                                                            <p><?= $komen->IsiKomentar ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="position: sticky; bottom: 0;">
                            <form id="komentar" action="<?= base_url('Home/komen') ?>" method="post">
                                <input type="hidden" name="PhotoId" id="PhotoId">
                                <input type="hidden" name="TanggalUnggah" value="<?= date('Y-m-d'); ?>">
                                <input type="hidden" name="user" value="<?= $this->session->userdata('Username') ?>">
                                <div class="input-group input-group-flat">
                                    <input type="text" id="km" class="form-control" name="komen" autocomplete="off" placeholder="Type Comment">
                                    <span class="input-group-text">
                                        <a id="AddComment" class="link-secondary ms-2" data-bs-toggle="tooltip" aria-label="Add Comment" data-bs-original-title="Add Comment"> <!-- Download SVG icon from http://tabler-icons.io/i/paperclip -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 14l11 -11" />
                                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script jQuery dan AJAX -->
<script>
    $(document).ready(function() {
        // search gambar berdasarkan nama
        $('#searchInput').keypress(function(event) {
            if (event.keyCode === 13) {
                event.preventDefault(); // Prevent default behavior of the Enter key
                var searchQuery = $('#searchInput').val().trim();

                // Lakukan pencarian hanya jika input tidak kosong
                if (searchQuery !== '') {
                    // Lakukan permintaan AJAX untuk mencari gambar
                    $.ajax({
                        url: '<?= base_url('Home/searchImages') ?>',
                        type: 'GET',
                        data: {
                            searchQuery: searchQuery
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Tanggapi ketika permintaan berhasil
                            updateImages(response.searchData, response.likesData, response.komenData, response.imagesData);
                        },
                        error: function(error) {
                            // Menampilkan pesan kesalahan jika terjadi kesalahan
                            console.error('Search Error:', error.responseText);
                        }
                    });
                }
            }
        });
    });
    // menampilakn detail tentang gambar dan komentar
    $(document).on('click', '.komenModals', function() {
        var FotoID = $(this).data('id');
        var judul = $(this).data('judul');
        var src = $(this).data('src');
        var deskripsi = $(this).data('deskripsi');

        $.ajax({
            url: '<?= base_url('Home/komentar') ?>',
            type: 'GET',
            data: {
                FotoID,
                FotoID
            },
            dataType: 'json',
            success: function(response) {
                // Menangani respons dari server

                // Menghapus konten komentar yang mungkin sudah ada sebelumnya
                $('.chat-bubbles').empty();

                // Memeriksa apakah data komentar ada dalam respons
                if (response && response.komentar.length > 0) {
                    // Melakukan loop untuk setiap komentar dalam data
                    response.komentar.forEach(function(comment) {
                        // Membuat elemen baru untuk menampilkan komentar
                        var chatItem = $('<div class="chat-item">' +
                            '<div class="row align-items-end justify-content-end">' +
                            '<div class="col col-lg-6">' +
                            '<div class="chat-bubble chat-bubble-me">' +
                            '<div class="chat-bubble-title">' +
                            '<div class="row">' +
                            '<div class="col chat-bubble-author"></div>' +
                            '<div class="col-auto chat-bubble-date"></div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="chat-bubble-body">' +
                            '<p></p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>');

                        // Mengisi data komentar ke dalam elemen baru
                        chatItem.find('.chat-bubble-author').text(comment.Username);
                        chatItem.find('.chat-bubble-date').text(comment.TanggalKomentar);
                        chatItem.find('.chat-bubble-body p').text(comment.IsiKomentar);

                        // Menambahkan elemen baru ke dalam kontainer komentar
                        $('.chat-bubbles').append(chatItem);
                    });
                } else {
                    // Menangani kasus ketika tidak ada komentar yang tersedia
                    var chatNull = $('<p class="text-muted text-center"> Tidak Ada Komentar </p>');
                    $('.chat-bubbles').append(chatNull);
                }
            },

            error: function(error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan
                console.error('Error:', error.responseText);
            }


        });

        $('#modaljudul').text(judul);
        $('#modal-image-src').attr('src', src);
        $('#PhotoId').attr('value', FotoID);
        $('#modaldeskripsi').text(deskripsi);
        $('#FotoID').attr('value', FotoID);
        $('#editImage').attr('data-id', FotoID);

        $('#modal-image').modal('show');
    });
    // Menambah komentar
    $('#AddComment').click(function() {
        // Mendapatkan nilai input komentar
        var komentarValue = $('#km').val().trim();

        // Memeriksa apakah komentar diisi atau tidak
        if (komentarValue !== '') {
            // Jika diisi, submit formulir
            $('#komentar').submit();
        } else {
            // Jika tidak diisi, tampilkan pesan atau lakukan tindakan lainnya
            alert('Please enter a comment before submitting.');
            // atau mungkin melakukan sesuatu yang sesuai dengan kebutuhan Anda
        }
    });

    $('#hapusFoto').click(function(){
        $('#hapus').submit();
    });

    $('#editImage').click(function(){
        var FotoID = $(this).data('id');

        window.location.href = "<?= base_url('Image/EditImage/') ?>" + FotoID;
    });

    // Menangani klik tombol "like"
    $(document).on('click', '.like-button', function() {
        var photoId = $(this).data('photo-id');
        var UserId = $(this).data('user-id');
        var tanggal = $(this).data('tanggal');
        var lk = $(this).find('.like-number');

        $.ajax({
            url: '<?= base_url('Home/like') ?>',
            type: 'POST',
            data: {
                photoId: photoId,
                userId: UserId,
                tanggal: tanggal
            },
            dataType: 'json', // Mengatur tipe data yang diharapkan dari respons
            success: function(response) {
                // Menampilkan respons dari permintaan AJAX pada elemen dengan id "response"
                // Tanggapi ketika permintaan berhasil
                lk.text(response.likes);
                console.log(response.likeAkun);
                // Misalnya, perbarui antarmuka pengguna secara dinamis
            },
            error: function(error) {
                // Menampilkan pesan kesalahan jika terjadi kesalahan
                console.error('Error:', error.responseText);
            }
        });

    });

    function updateImages(searchData, likeData, komenData, imagesData) {
        var imageContainer = $('#imageContainer');
        var pagination = $('#paginations');
        var base_url = '<?= base_url(); ?>';
        imageContainer.empty();

        var imageDatas = $('#numImages');
        imageDatas.empty();

        var cek = (imagesData < 6) ? imagesData : 6;

        imageDatas1 = '1-' + cek + ' of ' + imagesData + ' Image';
        console.log(imageDatas1);
        imageDatas.append(imageDatas1);

        if (cek < 6) {
            pagination.empty();
        }

        searchData.forEach(function(image) {
            var imageHtml = '<div class="col-sm-6 col-lg-4">';
            imageHtml += '<div class="card card-sm">';
            imageHtml += '<a href="#" class="komenModals d-block" data-toggle="modal" data-target="#modal-image" data-id="' + image.FotoID + '" data-judul="' + image.JudulFoto + '" data-deskripsi="' + image.DeskripsiFoto + '" data-src="' + base_url + 'dist/img/gambar/' + image.LokasiFile + '"><img src="' + base_url + 'dist/img/gambar/' + image.LokasiFile + '" class="card-img-top"></a>';
            imageHtml += '<div class="card-body">';
            imageHtml += '<div class="d-flex align-items-center">';
            imageHtml += '<span class="avatar me-3 rounded">JL</span>';
            imageHtml += '<div>';
            imageHtml += '<div>' + image.NamaLengkap + '</div>';
            imageHtml += '<div class="text-muted">' + image.TanggalUnggah + '</div>';
            imageHtml += '</div>';
            imageHtml += '<div class="ms-auto">';
            imageHtml += '<a href="#" class="komenModals text-muted" data-toggle="modal" data-target="#modal-image" data-id="<?= $dt->FotoID ?>" data-judul="<?= $dt->JudulFoto ?>" data-deskripsi="<?= $dt->DeskripsiFoto ?>" data-src="<?= base_url('dist/img/gambar/' . $dt->LokasiFile) ?>">';
            imageHtml += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">';
            imageHtml += '<path d="M12 21C13.78 21 15.5201 20.4722 17.0001 19.4832C18.4802 18.4943 19.6337 17.0887 20.3149 15.4442C20.9961 13.7996 21.1743 11.99 20.8271 10.2442C20.4798 8.49836 19.6226 6.89471 18.364 5.63604C17.1053 4.37737 15.5016 3.5202 13.7558 3.17293C12.01 2.82567 10.2004 3.0039 8.55585 3.68508C6.91131 4.36627 5.50571 5.51983 4.51677 6.99987C3.52784 8.47991 3 10.22 3 12C3 13.488 3.36 14.89 4 16.127L3 21L7.873 20C9.109 20.639 10.513 21 12 21Z" stroke="#515151" stroke-linecap="round" stroke-linejoin="round" />';
            imageHtml += '</svg>';
            imageHtml += '<span>' + komenData[image.FotoID] + '</span>';
            imageHtml += '</a>';
            imageHtml += '<a href="#" class="like-button ms-3 text-muted" data-photo-id="' + image.FotoID + '" data-user-id="<?= $this->session->userdata('Username') ?>" data-tanggal="<?= date('Y-m-d'); ?>">';
            imageHtml += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="' + (image.userLiked ? '#F44336' : 'none') + '">';
            imageHtml += '<path d="M7.5 4C4.4625 4 2 6.4625 2 9.5C2 15 8.5 20 12 21.163C15.5 20 22 15 22 9.5C22 6.4625 19.5375 4 16.5 4C14.64 4 12.995 4.9235 12 6.337C11.4928 5.6146 10.8191 5.02505 10.0358 4.61824C9.25245 4.21144 8.38265 3.99938 7.5 4Z" stroke="#515151" stroke-linecap="round" stroke-linejoin="round" />';
            imageHtml += '</svg>';
            imageHtml += '<span class="like-number">' + likeData[image.FotoID] + '</span>';
            imageHtml += '</a>';
            imageHtml += '</div>';
            imageHtml += '</div>';
            imageHtml += '</div>';
            imageHtml += '</div>';
            imageHtml += '</div>';

            imageContainer.append(imageHtml);
        });
    }
</script>
<?php $this->load->view("gallery/Side/fotter"); ?>