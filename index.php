
<?php
session_start();
if($_SESSION['access_type'] == "admin"){ 

    header("location: Admin/admin.php");
}
else if ($_SESSION['access_type'] == "personel"){ 

    header("location: Admin/admin.php");
}
else if ($_SESSION['access_type'] == "parent"){ 

    header("location: Admin/admin.php");
}
else{ ?>
    <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="Login/login.css">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        </head>
        <body>

<form action="Login/connection.php" method="Post">
    <div class="container">
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin">
            <div class="card card-container">
                <table> 
                    <tr> 
                        <td><a ....><img class="profile-img-card" src="Login/parents.jpg" alt="" /></a></td> 
                        <td><a ....><img class="profile-img-card" src="Login/admin.jpg" alt="" /></a></td> 
                        <td><a ....><img class="profile-img-card" src="Login/personel.jpg" alt="" /></a></td> 
                    </tr> 
                    <tr> 
                        <td><div>
                            <span>PARENT</span>
                            <input type="radio" id="inputparent" class="form-control" name="user_type" value="parent">
                        </div></td> 
                        <td><div>
                            <span>  ADMIN</span>
                            <input type="radio" id="inputadmin" class="form-control" name="user_type" value="admin">
                        </div></td> 
                        <td><div>
                            <span>PERSONEL</span>
                            <input type="radio" id="inputpersonel" class="form-control" name="user_type" value="personel">
                        </div></td> 
                    </tr>
                </table>
                <span id="reauth-username" class="reauth-username"></span>
                <input name="username" type="text" id="inputusername" class="form-control" placeholder="username" required autofocus>
                <input name="password" type="password" id="inputpassword" class="form-control" placeholder="password" required>
                <div id="remember" class="checkbox">
                    <!-- <label>
                        <input name="remember_me" type="checkbox" value="remember_me"> Remember me
                    </label> -->
                </div>
                <span ><?php echo $_SESSION['login_error']; ?></span>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>

            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div>
    </form>

</body>
</html>

<?php 
session_unset('login_error');
    }
?>

