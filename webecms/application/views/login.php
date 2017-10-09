<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        

    <h2>log in to your dashboard</h2>

    <h3><?php 
        if (isset($error)) {
            echo $error;
        }
    ?></h3>
    
    <?php

        $this->load->helper('form');
        
        echo form_open_multipart("admin/login");
    ?>

    

    <label for="username">username:</label>
    <input type="text" name="username">
    <br>
    <label for="password">password:</label>
    <input type="password" name="password">

    <br>

    <input type="submit" name="submit" value="submit">

    <?php echo form_close(); ?>
    
    </body>
</html>