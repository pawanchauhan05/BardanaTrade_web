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
    <!-- Owal carousal -->
    <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/owl.carousel/dist/assets/owl.carousel.min.css" />
    <!-- X-editable -->
    <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" />
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/bootstrap-sweetalert/dist/sweetalert.css" />
    

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>custom/css/custom-bardanatrade.css" rel="stylesheet">
  </head>

  <body>

    <?php $this->load->view('common/header') ?>

    <?php $this->load->view('common/navbar') ?>

    <?php $this->PreLoginModel->loadView($redirectUrl) ?>

    <?php $this->load->view('common/footer') ?>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Owal carousal -->
    <script src="<?php echo base_url() ?>bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- X-editable -->
    <script src="<?php echo base_url() ?>bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <!-- Sweet Alert -->
    <script src="<?php echo base_url() ?>bower_components/bootstrap-sweetalert/dist/sweetalert.js"></script>

    
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

        $('#profile-item-name').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

        $('#profile-item-mobile').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

        $('#profile-item-organisation').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });


        $('#profile-item-designation').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

        $('#profile-item-location').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

        $('#profile-item-city').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

        $('#profile-item-state').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

        $('#profile-item-country').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

        $('#profile-item-pincode').editable({
                           validate: function(value) {
                              if($.trim(value) == '') 
                                return 'This field is required';
                            }
                        });

    });
    </script>

    <script type="text/javascript">
      
      function showInputFeild(that) {
        if (that.value == "Others") {
            document.getElementById("product-form-others").style.display = "block";
        } else {
            document.getElementById("product-form-others").style.display = "none";
        }
      }

      function showSweetAlert(productId) {
        <?php 
        $sessionData = $this->HomeModel->readSessionData();
        if(isset($sessionData['sessionData'])) { ?>
          var userEmail = "<?php echo $sessionData['sessionData']['email'] ?>";
          $.ajax({
             type: "POST",
             url: "contact-to-user",
             data:'id='+productId+'&email='+userEmail,
             success: function(){
               swal("Thank you!", "Notification has been sent to user.", "success");
             }
           });
        <?php } else { ?>
        swal({
            title: "Are you logged in?",
            text: "You will not be able to contact!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Warning",
            closeOnConfirm: false
          });
        <?php } ?>
      }

    </script>

    <script type="text/javascript">
      $(function() { 
        // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            // save the latest tab; use cookies if you like 'em better:
            localStorage.setItem('lastTab', $(this).attr('href'));
        });

        // go to the latest tab, if it exists:
        var lastTab = localStorage.getItem('lastTab');
        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }
      });

    </script>

<script type="text/javascript">
  var selectedProducts = [];
  $(document).ready(function() {
    
    <?php echo "var total_group = " . $this->HomeModel->totolGroup() . ""  ?>;
    var total_record = 0;
    console.log(total_group);  
    $('#results').load("<?php echo LOAD_PRODUCT_URL ?>",
     {'selectedProducts':selectedProducts, 'category' : '<?php echo $this->uri->segment(2) ?>'}, 
     function() {total_record++; console.log("load "+total_record);  });
    

    $(window).scroll(function() {       
        if($(window).scrollTop() + $(window).height() == $(document).height())  
        {
          if(total_record <= total_group) {
            
            $.post('<?php echo LOAD_MORE_PRODUCT_URL ?>',{'group_no': total_record, 'category' : '<?php echo $this->uri->segment(2) ?>', 'selectedProducts': selectedProducts },
              function(data){ 
                  if (data != "") {                               
                      $("#results").append(data);                 
                      //$('.loader_image').hide();                  
                      total_record++;
                      console.log("scroll "+selectedProducts);
                  }
              });
          }     
        }
    });

    
  });

  function check() {
      selectedProducts = [];
      $(':checked').each(function() {
         selectedProducts.push($(this).val());
       });
      console.log(selectedProducts);
      $(document).ready(function() {
        $('#results').load("<?php echo LOAD_PRODUCT_URL ?>",
       {'selectedProducts': selectedProducts, 'category' : '<?php echo $this->uri->segment(2) ?>'}, 
       function() {});
      });
  }

  
</script>

  </body>
</html>
