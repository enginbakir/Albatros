<?php 
session_start();

if($_SESSION['access_type'] == "admin"){
  require_once "../connectDB.php";
  ?>  

  <!DOCTYPE html>
  <html>
  <head> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Albatros</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../dist/css/main.css">
    <link rel="stylesheet" href="../dist/css/plugins.css">
    <link rel="stylesheet" href="../dist/css/custom.css">
    <link rel="stylesheet" href="../dist/css/bootstrap.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!--Kaba değerlendirme tablo animasyonu css i -->
    <link rel="stylesheet" href="../dist/css/accordion.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <!-- En son derlenmiş ve minimize edilmiş JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper START-->
    <div class="content-wrapper">

      <!-- Main content START-->
      <section class="content">
       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3> 

                  <?php
                  $sql = "SELECT COUNT(admin_PK) AS a_count FROM admin";
                  $statement=$conn->prepare($sql);
                  $statement->execute();
                  while($row=$statement->fetch()) {
                    echo $row['a_count'];
                  }
                  ?>

                </h3>
                <p style="font-size: 25px"><b>ADMİN</b></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fa fa-minus"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>
                  <?php
                  $sql = "SELECT COUNT(student_PK) AS s_count FROM student";
                  $statement=$conn->prepare($sql);
                  $statement->execute();
                  while($row=$statement->fetch()) {
                    echo $row['s_count'];
                  }
                  ?>
                </h3>
                <p style="font-size: 25px"><b>STUDENT</b></p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
              <a href="../Admin/ogrenci.php" class="small-box-footer">Daha fazla bilgi  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>
                  <?php
                  $sql = "SELECT COUNT(personel_PK) AS p_count FROM personel";
                  $statement=$conn->prepare($sql);
                  $statement->execute();
                  while($row=$statement->fetch()) {
                    echo $row['p_count'];
                  }
                  ?>
                </h3>
                <p style="font-size: 25px"><b>PERSONEL</b></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="../Admin/personel.php" class="small-box-footer">Daha fazla bilgi <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>
                  <?php
                  $sql_p = "SELECT COUNT(personel_PK) AS p_count FROM personel";
                  $statement=$conn->prepare($sql_p);
                  $statement->execute();
                  while($row=$statement->fetch()) {
                    $p_count = $row['p_count'];
                    $sql_s = "SELECT COUNT(student_PK) AS s_count FROM student";
                    $statement=$conn->prepare($sql_s);
                    $statement->execute();
                    while($row=$statement->fetch()) {
                     $s_count = $row['s_count'];
                     $sql_a = "SELECT COUNT(admin_PK) AS a_count FROM admin";
                     $statement=$conn->prepare($sql_a);
                     $statement->execute();
                     while($row=$statement->fetch()) {
                      $a_count = $row['a_count'];                      
                      $total= $s_count + $p_count + $a_count;
                      echo $total;
                    }

                  }
                }
                ?>
              </h3>
              <p style="font-size: 25px"><b>TOTAL MEMBERS</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a  class="small-box-footer"> <i class="fa fa-minus"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">


        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- box START-->
          <div class="box box-primary">

            <!-- box-header START-->
            <div class="box-header">
              <i class="ion ion-ios-folder"></i>

              <h3 class="box-title"><b>SİSTEM GİRİŞ-ÇIKIŞ KAYITLARI TABLOSU</b></h3>

            </div>
            <!-- box-header END-->

            <!-- box-body START-->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="scrollable">
                    <table id="example2" class="table table-bordered table-hover table-striped table-condens formatHTML5">
                      <thead>
                        <tr>
                          <th>Kullanıcı Türü</th>
                          <th>İsim</th>
                          <th>Soyisim</th>
                          <th>Giriş</th>
                          <th>Çıkış</th>                          
                        </tr>
                      </thead>
                      <tbody id="tbody">
                       <?php

                       try {
                        $query = $conn->query("SELECT * FROM admin_log L, admin_user U, admin A WHERE L.userAdmin_FK = U.userAdmin_PK AND U.admin_FK=A.admin_PK ORDER BY AdminLog_PK DESC LIMIT 3", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                          foreach ($query as $row) {
                            if($row['logout_time'] == "0000-00-00 00:00:00"){
                             echo "<tr >";
                             echo "<td class='kullanici_turu' bgcolor='#00f800'>Admin</td>";
                             echo "<td class='isim' bgcolor='#00f800'>" .$row['name']. "</td>";
                             echo "<td class='soyisim' bgcolor='#00f800'>" .$row['surname']. "</td>";
                             echo "<td class='giris' bgcolor='#00f800'>" .$row['login_time']. "</td>";
                             echo "<td class='cikis' bgcolor='#00f800'>" .$row['logout_time']. "</td>";
                             echo "</tr>";}
                             else{
                              echo "<tr>";
                              echo "<td class='kullanici_turu'>Admin</td>";
                              echo "<td class='isim'>" .$row['name']. "</td>";
                              echo "<td class='soyisim'>" .$row['surname']. "</td>";
                              echo "<td class='giris'>" .$row['login_time']. "</td>";
                              echo "<td class='cikis'>" .$row['logout_time']. "</td>";
                              echo "</tr>";
                            }
                          }

                        }

                        $q = $conn->query("SELECT * FROM personel_log L, personel_user U, personel P WHERE L.userPersonel_FK = U.userPersonel_PK AND U.personel_FK=P.personel_PK ORDER BY PersonelLog_PK DESC LIMIT 3" , PDO::FETCH_ASSOC);
                        if ( $q->rowCount() ){
                          foreach ($q as $row1) {
                            if($row1['logout_time'] == "0000-00-00 00:00:00"){
                             echo "<tr >";
                             echo "<td class='kullanici_turu' bgcolor='#00f800'>Personel</td>";
                             echo "<td class='isim' bgcolor='#00f800'>" .$row1['name']. "</td>";
                             echo "<td class='soyisim' bgcolor='#00f800'>" .$row1['surname']. "</td>";
                             echo "<td class='giris' bgcolor='#00f800'>" .$row1['login_time']. "</td>";
                             echo "<td class='cikis' bgcolor='#00f800'>" .$row1['logout_time']. "</td>";
                             echo "</tr>";}
                             else{
                              echo "<tr>";
                              echo "<td class='kullanici_turu'>Personel</td>";
                              echo "<td class='isim'>" .$row1['name']. "</td>";
                              echo "<td class='soyisim'>" .$row1['surname']. "</td>";
                              echo "<td class='giris'>" .$row1['login_time']. "</td>";
                              echo "<td class='cikis'>" .$row1['logout_time']. "</td>";
                              echo "</tr>";
                            }
                          }

                        }

                                 $q = $conn->query("SELECT * FROM parent_log L, parent_user U, parent P WHERE L.userParent_FK = U.userParent_PK AND U.parent_FK=P.parent_PK ORDER BY ParentLog_PK DESC LIMIT 3" , PDO::FETCH_ASSOC);
                        if ( $q->rowCount() ){
                          foreach ($q as $row1) {
                            if($row1['logout_time'] == "0000-00-00 00:00:00"){
                             echo "<tr >";
                             echo "<td class='kullanici_turu' bgcolor='#00f800'>Parent</td>";
                             echo "<td class='isim' bgcolor='#00f800'>" .$row1['name']. "</td>";
                             echo "<td class='soyisim' bgcolor='#00f800'>" .$row1['surname']. "</td>";
                             echo "<td class='giris' bgcolor='#00f800'>" .$row1['login_time']. "</td>";
                             echo "<td class='cikis' bgcolor='#00f800'>" .$row1['logout_time']. "</td>";
                             echo "</tr>";}
                             else{
                              echo "<tr>";
                              echo "<td class='kullanici_turu'>Parent</td>";
                              echo "<td class='isim'>" .$row1['name']. "</td>";
                              echo "<td class='soyisim'>" .$row1['surname']. "</td>";
                              echo "<td class='giris'>" .$row1['login_time']. "</td>";
                              echo "<td class='cikis'>" .$row1['logout_time']. "</td>";
                              echo "</tr>";
                            }
                          }

                        }


                      } catch (Exception $e) {
                        echo "Listeleme Hatası :".$e->getMessage();
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- box-body END-->

        </div>
        <!-- box START-->
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <?php   include("function.php"); ?>

      <section class="col-lg-4 connectedSortable">

       <!-- TO DO List -->
       <div class="box box-primary">
        <div class="box-header">
          <i class="ion ion-clipboard"></i>

          <h3 class="box-title">BİLDİRİMLER
            <?php
            $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
            if(count(fetchAll($query))>0){
              ?>
              <small class="label label-warning" style=" margin-left: 10px"><i class="fa fa-clock-o"></i> <?php echo count(fetchAll($query)); ?></small>
              <?php
            }
            ?>
          </h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
          <ul class="todo-list">
            <?php
            $query = "SELECT * from `notifications` order by `date` DESC";

            if(count(fetchAll($query))>0){

             foreach(fetchAll($query) as $i){
              ?>
              <li>
                <a id="info" style =" <?php 
                if($i['status']=='unread'){ 
                  echo "font-weight:bold;";
                }else{
                  echo "color: red;";
                } ?> " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i> <br/>
                <span class="text"> <i class="fa fa-address-book text-red"></i>  
                  <?php 
                  if($i['type']=='student'){
                    echo ucfirst($i['name'])." ".ucfirst($i['surname'])." adlı öğrenci ".ucfirst($i['message']).".";
                  }else if($i['type']=='personel'){
                    echo ucfirst($i['name'])." ".ucfirst($i['surname'])." adlı personel ".ucfirst($i['message']).".";
                  }

                  ?>
                </span>
              </a>
            </li>
            <!-- <div class="dropdown-divider"></div> href="view.php?id=<?php //echo $i['id'] ?>" -->
            <?php
                  } //for
                }else //if
                echo "No Records yet.";
                ?>

              </ul>


            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

          <!-- The Modal -->
          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Bildirim</h4>
              </div>
            </div>

            <div class="modal-body">
              <?php

              include("function.php");

              $id = $i['id'];

              $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
              performQuery($query);

              $query = "SELECT * from `notifications` where `id` = '$id';";
              if(count(fetchAll($query))>0){
                foreach(fetchAll($query) as $i){
                  if($i['type']=='student'){
                    echo ucfirst($i['name'])." ".ucfirst($i['surname'])." adlı öğrenci ".ucfirst($i['message']).".";
                  }else if($i['type']=='personel'){
                    echo ucfirst($i['name'])." ".ucfirst($i['surname'])." adlı personel ".ucfirst($i['message']).".";
                  }
                }
              }

              ?>
            </div>
          </div>

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">TAKVİM</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">


                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Login</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Personel</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Notlar</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Öğrenci</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>



        <!-- right col -->
      </div>
      <!-- /.row (main row) -->


    </section>
    <!-- Main content END-->


  </div>
  <!-- Content Wrapper END-->
</div>
<!-- wrapper -->
</body>

<!-- <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("info");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function {
 modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> -->
</html>


<?php 
}
else{
 header("location: ../index.php");
}

unset($_SESSION['successErr']);
$conn = null;
exit();
?>
