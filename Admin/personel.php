<?php 
session_start();
if($_SESSION['access_type'] == "admin"){ 
	require_once "../connectDB.php";

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Albatros | Admin - Personeller</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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


<style type="text/css">
.table-striped{ background-color: #dddddd;}
.scrollable{height: 400px; overflow: scroll;}
</style>

<style>
.error {color: #FF0000; font-weight:bold;}
.bigfont {font-size: 20px;}
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php require_once 'header.php'; 
		require_once 'sidebar.php'; ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1 style="color:#000">
					Personel Bilgileri
					<small>..........</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
					<li><a href="personel.php">Personeller</a></li>
					<li class="active">Data tables</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
					<div class="col-md-6">
						<!-- /.box -->
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Personel Veri Tablosu</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">

								<form class="form-inline" action="" style="padding-bottom: 10px">
									<div class="form-group">
										<label for="">Adı:</label>
										<input type="text" class="form-control" name="firstname" id="adi" placeholder="Personelin Adı" name="Personel adı">
									</div>
									<div class="form-group">
										<label for="">Soyadı:</label>
										<input type="text" class="form-control" name="surname" id="soyadi" placeholder="Personelin Soyadı" name="Personel Soyad">
									</div>
									<button type="submit" class="btn btn-primary">Listele</button>
								</form>
								<div class="row">
									<div class="col-md-12">
										<div class="scrollable">
											<table id="example2" class="table table-bordered table-hover table-striped table-condens formatHTML5">
												<thead>
													<tr>
														<th>ID</th>
														<th>İsim</th>
														<th>Soyisim</th>
														<th>Durum</th>
														<th>Ünvan</th>
														<th>Telefon</th>                              
													</tr>
												</thead>
												<tbody id="tbody">


													<?php 	

													$name;
													$surname;
													if(isset($_POST['firstname']) && !empty($_POST['firstname']))
														$name = $_POST['firstname'];
													if(isset($_POST['surname']) && !empty($_POST['surname']))
														$surname = $_POST['surname'];    

													if(isset($name) && isset($surname)){
														$sql = "SELECT * FROM personel where name='".$name."' and surname=' INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK".$surname."';";
													}
													if(isset($name) && !isset($surname)){
														$sql = "SELECT * FROM personel where name='".$name."' INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK;";
													}
													if(!isset($name) && isset($surname)){
														$sql = "SELECT * from personel where surname='".$surname."' INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK;";
													}
													if (!isset($name) && !isset($surname)) {
														$sql = "SELECT * from personel INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK;";
													}  

													unset($_POST['firstname']);
													unset($_POST['surname']);
													try{
														$retval = $conn->query($sql, PDO::FETCH_ASSOC);
														foreach ($retval as $row) {

															echo "<tr>";

															echo "<td class='id'>".$row['personel_PK']."</td>";
															echo "<td class='isim'>".$row['name']."</td>";
															echo "<td class='soyisim'>".$row['surname']."</td>";
															if($row['status'] == 1)
																echo "<td class='durum'>Kayıtlı</td>";
															else
																echo "<td class='durum'>Silindi</td>";
															echo "<td class='unvan'>".$row['personel_type']."</td>";
															echo "<td class='tel_no'>".$row['tel_no']."</td>";

															echo "</tr>";
														}
													}
													catch(Exception $e) { 
														echo "Listeleme Hatası :".$e->getMessage();
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div> 
								<div class="btn-group btn-group-justified" style="padding-bottom: 10px">
									<div class="btn-group">
										<a href="personel_ekle.php" class="btn btn-primary" role="button">&nbsp;&nbsp;Ekle&nbsp;&nbsp;</a>
									</div>
									<div class="btn-group">
										<button id="silButton" type="button" class="btn btn-primary">&nbsp;&nbsp;Sil&nbsp;&nbsp;</button>
									</div>
									<div class="btn-group">
										<button id="duzenle" type="button" class="btn btn-primary">&nbsp;&nbsp;Düzenle&nbsp;&nbsp;</button>
									</div>
								</div>             
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>

					<!--- START OF RIGHT PAGE ---->

					<div class="col-md-6">
						<!-- /.box -->
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Gülben Ergül - Bilgileri</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body" style="padding-right: 20px; padding-left: 20px;">
								<div class="row">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">Personel Bilgileri</a></li>
										<li><a data-toggle="tab" href="#menu2">Takvim</a></li>
										<li><a data-toggle="tab" href="#loginInfo">Giriş Bilgileri</a></li>
									</ul>

									<div class="tab-content">	
										<div id="home" class="tab-pane fade in active">
											<div class="box box-primary">
												<div class="box-body box-profile">
													<img class="profile-user-img img-responsive img-circle" src="../dist/img/avatar2.png" alt="User profile picture">

													<h3 class="profile-username text-center">Gülben Ergül</h3>
													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
															<b>TC</b> <a class="pull-right">20154895748</a>
														</li>
														<li class="list-group-item">
															<b>Adres</b> <a class="pull-right">Lorem ipsum dolor sit amet, consectetur.</a>
														</li>                  
														<li class="list-group-item">
															<b>Ünvan</b> <a class="pull-right">MATEMATİK ÖĞRETMENİ</a>
														</li>
														<li class="list-group-item">
															<b>Mail</b> <a class="pull-right">glb_ergül@yahoo.com</a>
														</li>
														<li class="list-group-item">
															<b>Kayıt Tarihi</b> <a class="pull-right">18.09.2017</a>
														</li>
														<li class="list-group-item">
															<b>Ayrılış Tarihi</b> <a class="pull-right">-</a>
														</li>													
													</ul>
												</div>
												<!-- /.box-body -->
											</div>
										</div>

										<div id="menu2" class="tab-pane fade">
											<div class="col-md-12">
												<div class="box box-primary">
													<div class="box-body no-padding">
														<!-- THE CALENDAR -->

														<div id="calendar" class="takvim calendar fc fc-unthemed fc-ltr"><input type="text" name="date" id="selectedDate" value="" style="display: none;"></div>
														<button id="showDate" type="button" class="btn btn-primary">&nbsp;&nbsp;Show Date&nbsp;&nbsp;</button>
														<div class="control-sidebar-bg"></div>
													</div>
												</div>
											</div>
										</div>
										<div id="loginInfo" class="tab-pane fade">
											<div class="col-md-12">
												<div class="box-body box-profile">
													<h3 class="profile-username text-center">Gülben Ergül</h3>
													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
															<input id="username" class="form-control" type="text" data-date-inline-picker="false" data-date-open-on-focus="false"  >
															
														</li>
														<li class="list-group-item">
															<input id="password" class="form-control" type="password" data-date-inline-picker="false" data-date-open-on-focus="false"  >
															
														</li>
													</ul>
													<input type="button" id="loginInfoChange" value="Değiştir">
													<span id="error"></span>
												</div>
												<!-- /.box-body -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>
		</div>
	</div>

	<!-- ./wrapper -->



	<div>
		<!-- Scripts Start-->
		
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

<script>

	var date;
	$("#calendar").on("click",function(){
		alert("alert");
	});

	$("#showDate").on("click",function(){
		date = $("#selectedDate").val();
		alert(date);
	});

</script>

<script type="text/javascript">
	var id = -1;
	var isim; 
	var soyisim;

	$("#tbody tr").click(function () {
		$('.selected').removeClass('selected');
		$(this).addClass("selected");
		id = $('.id',this).text();
		isim = $('.isim',this).text();
		soyisim = $('.soyisim',this).text();

		$.ajax({
			url:"getPersonelInfo.php",
			method:"POST",
			data :{id:id},
			success:function(data){
				document.getElementById("home").innerHTML = data;
			}
		});
	});
	$('#loginInfoChange').on("click",function(){
		var u = document.getElementById("username").value;
		var p = document.getElementById("password").value;
		if(id > 0){
			$.ajax({
				url:"changeLoginInfo.php",
				method:"POST",
				data :{id:id,u:u,p:p},
				success:function(data){
					alert(u);
					alert(p);
					document.getElementById("error").innerHTML = data;
				}
			});
		}
		else{
			alert("Personel Seçiniz");
		}
	});

	$('#duzenle').on("click",function(){
		if(id>0)
			window.location = "personel_duzenle.php?id="+id;
		else
			alert("Bir Personel Seçin");
	});



	$("#silButton").on("click",function(){

		if(id > 0){
			var answer = confirm("Kaydı Silmeyi Onaylıyor Musunuz ??");
			if(answer){
				$.ajax({
					type:"POST",
					url:"deletePersonel.php",
					data:{id:id,isim:isim},
					success:function(data){
						alert(data);
						location.reload();
					}
				});
			}
			else {
				return false;
			}
		}
		if(id < 0)
			alert("Bir Kayıt Seçin!!!");
	});

	


	$("#notlar").on("click",function(){

	})
</script>

</div>
</body>
</html>

<?php 
}
else{
	header("location: ../index.php");
}?>
