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
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>bower_components/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>bower_components/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url() ?>bower_components/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url() ?>bower_components/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Datatables -->
    <link href="<?php echo base_url() ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- X-editable -->
    <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" />
    <!-- Tooltipster -->
    <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/tooltipster/dist/css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css" />
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>custom/css/custom.min.css" rel="stylesheet">
    <!-- Custom Css Style -->
    <link href="<?php echo base_url() ?>custom/css/admin.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>bower_components/jquery/dist/jquery.min.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">

      <?php 
        // TODO check proper login or home
        //  $this->AdminModel->stopSession();
        $sessionData = $this->AdminModel->readSessionData();
        if(isset($sessionData['adminSessionData'])) {
          $this->load->view('admin/main');
        } else {
          $this->load->view('admin/login');
        }

      ?>


    </div>

    
    <!-- angular 
    <script src="<?php echo base_url() ?>bower_components/angular/angular.min.js"></script> -->
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>bower_components/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>bower_components/Chart/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url() ?>bower_components/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url() ?>bower_components/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>bower_components/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url() ?>bower_components/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url() ?>bower_components/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>bower_components/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>bower_components/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>bower_components/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>bower_components/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url() ?>prod/flot/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url() ?>prod/flot/date.js"></script>
    <script src="<?php echo base_url() ?>prod/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url() ?>prod/flot/curvedLines.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url() ?>bower_components/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url() ?>bower_components/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url() ?>bower_components/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url() ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/pdfmake/build/vfs_fonts.js"></script>
    <!-- X-editable -->
    <script src="<?php echo base_url() ?>bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>prod/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>prod/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>custom/js/custom.min.js"></script>

    <!-- Custom Angular Scripts -->
    <script src="<?php echo base_url() ?>application/views/admin/angular/app.js"></script>
    <!-- Tooltipster -->
    <script src="<?php echo base_url() ?>bower_components/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
    <!-- Flot -->
    <script>
      /*$(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      }); */
    </script>
    <!-- /Flot -->

    <!-- JQVMap -->
    <script>
        /*
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
        });
      }); */
    </script>
    <!-- /JQVMap -->

    <!-- Skycons -->
    <script>
        /*
      $(document).ready(function() {
        var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      }); */
    </script>
    <!-- /Skycons -->

    <!-- Doughnut Chart -->
    <script>
    var canvas = document.getElementById("canvas1");
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        if(canvas != null) {
            new Chart(document.getElementById("canvas1"), {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: {
              labels: [
                "Chrome",
                "Firefox",
                "Android",
                "IOS",
                "Other"
              ],
              datasets: [{
                data: [
                        <?php echo $this->AdminModel->getUserAgent('Chrome') ?>, 
                        <?php echo $this->AdminModel->getUserAgent('Firefox') ?>, 
                        <?php echo $this->AdminModel->getUserAgent('Android') ?>, 
                        <?php echo $this->AdminModel->getUserAgent('IOS') ?>,
                        <?php echo $this->AdminModel->getUserAgent('Others') ?> ],

                backgroundColor: [
                  "#3498DB",
                  "#26B99A",
                  "#9B59B6",
                  "#BDC3C7",
                  "#E74C3C"
                ],
                hoverBackgroundColor: [
                  "#49A9EA",
                  "#36CAAB",
                  "#B370CF",
                  "#CFD4D8",
                  "#E95E4F"
                ]
              }]
            },
            options: options
          });
        }

        
      });
    </script>
    <!-- /Doughnut Chart -->
    
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <script>
            /*
      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };
      var target = document.getElementById('foo'),
          gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
      */
    </script>
    <!-- /gauge.js -->

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    <script type="text/javascript">
      $(document).ready(function(){
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

        $('.tooltip-image').tooltipster({
              content: $('#tooltip_content_for_image'),
              contentCloning: true,
              side : ['right','top'],
              theme: 'tooltipster-punk'
            });
      });
    </script>

    <script>
      
     function initMap() {
        var marker, i;
        var locations = <?php echo $this->AdminModel->getUserLocations(); ?>;
        var uluru = {lat: 26.8851413, lng: 75.650127};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });

        for (i = 0; i < locations.length; i++) {
          console.log(locations[i]['latitude'], locations[i]['longitude']);
          new google.maps.Marker({
              position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
              map: map,
              icon: "<?php echo IMAGE_PATH."onlineUser.png" ?>"
            });
        }

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(uluru);
        });

        setTimeout(initMap, 25000);
      }

      


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAATWOWpZOm_MkJ_M0XXc3AiglkD-zxnKE&callback=initMap">
    </script>

  </body>
</html>
