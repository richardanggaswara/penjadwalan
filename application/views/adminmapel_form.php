<form id="form" name="form" action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
	<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/api/colorbox/colorbox.css" />
	 <script type="text/javascript">
	  $(document).ready(function() {
	   $("#cancel").click(function() {
		parent.$.fn.colorbox.close();
	   });
	  });
	 </script>   
	<div class="control-group">
		<label class="control-label" for="kode_mapel"><b>Kode Mata Pelajaran</b></label>
		<div class="controls">
			<input type="text" name="kode_mapel" value="<?php echo (!empty($kode_mapel))? $kode_mapel : '';?>" />
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="mapel"><b>Mata Pelajaran</b></label>
		<div class="controls">
			<input type="text" name="mapel" value="<?php echo (!empty($mapel))? $mapel : '';?>" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" value="Submit" class="btn btn-success">&nbsp;<input type="button" value="Cancel" class="btn btn-danger" name="cancel" id="cancel">
		</div>
	</div>
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="<?php echo base_url();?>assets/api/colorbox/jquery.colorbox.js"></script>
</form>

