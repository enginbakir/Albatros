 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../images/avatar5.png" class="img-circle" alt="User Image" style="max-width: 50px ">
      </div>
      <div class="pull-left info">
        <br/><p><?php 

        try{
          $query = $conn->query("SELECT name, surname FROM  parent WHERE parent_PK = $parentID", PDO::FETCH_ASSOC);

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
      <a href="ogrenci_bilgileri.php">
        <i class="fa fa-book"></i>
        <span style="font-size: 17px">Öğrenci Bilgileri</span>
      </a>
    </li>
    <li>
      <a href="veli_bilgileri.php">
        <i class="fa fa-book"></i>
        <span style="font-size: 17px">Veli Bilgileri</span>
      </a>
    </li>
    <li>
      <a href="notlar.php">
        <i class="fa fa-folder"></i>
        <span style="font-size: 17px">Notlar</span>
      </a>
    </li>
 

  </ul>
</section>
<!-- /.sidebar -->
</aside>