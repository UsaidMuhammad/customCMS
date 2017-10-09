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
        th, td {
            border: 2px black solid;
            padding: 5px;
        }
        
        table {
            margin: auto;
        }
        
        </style>
    </head>
    <body>
    
    
        <table>
                <th>Name</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>

                <?php 
                
                    $query = $this->db->get("pages");
                
                    foreach ($query->result_array() as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['description']."</td>";
                        echo '<td><a href="'.base_url('addpage/makepage/'.$row['name']).'/" >edit</a> </td>';
                        echo '<td><a href="'.base_url('addpage/deletepage/'.$row['name']).'/" >delete</a> </td>';
                        echo "</tr>";
                    }
                    
                ?>
        </table>

    </body>
</html>