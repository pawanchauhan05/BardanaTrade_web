<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bardana Trade</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owal carousal ---->
    <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/owl.carousel/dist/assets/owl.carousel.min.css" />
    

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>custom/css/custom.css" rel="stylesheet">
  </head>

  <body>

    <?php $this->load->view('common/header') ?>

    <?php $this->load->view('common/navbar') ?>

    <?php $this->PreLoginModel->loadView() ?>

    <?php $this->load->view('common/footer') ?>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Owal carousal ---->
    <script src="<?php echo base_url() ?>bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

    
    <!-- Custom Theme Scripts 
    <script src="<?php echo base_url() ?>custom/js/custom.min.js"></script> -->

    <script type="text/javascript">
    $(document).ready(function(){
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:3,
            loop:true,
            margin:15,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:false
        });
        $('.play').on('click',function(){
            owl.trigger('autoplay.play.owl',[1000])
        })
        $('.stop').on('click',function(){
            owl.trigger('autoplay.stop.owl')
        })
    });
    </script>

  </body>
</html>
