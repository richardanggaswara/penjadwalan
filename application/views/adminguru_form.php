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
		<label class="control-label" for="guru_nama"><b>Nama Guru</b></label>
		<div class="controls">
			<input type="text" name="guru_nama" value="<?php echo (!empty($guru_nama))? $guru_nama : '';?>" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="guru_alamat"><b>Alamat Guru</b></label>
		<div class="controls">
			<input type="text" name="guru_alamat" value="<?php echo (!empty($guru_alamat))? $guru_alamat : '';?>" />
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="guru_status"><b>Alamat Guru</b></label>
		<div class="controls">
			<select name="guru_status" value="<?php echo (!empty($guru_status))? $guru_status : '';?>">
			<option>Menikah</option>
			<option>Belum menikah</option>
		</select>
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="guru_nohp"><b>Kontak Guru</b></label>
		<div class="controls">
			<input type="text" name="guru_nohp" value="<?php echo (!empty($guru_nohp))? $guru_nohp : '';?>" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="guru_jabatan"><b>Jabatan Guru</b></label>
		<div class="controls">
			<select name="guru_jabatan" value="<?php echo (!empty($guru_jabatan))? $guru_jabatan : '';?>">
			<option>Pengajar Tetap</option>
			<option>Pengajar Bantuan</option>
		</select>
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

