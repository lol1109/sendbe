<?php $this->load->view("gallery/Side/header"); ?>
<div class="page page-center">
  <!--Konten-->
  <div class="container container-tight py-4">
    <div class="text-center mb-2">
      <a href="." class="navbar-brand navbar-brand-autodark"></a>
    </div>
    <div class="card card-xl">
      <div class="card-body">
        <h2 class="card-title text-center mb-4"><?php
          $error = $this->session->flashdata('mail');
          $error1 = $this->session->flashdata('user');

          if (!empty($error)) {
            echo '<span style="color: red;">' . $error . '</span>';
          
          } elseif(!empty($error1)){
            echo '<span style="color: red;">' . $error1 . '</span>';
          } else {
            echo "Create new account";
          }
          ?></h2>
        <form action="<?= base_url('Auth/singup') ?>" method="post" autocomplete="on">

          <div class="row g-2">
            <div class="col-6 mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="NamaLengkap" class="form-control" placeholder="<?php
              if (!empty(form_error('NamaLengkap'))) {
                echo 'Form ini harus di isi!';
              } else {
                echo "Enter Nama";
              }
              ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="Username" class="form-control" placeholder="<?php
              if (!empty(form_error('Username'))) {
                echo 'Form ini harus di isi!';
              } else {
                echo "Enter username";
              }
              ?>">
            </div>
          </div>

          <div class="row g-2">
            <div class="col-12 mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name="Password" class="form-control" placeholder="<?php
              if (!empty(form_error('Password'))) {
                echo 'Form ini harus di isi!';
              } else {
                echo "Enter password";
              }
              ?>" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-6 mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="Email" class="form-control" placeholder="<?php
              if (!empty(form_error('Email'))) {
                echo 'Form ini harus di isi!';
              } else {
                echo "Enter email";
              }
              ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Alamat</label>
              <input type="text" name="Alamat" class="form-control" placeholder="<?php
              if (!empty(form_error('Alamat'))) {
                echo 'Form ini harus di isi!';
              } else {
                echo "Enter Alamat";
              }
              ?>">
            </div>
          </div>
      <div class="mb-1">
        <label class="form-check">
          <input type="checkbox" class="form-check-input" required>
          <span class="form-check-label">I Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
        </label>
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-success w-100 bg-blue">Create new account</button>
      </div>
      </form>
    </div>
    </div>
    <div class="text-center text-muted mt-3">
      Already have account? <a href="<?= base_url('Auth/loginAkun'); ?>" tabindex="-1">Sign in</a>
    </div>
  </div>
</div>
<?php $this->load->view("gallery/Side/fotter"); ?>