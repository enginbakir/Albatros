<?php 
session_start(); ?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Personel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Import google fonts - Heading first/ text second -->
  <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="../dist/css/main.css">
  <link rel="stylesheet" href="../dist/css/plugins.css">
  <link rel="stylesheet" href="../dist/css/custom.css">
  <link rel="stylesheet" href="../dist/css/bootstrap.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/myCss.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Calendar:)) -->
    <link rel="stylesheet" href="../bower_components\fullcalendar\dist\fullcalendar.min.css">
    <link rel="stylesheet" href="../bower_components\fullcalendar\dist\fullcalendar.css">
    <link rel="stylesheet" href="../bower_components\fullcalendar\dist\fullcalendar.print.min.css" media="print">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script>
  $( function() {
    $( "#kayıtTarihi" ).datepicker();
  } );
</script>

<style>
.error {color: #FF0000; font-weight:bold;}
.bigfont {font-size: 20px;}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php require_once 'header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php require_once 'sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 style="color:#000">
          Yeni Personel Ekle
          <small>...........</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
          <li><a href="#">Personel</a></li>
          <li class="active">Ekle</li>
        </ol>
      </section>

      <!-- Main content class="col-md-3" style="font-size: 5px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"-->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- FORM -->
            <form id="addPersonelForm" action="addNewPersonel.php" method="post" enctype="multipart/form-data">
              <!-- FORM -->
              <div class="contentwrapper">
                <!--Content wrapper-->
                <div class="col-lg-16 ">
                 <div class="panel panel-default  toggle panelMove panelRefresh" id="supr0">
                  <!-- Start .panel -->
                  <div class="panel-heading">
                    <h4 class="panel-title">Personel Bilgileri</h4>
                    <span class="error bigfont">
                      <?php if(isset($_SESSION["connection"]))
                      echo "Veritabanı Bağlantı Hatası";
                      echo $_SESSION["errorMessage"];
                      ?>
                    </span>
                  </div>

                  <div class="panel-body pt0 pb0">

                    <div class="form-horizontal group-border stripped">

                     <!-- Start .form-group 2 -->
                     <div class="form-group">

                      <div class="row">

                        <label class="col-md-2 control-label"><i class="renk">&nbsp;</i>Adı:</label>

                        <div class="col-md-3">
                          <input name="personelName" type="text" maxlength="64" id="" class="form-control" placeholder="Personel Adı">
                          <span class="error">* <?php echo $_SESSION["nameErr"];?></span>
                        </div>

                        <label class="col-md-2 control-label"><i class="renk">&nbsp;</i>Soyadı:</label>
                        <div class="col-md-3">
                          <input name="personelSurname" type="text" maxlength="64" id="" class="form-control" placeholder="Personel Soyadı">
                          <span class="error">* <?php echo $_SESSION["surNameErr"];?></span>
                        </div>

                      </div>
                    </div>
                    <!-- End .form-group 2 -->

                    <!-- Start .form-group 3 -->
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-2 control-label">Cinsiyet:</label>
                        <div class="col-md-3">
                         <div class="fancy-select">
                          <select name="personelGender" id="Cinsiyet" class="fancy-select form-control fancified" >
                            <option value="Erkek">Erkek</option>
                            <option value="Kız">Kız</option> 
                          </select>
                        </div> 
                      </div>

                      <label class="col-md-2 control-label">T.C. No:</label>
                      <div class="col-md-3">

                        <input name="personelTCNumber" type="text" maxlength="11" id="personelTCNumber" class="form-control" placeholder="T.C. Kimlik No">
                        <span class="error"><?php echo $_SESSION["TCNumberErr"];?></span>
                      </div>   
                    </div>                       
                  </div>


                  <!-- Start .form-group 4 -->
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2 control-label" for=""><i class="renk">&nbsp;</i>Ünvanı:</label>
                      <div class="col-md-3">
                        <div class="fancy-select">
                          <select name="personelUnvan" id="unvan" class="fancy-select form-control fancified" >
                            <option selected="selected" value="">Ünvan Seçiniz</option>
                            <option value="OKUL MÜDÜRÜ">OKUL MÜDÜRÜ</option>
                            <option value="MÜDÜR YARDIMCISI">MÜDÜR YARDIMCISI</option>
                            <option value="SINIF ÖĞRETMENİ">SINIF ÖĞRETMENİ</option>
                            <option value="REHBER ÖĞRETMENİ">REHBER ÖĞRETMENİ</option>
                            <option value="ÖZEL EĞİTİM ÖĞRETMENİ">ÖZEL EĞİTİM ÖĞRETMENİ</option>
                            <option value="TÜRKÇE ÖĞRETMENİ">TÜRKÇE ÖĞRETMENİ</option>
                            <option value="MATEMATİK ÖĞRETMENİ">MATEMATİK ÖĞRETMENİ</option>
                            <option value="FEN BİLİMLERİ ÖĞRETMENİ">FEN BİLİMLERİ ÖĞRETMENİ</option>
                            <option value="SOSYAL BİLGİLER ÖĞRETMENİ">SOSYAL BİLGİLER ÖĞRETMENİ</option>
                            <option value="MÜZİK ÖĞRETMENİ">MÜZİK ÖĞRETMENİ</option>
                            <option value="DİĞER">DİĞER</option>
                          </select>
                        </div>
                        <span class="error">*<?php echo $_SESSION["TCNumberErr"];?></span>
                      </div>

                      <label class="col-md-2 control-label">Telefon:</label>
                      <div class="col-md-3">
                        <input name="personelTelefon" type="text" maxlength="16" id="personelTelefon" class="form-control" placeholder="Telefon">
                        <span id="ContentPlaceHolder1_RegularExpressionValidator2" style="color:Red;font-weight:bold;visibility:hidden;">Lütfen Geçerli Bir Numara Giriniz</span>
                      </div>
                    </div>
                  </div>

                  <!-- Start .form-group 5 -->

                  <div class="form-group">
                    <label class="col-md-2 control-label" for="">Fotoğraf Seç:</label>
                    <div class="col-md-3">
                      <span class="error">
                        <?php 
                        for($temp; $temp < 5;$temp++){
                          if(!empty($_SESSION["fileErrors"][$temp]))
                            echo $_SESSION["fileErrors"][$temp]." "; 
                        }
                        ?>
                      </span>
                      <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-default btn-file">
                    </div>
                    <label class="col-md-2 control-label" for="">Email Adresi:</label>
                    <div class="col-md-3">
                      <input name="personelEmailAdresi" type="text" maxlength="255" id="personelEmailAdresi" class="form-control" placeholder="Email Adresi">
                    </div>
                  </div>

                  <div class="form-group">
                   <div class="row">
                    <label class="col-md-2 control-label" for="">Kayıt Tarihi:</label>
                    <div class="col-md-3">
                      <div class=" input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input name="personelKayitTarihi" type="date"  value="<?php date_default_timezone_set("Europe/Istanbul");
                        echo date("Y-m-d"); ?>" maxlength="10" id="kayitTarihi" class="form-control" readonly placeholder="gg.AA.yyyy">
                      </div>
                    </div>
                    <label class="col-md-2 control-label" for="">Ayrılış Tarihi:</label>
                    <div class="col-md-3">
                     <div class=" input-group">
                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       <input name="personelAyrilisTarihi" type="date" id="ayrilisTarihi" class="form-control" placeholder="gg.AA.yyyy">
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="form-group">
              <div class="row">
                <div class="col-md-6">  
                  <input type="submit" id="sub" value="Kaydet" class="btn btn-success">  
                </div>
              </div>
            </div> 
          </div>
          <i class="error">* ile işaretli alanların doldurulması zorunludur!</i>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
</section>

</div>
<?php include 'footer.php'; ?>
</div>

  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Calendar :)) -->
  <script src="../bower_components\fullcalendar\dist\fullcalendar.min.js"></script>
  <script src="../bower_components\fullcalendar\dist\fullcalendar.js"></script>
  <script src="../bower_components\moment\moment.js"></script>
  <!-- Morris.js charts -->
  <script src="../bower_components/raphael/raphael.min.js"></script>
  <script src="../bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../bower_components/moment/min/moment.min.js"></script>
  <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
      {
        title          : 'All Day Event',
        start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
        ],
        editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>

<?php session_unset(); ?>
</body>
</html>
