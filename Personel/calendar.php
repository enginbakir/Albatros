<?php
session_start();
require_once '../connectDB.php';

$access_id = $_SESSION['access_id'];
$personel_id =$_SESSION['personelPK'];
$sql = "SELECT id, title, start, end, color FROM events WHERE personel_FK = $personel_id ";

$req = $conn->prepare($sql);
$req->execute();

$events = $req->fetchAll();


$ogrenciler = '';

$query = "SELECT student_PK,name,surname FROM student WHERE personel_FK = $personel_id GROUP BY name ORDER BY student_PK";

$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
  $ogrenciler .= '<option value="'.$row["student_PK"].'-'.$row["name"].' '.$row["surname"].'">'.$row["student_PK"].'-'.$row["name"].' '.$row["surname"].'</option>';
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ALBATROS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
   <!-- Google Font -->
   <link rel="stylesheet"
   href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>
 <body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <?php require_once 'header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php require_once 'personelPageSidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">

              <!-- Page Content -->
              <div class="">

                <div class="row">
                  <div class="col-lg-12 text-center">
                    <div id="calendar" class="col-centered">
                    </div>
                  </div>
                </div>
                <!-- /.row -->

                <!-- Modal -->
                <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">

                      <!-- addEvent.php Post edilirken  -->

                      <form class="form-horizontal" method="POST" action="addEvent.php">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Ekle</h4>
                        </div>

                        <div class="modal-body">

                          <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Öğrenci: </label>
                            <div class="col-sm-10">
                              <?php echo '<input type="text" name="personel_id" id="personel_id" style="display: none;" value = '.$personel_id.'>';  ?>
                              <select name="title" class="form-control action" id="title">
                                <option disabled="disabled" selected="selected">Öğrencileri Seçiniz...</option>
                                <?php echo $ogrenciler; ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="color" class="col-sm-2 control-label">Renk: </label>
                            <div class="col-sm-10">
                              <select name="color" class="form-control" id="color">
                                <option value="">Seçiniz...</option>
                                <option style="color:#0071c5;" value="#0071c5">&#9724; Lacivert</option>
                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turkuaz</option>
                                <option style="color:#008000;" value="#008000">&#9724; Yeşil</option>             
                                <option style="color:#FFD700;" value="#FFD700">&#9724; Sarı</option>
                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Turuncu</option>
                                <option style="color:#FF0000;" value="#FF0000">&#9724; Kırmızı</option>
                                <option style="color:#000;" value="#000">&#9724; Siyah</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="start" class="col-sm-3 control-label">Başlangıç Tarihi: </label>
                            <div class="col-sm-9">
                              <input type="text" name="start" class="form-control" id="start" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="end" class="col-sm-3 control-label">Bitiş Tarihi: </label>
                            <div class="col-sm-9">
                              <input type="text" name="end" class="form-control" id="end" readonly>
                            </div>
                          </div>

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                          <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>



                <!-- Modal -->
                <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form class="form-horizontal" method="POST" action="editEventTitle.php">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Güncelle</h4>
                        </div>
                        <div class="modal-body">

                          <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Öğrenci</label>
                            <div class="col-sm-10">
                              <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="color" class="col-sm-2 control-label">Renk: </label>
                            <div class="col-sm-10">
                              <select name="color" class="form-control" id="color">
                                <option value="">Seçiniz...</option>
                                <option style="color:#0071c5;" value="#0071c5">&#9724; Lacivert</option>
                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turkuaz</option>
                                <option style="color:#008000;" value="#008000">&#9724; Yeşil</option>             
                                <option style="color:#FFD700;" value="#FFD700">&#9724; Sarı</option>
                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Turuncu</option>
                                <option style="color:#FF0000;" value="#FF0000">&#9724; Kırmızı</option>
                                <option style="color:#000;" value="#000">&#9724; Siyah</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label class="text-danger"><input type="checkbox"  name="delete">Sil</label>
                              </div>
                            </div>
                          </div>

                          <input type="hidden" name="id" class="form-control" id="id">


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                          <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.container -->

            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="../bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
 <!-- Slimscroll -->
 <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="../bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="../dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../dist/js/demo.js"></script>
 <!-- fullCalendar -->
 <script src="../bower_components/moment/moment.js"></script>
 <script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
 <!-- Page specific script -->


 <script>

  $(document).ready(function() {

    var date = new Date();
    var d    = date.getDate();
    m    = date.getMonth();
    y    = date.getFullYear();

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
        // 'month,basicWeek,basicDay'
      },
      defaultDate: new Date(y, m, d),
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {

        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) { // etkinlik oluştur.
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #color').val(event.color);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // position değiştiğinde

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // Length değiştiğinde

        edit(event);

      },
      events: [
      <?php foreach($events as $event): 

      $start = explode(" ", $event['start']);
      $end = explode(" ", $event['end']);
      if($start[1] == '00:00:00'){
        $start = $start[0];
      }else{
        $start = $event['start'];
      }
      if($end[1] == '00:00:00'){
        $end = $end[0];
      }else{
        $end = $event['end'];
      }
      ?>
      {
        id: '<?php echo $event['id']; ?>',
        title: '<?php echo $event['title']; ?>',
        start: '<?php echo $start; ?>',
        end: '<?php echo $end; ?>',
        color: '<?php echo $event['color']; ?>',
      },
      <?php endforeach; ?>
      ]
    });

    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }

      id =  event.id;

      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;

      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
        if(rep == 'OK'){
          //alert('Kayıt edildi.');
        }else{
          //alert('Kaydedilemedi! , Lütfen tekrar deneyin.'); 
        }
      }
    });
    }

  });

</script>

</body>
</html>
