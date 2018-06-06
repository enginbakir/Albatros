<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
       <img src="../images/avatar2.png" class="img-circle" alt="User Image">
     </div>
     <div class="pull-left info">
      <br/><p><?php 

      session_start();
      try{
        require_once('../connectDB.php');
        $access_id = $_SESSION['access_id'];
        $query = $conn->query("SELECT A.name, A.surname FROM admin_user AU, admin A WHERE AU.userAdmin_PK = $access_id AND AU.admin_FK = A.admin_PK", PDO::FETCH_ASSOC);

        if ( $query->rowCount()) {
         foreach( $query as $row ){
          echo $row['name']." ".$row['surname'];
        }
      }
    }
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();

    }

    ?></p>
  </div>
</div>
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header"></li>
  <li>
    <a href="ogrenci.php">
      <i class="fa fa-book"></i>
      <span style="font-size: 17px">Öğrenci Bilgileri</span>
    </a>
  </li>
  <li>
    <a href="personel.php">
      <i class="fa fa-book"></i>
      <span style="font-size: 17px">Personel Bilgileri</span>
    </a>
  </li>
  <li>
    <li>
      <a href="calendar.php">
        <i class="fa fa-calendar"></i>
        <span style="font-size: 17px">Takvim</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>