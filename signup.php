<?php 
session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Enrollment system</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/welcome_main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
                <?php
                require __DIR__ . '/inc_php/query_lib_php.php';
                ?>                
	</head>

	<body class="index is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
                                    <h2 id="logo" style="color: black;font-weight: bold"><a href="index.html">Enrollment system</a></h2>
                                    <nav id="nav">
                                        <ul>
                                            <li><a href="#" class="button primary"">Sign Up</a></li>
                                        </ul>
                                    </nav>
				</header>

			<!-- Banner -->
				<section id="banner">
                                    <form action="index.php" method="POST">
					<div class="inner">
                                            <header>
                                            <h2>Sign up</h2>
                                            </header>
                                            <h3>user id number</h3><input type="text" name="user_name" placeholder="ID number" style="background-color: #ffffff; color: #1c2021"/>
                                            <br>
                                            <h3>first name</h3><input type="text" name="user_name" placeholder="ID number" style="background-color: #ffffff; color: #1c2021"/>
                                            <br>
                                            <h3>middle name</h3><input type="text" name="user_name" placeholder="ID number" style="background-color: #ffffff; color: #1c2021"/>
                                            <br>
                                            <h3>last name</h3><input type="text" name="user_name" placeholder="ID number" style="background-color: #ffffff; color: #1c2021"/>
                                            <br>
                                            <h3>password</h3><input type="text" name="user_name" placeholder="ID number" style="background-color: #ffffff; color: #1c2021"/>
                                            <br>
                                            <h3>confirm password</h3><input type="text" name="user_name" placeholder="ID number" style="background-color: #ffffff; color: #1c2021"/>
                                            <br>
                                            <h3>account type</h3><input type="text" name="user_name" placeholder="ID number" style="background-color: #ffffff; color: #1c2021"/>
                                            <br>
                                                <ul class="buttons">
                                                    <li><input id="signin_button_id" type="submit" value="Sign in" name="signin_button"/></li>
                                                </ul>
					</div>
                                    </form>
<!--*********************************************************************************************************-->
<?php
$get_error_msg = "OFF";
$var_id_number = "GUEST";
$var_password = "GUEST";
$var_var_id_number = 0;
$var_var_password = 0;
$var_var_status = 0;


if(isset($_POST['signin_button']))
{
    $var_id_number = $_POST['user_name'];
    $var_password = $_POST['password'];

    if(empty($var_id_number) || empty($var_password) )    
    {
        ?>
        <script>
        document.getElementById('err_txt').innerHTML = 'empty inputs';
        </script>
        <?php
    }
    else 
    {
        $app = new query_only_php();
        $get_error_msg = $app->query_only_php_login($var_id_number, $var_password);
        
        if( $get_error_msg == "OFF" )
        {
            ?>
            <script>
            document.getElementById('err_txt').innerHTML = 'invalid user/pass';
            </script>
            <?php
        }
        else
        {
            $user_details_1 = $app->query_only_php_user_details($_SESSION['id_number'], $_SESSION['password']);
            $var_var_status = $user_details_1->account_type;
            $var_var_id_number = $user_details_1->id_number;
            $var_var_password = $user_details_1->password;
            if( $get_error_msg == "ON" && $var_var_status == "admin" && $var_var_id_number == $var_id_number && $var_var_password == $var_password )
            {
                ?>    
                <script>
                document.getElementById('err_txt').innerHTML = 'admin account';
                </script>
                <?php
            }
            elseif( $get_error_msg == "ON" && $var_var_status == "cashier" && $var_var_id_number == $var_id_number && $var_var_password == $var_password )
            {
                ?>    
                <script>
                document.getElementById('err_txt').innerHTML = 'cashier account';
                </script>
                <?php
            }
            elseif( $get_error_msg == "ON" && $var_var_status == "teacher" && $var_var_id_number == $var_id_number && $var_var_password == $var_password )
            {
                ?>    
                <script>
                document.getElementById('err_txt').innerHTML = 'teacher account';
                </script>
                <?php
            }
            elseif( $get_error_msg == "ON" && $var_var_status == "student" && $var_var_id_number == $var_id_number && $var_var_password == $var_password )
            {
                ?>    
                <script>
                document.getElementById('err_txt').innerHTML = 'student account';
                </script>
                <?php
            }
            else
            {

            }
        }
    }
}
?>
<!--*********************************************************************************************************-->
                                </section>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
                        <script src="assets/js/welcome_main.js"></script>
                
	</body>
</html>