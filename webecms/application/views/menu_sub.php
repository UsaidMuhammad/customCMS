<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Menu</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body>
		<h1>Sub Menu</h1>

		<?php 
        $this->load->helpers("form");

        echo form_open_multipart("submenus/submenu");
        
        ?>

		<label for="menu_super">Super Menu:</label>

		<select name="super">
			<option value="null">-Select Parent Menu-</option>
			<?php 
            
            $querysuper = $this->db->get("menu_super");
            $querysub = $this->db->get("menu_sub");

            foreach ($querysuper->result() as $row ) {
                echo '<option value="'.$row->id.'">'.$row->menu.'</option>';
            }

            ?>
		</select>

		<br>

		<label for="menu_sub">sub Menu:</label>
		<input type="text" name="sub" id="" required>

		<br>

		<label for="link">link:</label>
		<input type="text" name="link" id="">

		<br>

		<input type="submit" name="submit" value="Add menu">

		</form>


		<?php

        foreach ($querysuper->result() as $super ) {
            echo '<h3>'.$super->menu.'</h3>';
            $a = 0;
            $b = 1;
            foreach ($querysub->result() as $sub )
            {
                if ($super->id == $sub->super_id) {
                    echo form_open_multipart('submenus/editmenusub');

                    echo $b.". ";

                    echo form_hidden('id', $sub->id);

                    echo '
                            <label for="menu_super">Menu:</label>
                            <input type="text" name="sub" id="" value="'. $sub->sub.'">';

                    echo '
                            <label for="link">link:</label>
                            <input type="text" name="link" id="" value="'. $sub->link.'">';
    
                    echo '<input type="submit" name="submit" value="Edit Menu">';

                    echo '<input type="submit" name="submit" value="Delete Menu">';

                    echo form_close();
                    $b++;

                    
                    $a++;
                }
            }

            echo $a == 0  ? "no sub menu" : null ;
        }

        ?>
	</body>

	</html>
