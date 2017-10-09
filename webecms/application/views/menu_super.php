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
        <style type="text/css">
            body{
                margin: auto;
            }
        
        </style>
    </head>
    <body>

        <h1>Main Menu Super</h1>

        <?php 
        $this->load->helpers("form");

        echo form_open_multipart("menus/supermenu");
        
        ?>

            <label for="menu_super">Menu:</label>
            <input type="text" name="super" id="" required>

            <br>

            <label for="link">link:</label>
            <input type="text" name="link" id="">

            <br>

            <input type="submit" name="submit" value="Add menu">

        </form>


        <?php 
                
                    $query = $this->db->get("menu_super");
                    $a = 1;
                    foreach ($query->result_array() as $row)
                    {
                        echo form_open_multipart('menus/editmenusuper');
                        echo $a.". ";

                        echo form_hidden('id', $row["id"]);

                        echo '
                            <label for="menu_super">Menu:</label>
                            <input type="text" name="super" id="" value="'. $row["menu"].'">';

                        echo '
                            <label for="link">link:</label>
                            <input type="text" name="link" id="" value="'. $row["link"].'">';
    
                        echo '<input type="submit" name="submit" value="Edit Menu">';

                        echo '<input type="submit" name="submit" value="Delete Menu">';

                        echo form_close();
                        $a++;
                    }
                    
            ?>


    
    </body>
</html>