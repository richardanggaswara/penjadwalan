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
		<label class="control-label" for="idRuang" style="font-size:18px;"><b>Nama Ruang</b></label>
  <div class="controls">
			<input type="text" name="idRuang" value="<?php echo (!empty($idRuang))? $idRuang : '';?>" />
		</div>
	</div>	
	<div class="control-group">
  <label class="control-label" for="TipeRuang" style="font-size:18px;"><b>Jenis Ruangan</b></label>
  <div class="controls">
    <select id="TipeRuang" name="TipeRuang">
		<option>Kelas</option>
		<option>Aula</option>
		<option>Gudang</option>
		<option>Ruang Staff</option>
	</select>
    <p class="help-block">Masukkan jenis ruang </p>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="KapasitasRuang" style="font-size:18px;"><b>Kapasitas Ruangan</b></label>
  <div class="controls">
    <input id="KapasitasRuang" name="KapasitasRuang" value="<?php echo (!empty($KapasitasRuang))? $KapasitasRuang : '';?>"/>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="guru_id" style="font-size:18px;"><b>Wali Kelas</b></label>
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
  <label class="control-label" for="DeskripsiRuang" style="font-size:18px;"><b>Letak Ruangan</b></label>
  <div class="controls">
    <select id="DeskripsiRuang" name="DeskripsiRuang" value="<?php echo (!empty($DeskripsiRuang))? $DeskripsiRuang : '';?>">
	<option>Lantai 1</option>
	<option>Lantai 2</option>
	<option>Lantai 3</option></select>
    <p class="help-block">Letak ruangan</p>
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

