<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $name ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <meta name="description" content="<?php echo $description ?>">
        <meta name="keywords" content="<?php echo $tags?>">
    </head>
    <body>
        <?php echo $data ?>
    </body>
</html>