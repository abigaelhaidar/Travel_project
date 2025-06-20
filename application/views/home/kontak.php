 <!-- bradcam_area  -->
 <div class="bradcam_area bradcam_bg_4">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="bradcam_text text-center">
                     <h3>Kontak Kami</h3>
                     <p>Mafen Tour Travel</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--/ bradcam_area  -->

 <script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert2.min.js"></script>
 <script src="<?= base_url('assets/') ?>admin/js/sweetalert/sweetalert-custom.js"></script>
 <script>
     // Cek apakah ada flashdata untuk success
     <?php if ($this->session->flashdata('success')): ?>
         Swal.fire({
             icon: 'success',
             title: 'Berhasil',
             text: '<?= $this->session->flashdata('success') ?>',
         });
     <?php endif; ?>

     // Cek apakah ada flashdata untuk error
     <?php if ($this->session->flashdata('error')): ?>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: '<?= $this->session->flashdata('error') ?>',
         });
     <?php endif; ?>
 </script>

 <section class="contact-section">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <h2 class="contact-title">Kirim Kami Pertanyaan</h2>
             </div>
             <div class="col-lg-8">
                 <form class="form-contact contact_form" action="<?php echo base_url('Home/simpan'); ?>" method="post" id="contactForm">
                     <div class="row">
                         <div class="col-sm-6">
                             <div class="form-group">
                                 <input class="form-control valid" name="nama" id="nama" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ketik Nama Anda'" placeholder="Nama Anda" required>
                             </div>
                         </div>
                         <div class="col-sm-6">
                             <div class="form-group">
                                 <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ketik Alamat Email'" placeholder="Email Anda">
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="form-group">
                                 <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ketik Subject'" placeholder="Ketik Subject">
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="form-group">
                                 <textarea class="form-control w-100" name="pesan" id="pesan" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ketik Pesan/Masukan'" placeholder=" Ketik Pesan/Masukan"></textarea>
                             </div>
                         </div>
                     </div>
                     <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

                     <!-- reCAPTCHA -->
                     <input type="hidden" id="recaptchaResponse" name="recaptcha_response">

                     <div class="form-group mt-3">
                         <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
                     </div>
                 </form>
             </div>
             
             <div class="col-lg-3 offset-lg-1">
                 <div class="media contact-info">
                     <span class="contact-info__icon"><i class="ti-home"></i></span>
                     <div class="media-body">
                         <h3>Jl. Pandowoharjo, Kradonan, Nyaen, <br>Kel Pandowoharjo, Kec Sleman, <br>Kab Sleman Prov Daerah Istimewa Yogyakarta.</h3>
                     </div>
                 </div>
                 <div class="media contact-info">
                     <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                     <div class="media-body">
                         <h3>+62 881 853 3443</h3>
                     </div>
                 </div>
                 <div class="media contact-info">
                     <span class="contact-info__icon"><i class="ti-email"></i></span>
                     <div class="media-body">
                         <h3>mafenjayamas@gmail.com</h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
