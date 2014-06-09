﻿<?php
	$tab0 = base_url().'admin';
	$tab1 = base_url().'index.php/admin/adminclinic';
	$tab2 = base_url().'index.php/admin/medicine';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Access the desktop camera and video using HTML, JavaScript, and Canvas.  The camera may be controlled using HTML5 and getUserMedia." />        <!--bootstrap-->
        <?php
        echo loadBootstrap3_css();
        ?>
        <!-- bootstrap widget theme -->
        <link rel="stylesheet" href="<?php echo base_url('/assets/systemfile/css/theme.bootstrap.css'); ?>" />
        <!--<link rel="stylesheet" href="<?php //echo base_url('/assets/systemfile/css/jquery.tablesorter.pager.css'); ?>" />-->
       
        <?php
        echo loadBootstrap3_js();
        ?>

<!-- plugin tablesorter -->
<script type="text/javascript" src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/js/jquery.tablesorter.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/js/jquery.tablesorter.widgets.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/js/jquery.tablesorter.custom.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('/assets/systemfile/css/style_menuclinic.css'); ?>" />
<!-- add on pager plugin tablesorter -->
<script type="text/javascript" src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/js/jquery.tablesorter.pager.js');?>"></script>
    </head>
    <body >
        <section>		
            <input type="radio" style="display:none;" id="profile" value="1" name="tractor" <?php if($tab == 0) echo "checked='checked'"; ?> />    
			<input type="radio" style="display:none;" id="settings" value="2" name="tractor"  <?php if($tab == 1) echo "checked='checked'"; ?> />
			<input type="radio" style="display:none;" id="books" value="3" name="tractor"  <?php if($tab == 2) echo "checked='checked'"; ?> />			
			<nav>   
				<label for="profile"  onclick="window.location.href=<?php echo '\''.$tab0.'\''; ?>" class='fontawesome-camera-retro'>QUẢN LÍ NGƯỜI DÙNG</label>
				<label for="settings" onclick="window.location.href=<?php echo '\''.$tab1.'\''; ?>" class='fontawesome-film'>QUẢN LÍ PHÒNG KHÁM</label>
				<label for="books" onclick="window.location.href=<?php echo '\''.$tab2.'\''; ?>" class='fontawesome-list-alt'>QUẢN LÍ THUỐC</label>

			</nav>
			<div class="row">
            <?php
            $this->load->view($module . '/' . $view_file);
            ?>
            </div>
            <div class="pager">
            <form>
              <img src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/icons/first.png');?>" class="first"/>
              <img src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/icons/prev.png');?>" class="prev"/>
              <input type="text" class="pagedisplay"/>
              <img src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/icons/next.png');?>" class="next"/>
              <img src="<?php echo base_url('/assets/systemfile/plugin/tablesorter/icons/last.png');?>" class="last"/>
              <select class="pagesize">
                <option selected="selected"  value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option  value="40">40</option>
              </select>
            </form>
          </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function() {
                 $("table").tablesorter().tablesorterPager({container: $(".pager")});    
            }); 
        
        </script>
    </body>
</html>
