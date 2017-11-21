<?php $this->load->view('common/header_inner'); ?>
<section class="main-container download-main-container color-bg-green clearfix">
    <div class="container">
      <div class="downloadcontainer text-center clearfix">
        <h2 class="download-title">Download App</h2>
        <?php if(count($orders) > 0) { ?>
        <a href="<?= base_url() ?>assets/upload/docs/test_pdf1.pdf" class="btn btn-download" download="Licence">Download App</a>
        <?php } else { ?>
        <p>Nothing to download.</p>
        <?php } ?>
        <figure class="downloadfigure"> <img src="assets/images/downloadImage.jpg" alt="" class="img-responsive"> </figure>
      </div>
    </div>
  </section>
  <?php $this->load->view('common/footer_inner'); ?>