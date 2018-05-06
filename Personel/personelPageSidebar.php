<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/avatar3.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <br/><p><?php 
   
        try{
          $query = $bdd->query("SELECT P.name, P.surname FROM personel_user PU, personel P WHERE PU.userPersonel_PK = $access_id AND PU.personel_FK = P.personel_PK", PDO::FETCH_ASSOC);

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
        <a href="personel_main_page.php">
          <i class="fa fa-book"></i>
          <span style="font-size: 17px">Öğrenci Bilgileri</span>
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