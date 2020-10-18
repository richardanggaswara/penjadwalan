<!DOCTYPE html>
<html lang="en">
<head>
  	<!--
		Copyright 2012 Muhammad Usman
		Copyright 2013 Reza Fajar
		Modified for personal use
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0
	-->
	<meta charset="utf-8">
	<title>Administrator Penjadwalan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/app.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url();?>assets/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>assets/css/uploadify.css' rel='stylesheet'>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
	<script>$('#dropdown-toggle').dropdown()</script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/api/jquery/jquery-1.3.2.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/api/themes/redmond/jquery.ui.all.css"/>
	<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/api/flexigrid/css/flexigrid.css">
	<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/api/colorbox/colorbox.css" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/api/flexigrid/js/flexigrid.js"></script>
	 <script type="text/javascript">
	 $(document).ready(function(){
				$(".inline").colorbox({width:"50%",height:"50%", inline:true, href:"#return_form"});
			});
	 </script>   
   <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
   <div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			<a class="brand" href="<?php echo site_url();?>/adminguru/logout"><span>Penjadwalan</span></a>
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url();?>/adminguru/logout">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="http://localhost/penjadwalan/">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Action</li>
							<li><a class="ajax-link" href="<?php echo site_url();?>/adminis"><i class="icon-minus"></i><span class="hidden-tablet"> Deskripsi Ajar</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url();?>/adminguru"><i class="icon-minus"></i><span class="hidden-tablet"> Data Guru & Staff</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url();?>/adminmapel"><i class="icon-minus"></i><span class="hidden-tablet"> Data Mata Pelajaran</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url();?>/adminjadwal"><i class="icon-minus"></i><span class="hidden-tablet"> Data Jadwal</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url();?>/adminajar"><i class="icon-minus"></i><span class="hidden-tablet"> Data Kuota Ajar</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url();?>/adminruang"><i class="icon-minus"></i><span class="hidden-tablet"> Data Ruang</span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url();?>/adminslot"><i class="icon-minus"></i><span class="hidden-tablet"> Pembagian Slot</span></a></li>		
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Pembagian Slot</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Booking/Edit/Unbook</a>
					</li>
				</ul>
			</div>
  <h2 >View Jadwal</h2>
	   <table style="border:1px solid #666666;">
	   <tr>
	   <td rowspan="2" style="border:1px solid #666666;background-color:lightblue;width:50px;text-align:center;">Hari</td>
	   <td rowspan="2" style="border:1px solid #666666;background-color:lightblue;width:150px;text-align:center;">Waktu</td>
	   <td style="border:1px solid #666666;background-color:lightblue;width:35px;text-align:center;">Jam</td>
	   <td colspan="8" style="border:1px solid #666666;background-color:lightblue;width:35px;text-align:center;">Kelas VII</td>
	   <td colspan="8" style="border:1px solid #666666;background-color:lightblue;width:35px;text-align:center;">Kelas VIII</td>
	   <td colspan="8" style="border:1px solid #666666;background-color:lightblue;width:35px;text-align:center;">Kelas IX</td>
	   </tr>
	   <tr><td style="border:1px solid #666666;background-color:lightblue;">Ke</td>
	   <?php 
	   		
	   if ($displaybyruang){
		   foreach($displaybyruang as $key => $displayruang){  
	  echo "<td style='border:1px solid #666666;background-color:lightblue;width:35px;text-align:center;'>", $displayruang['kelas'];
	 }
	  if ($displaybyhari){
	  foreach($displaybyhari as $key =>$displayhari){
	  echo "</td></tr><tr><td rowspan='10' style='border:1px solid #666666;background-color:lightblue;text-align:center;'>",$displayhari['hari_nama'];
	  
	  if ($displaybyjam){
foreach ($displaybyjam as $key => $displayjam){
		    $jam_ke = $displayjam['jam_ke'];		
		//	$user_id = $this->session->userdata('guru_id');
			$hari_id = $displayhari['hari_id'];
			$retrievewaktu = $this->Guru->retrievewaktu($jam_ke,$hari_id);
			echo "<tr><td style='border:1px solid #666666;background-color:white;text-align:center;'>", $retrievewaktu['waktu'];
			echo "</td><td style='border:1px solid #666666;background-color:white;text-align:center;'>", $retrievewaktu['jam_ke'];
			if ($displaybyruang){
		   foreach($displaybyruang as $key => $displayruang){
		   	$no = $displayruang['no'];
			$retrieveslot = $this->Guru->retrieveslotadmin($jam_ke,$no,$hari_id);
			$retrievematpel = $this->Guru->retrievematpel($jam_ke,$no,$hari_id);
			if($retrieveslot == "true"){
			echo "<td style='border:1px solid #666666;background-color:#FFCFD5;text-align:center;color: blue;'>",$retrievematpel;
		//	echo "<td style='border:1px solid #666666;background-color:#FFE87F;text-align:center;'>", anchor($this->lang->line('webshop_folder')."adminslot/unbook/".$displayjam['jam_ke']."/".$no."/".$displayhari['hari_id'],$retrievematpel);
			}else
			echo "<td style='border:1px solid #666666;background-color:#FFCFD5;text-align:center;color: green;'>NA";
			//echo "<td style='border:1px solid #666666;background-color:#FFCFD5;text-align:center;'>", anchor($this->lang->line('webshop_folder')."adminslot/booking/".$displayjam['jam_ke']."/".$no."/".$displayhari['hari_id'],'NA',array('class' => 'inline cboxElement'));	
			 
 
 echo "</td>";
			echo "</td>";
			}}}
			echo "</tr>";echo "</td></tr>";
	 
	
}}}}
 

 echo "</tr></table>";



 ?>
			
		</div>
				</div>
			
</div>	
<div class="modal hide fade" id="myModal">
<div id="return_form" name="return_form">
		<?php echo form_open('adminslot/booking'); ?>
		
<div class="control-group">
<label class="control-label" ><b>Guru Mengajar</b></label>
<div class="controls">
		<?php $guru_id=$this->db->select('guru_id');
		$this->db->select('guru_nama');
		$guru_table = $this->db->get('guru_table');
		foreach($guru_table->result() as $row){
		$reject[$row->guru_id] = $row->guru_nama;}
		$choose = array($guru_id);
		echo form_dropdown('guru_id',$reject,$choose);?>
</div>
</div>
<div class="control-group">
<label class="control-label" ><b>Jam Ke</b><?php echo $jam_data;?></label>
</div>
<div class="control-group">
<div class="controls">
<input type="submit" value="Submit" class="btn btn-success">
</div>
</div>
	<?php echo form_close(); ?>
</div>
		<hr>
		
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-transition.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-alert.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-modal.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-scrollspy.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-tab.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-tooltip.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-popover.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-button.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-collapse.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-carousel.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-tour.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
	<script src='<?php echo base_url();?>assets/js/fullcalendar.min.js'></script>
	<script src='<?php echo base_url();?>assets/js/jquery.dataTables.min.js'></script>
	<script src="<?php echo base_url();?>assets/js/excanvas.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.resize.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.chosen.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.uniform.min.js"></script>
	<script src="<?php echo base_url();?>assets/api/colorbox/jquery.colorbox.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.cleditor.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.noty.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.elfinder.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.raty.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.iphone.toggle.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.autogrow-textarea.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.uploadify-3.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.history.js"></script>
	<script src="<?php echo base_url();?>assets/js/app.js"></script>	
</body>		</html>