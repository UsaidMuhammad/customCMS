<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1>This is a dashboard</h1>
        <h3>Hello <?php echo $username?></h3>

        <a href="<?php echo base_url("admin/logout/");?>">logout</a>
        <br>
        <a href="<?php echo base_url("addpage/");?>">Add Page</a>
        <br>
        <a href="<?php echo base_url("addpage/listpage");?>">list Page</a>
        <br>
        <a href="<?php echo base_url("menus/");?>">Super Menus</a>
        <br>
        <a href="<?php echo base_url("submenus/");?>">Sub Menus</a>
    </body>
</html>