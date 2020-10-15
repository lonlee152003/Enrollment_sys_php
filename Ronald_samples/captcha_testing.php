<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <center>
        <h2>sample captcha</h2>
        <br>
        <br>
        <br>
        <br>
        <form method="POST" autocomplete="off">
            <img src="../inc_php/create_captcha.php">
            <br>
            <input type="text" id="captcha_id_1" name="captcha_1" placeholder="Enter captcha code">
            <p id="output"></p>
            <br>
            <br>
            <input type="submit" value="submit form" name="subs">
        </form>
        
        <?php
        include '../inc_php/get_result_captcha.php';
        $newCap = new get_result_captcha();
        
        if( isset( $_POST['subs'] ) )
        {            
            $newCap_1 = $newCap->get_captcha_result($_POST['captcha_1']);
            
            if ( $newCap_1 == "ON" )
            {
                ?>
                <script>
                document.getElementById('output').innerHTML = "correct captcha";
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                document.getElementById('output').innerHTML = "incorrect captcha";
                </script>
                <?php
            }
        }
        ?>
    </center>
    </body>
</html>
