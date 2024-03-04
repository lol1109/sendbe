<?php $this->load->view("gallery/Side/header"); ?>
<?php $this->load->view("gallery/Side/navbar"); ?>
<!--Konten-->
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <h2 class="page-title text-center" style="display: block; text-align: center;">Users</h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                        <span class="avatar avatar-sm" style="box-shadow: none;background-image: url(<?= base_url('dist/img/avatar/avatar.webp') ?>)"></span>
                            <h3 class="m-0 mb-1"><a href="<?= base_url('/Home/profile') ?>"><?= $this->session->userdata('Username') ?></a></h3>
                            <div class="text-muted">Developer</div>
                            <div class="mt-3">
                                <span class="badge bg-purple-lt">Owner</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="<?= base_url('Home/album') ?>" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->

                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                        <path d="M300 2735 l0 -1645 838 -2 837 -3 3 -173 2 -172 1420 0 1420 0 0
1115 0 1115 -280 0 -280 0 0 405 0 405 -1062 0 -1063 0 -176 298 -177 297
-741 3 -741 2 0 -1645z m1535 1130 l180 -300 1013 -3 1012 -2 0 -295 0 -295
-1030 0 -1030 0 0 -835 0 -835 -730 0 -730 0 0 1435 0 1435 568 -2 567 -3 180
-300z m2765 -1756 c0 -616 -1 -651 -17 -638 -10 8 -157 133 -328 279 -171 146
-318 271 -326 277 -15 12 -57 -20 -580 -457 l-45 -39 -263 225 -263 225 -52
-44 c-196 -166 -525 -437 -530 -437 -8 0 -8 1245 1 1253 3 4 546 7 1205 7
l1198 0 0 -651z m-242 -729 l241 -205 0 -112 1 -113 -1205 0 -1205 0 0 130 0
130 291 242 c160 134 293 243 295 243 3 0 162 -135 355 -300 193 -165 355
-301 359 -303 8 -3 135 144 135 157 0 5 -35 38 -78 74 l-77 66 221 185 222
185 102 -87 c57 -48 211 -180 343 -292z" />
                                        <path d="M3234 2580 c-69 -14 -138 -56 -192 -115 -158 -173 -100 -442 117
-544 47 -22 70 -26 141 -26 71 0 94 4 141 26 78 37 133 90 169 163 42 86 49
163 21 255 -50 165 -232 275 -397 241z m126 -225 c66 -34 90 -116 55 -185 -42
-82 -188 -82 -230 0 -20 38 -19 110 1 139 39 55 116 76 174 46z" />
                                    </g>
                                </svg>
                                Album
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("gallery/Side/fotter"); ?>