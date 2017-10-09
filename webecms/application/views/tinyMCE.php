<!DOCTYPE html>
<html>
<head>
  <script src='<?php echo base_url() ?>assests/tinymce/js/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
</head>

<body>

    <h2>
    <?php 
        if (isset($error)) {
            echo $error;
        }
    ?>
    </h2>
    

    <?php
    
    $this->load->helper('form');

    //check to see if pagename is set
    //this page name gets triggered from listpage controller pagelisting view
    if (!isset($pagename)) {
        echo form_open_multipart("addpage/makepage");
    } else {
        echo form_open_multipart("addpage/editpage");
    }
    

    
    ?>

    <br>

    <input type="hidden" name="hidden" value="<?php echo isset($pagename) ? $pagename : null ?>">    
    <label for="Page name">Page name:</label>
    <input type="text" name="pagename" id="" value="<?php echo isset($pagename) ? $pagename : null ?>">

    <br>
        
    <label for="tags">Page tags</label>
    <input type="text" name="pagetags" id="" value="<?php echo isset($pagetags) ? $pagetags : null ?>">

    <br>
        
    <label for="description">Page description</label>
    <input type="text" name="description" id="" value="<?php echo isset($description) ? $description : null ?>">
    
    <br>

  <!--<form method="post">-->
    <textarea name="tinyMCE" id="mytextarea"><?php echo isset($tinyMCE) ? $tinyMCE : null ?></textarea>
  <!--</form>-->

    <input type="submit" name="submit" value="submit">
  <?php 
    echo form_close();
  ?>
</body>
</html>