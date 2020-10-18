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
	  $(document).ready(function() {
	   $("#cancel").click(function() {
		parent.$.fn.colorbox.close();
	   });
	  });
	 </script>   
   <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
   <div  class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			<a class="brand" href="<?php echo site_url();?>/adminis/logout"><span>Penjadwalan</span></a>
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url();?>/adminis/logout">Logout</a></li>
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
						<li><a class="ajax-link" href="<?php echo site_url();?>/adminslot"><i class="icon-minus"></i><span class="hidden-tablet"> Pembagian Slot Manual</span></a></li>		
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
						<a href="#">Data Deskripsi Jadwal</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Input/Delete</a>
					</li>
				</ul>
			</div><?php $this->load->view('admin_view');?>		

			<div style="padding-top:20px;">

						<?php echo validation_errors('<p class="error" style="font-size:16px;color:red">'); ?>
							<?php echo form_open('adminis/insert'); ?>
							<h2>Input Deskripsi Jadwal</h2>
<hr></hr>
<div class="control-group">
  <label class="control-label" for="guru_id" style="font-size:18px;"><b>Nama Guru</b></label>
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
 <hr></hr>
<div class="control-group">
  <label class="control-label" for="mapel_id" style="font-size:18px;"><b>Mata Pelajaran</b></label>
  <div class="controls">
	<?php $mapel_id=$this->db->select('mapel_id');
		$this->db->select('mapel');
		$mapel_table = $this->db->get('mapel_table');
		foreach($mapel_table->result() as $row){
		$reject2[$row->mapel_id] = $row->mapel;}
		$choose2 = array($mapel_id);
		echo form_dropdown('mapel_id',$reject2,$choose2);?>
   </div>
 </div>

<hr></hr>
<!-- Button -->
<div class="control-group">
  <label class="control-label" for=""></label>
  <div class="controls">
    <button id="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
  </div>
</div>
<?php echo form_close(); ?>
</div>
		</div>
				</div>
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>

		</footer>
		
	</div>
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
</body></html>