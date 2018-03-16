<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
</body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!--
    you can substitue the span of reauth username for a input with the username and
    include the remember me checkbox
    -->
<form action="connection.php" method="POST">
    <div class="container">
            <p id="profile-name" class="profile-name-card"></p>
            
                <div class="card card-container">
            <table> 
            <tr> 
            <td><a ....><img class="profile-img-card" src="parents.jpg" alt="" /></a></td> 
            <td><a ....><img class="profile-img-card" src="admin.jpg" alt="" /></a></td> 
            <td><a ....><img class="profile-img-card" src="personel.jpg" alt="" /></a></td> 
            </tr> 
            <tr> 
            <td><div>
                <span>PARENT</span>
                <input type="radio" id="inputparent" class="form-control" name="user_type" <?php if (isset($user_type) && $user_type=="parent") echo "checked";?> value="parent">
            </div></td> 
            <td><div>
                <span>  ADMIN</span>
                <input type="radio" id="inputadmin" class="form-control" name="user_type" <?php if (isset($user_type) && $user_type=="admin") echo "checked";?> value="admin">
            </div></td> 
            <td><div>
                <span>PERSONEL</span>
                <input type="radio" id="inputpersonel" class="form-control" name="user_type" <?php if (isset($user_type) && $user_type=="personel") echo "checked";?> value="personel">
            </div></td> 
            </tr>
            </table>
                <span class="error"><?php echo $user_typeError;?></span>
                <span id="reauth-username" class="reauth-username"></span>
                <input name="username" type="text" id="inputusername" class="form-control" placeholder="username" required autofocus>
                <input name="password" type="text" id="inputPassword" class="form-control" placeholder="password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
