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
		<label class="control-label" for="hari"><b>Hari</b></label>
		<div class="controls">
			<select type="text" name="hari" value="<?php echo (!empty($hari))? $hari : '';?>" >
				<option>Senin</option>
				<option>Selasa</option>
				<option>Rabu</option>
				<option>Kamis</option>
				<option>Jumat</option>
				<option>Sabtu</option>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="jam"><b>Jam Ke</b></label>
		<div class="controls">
			<select type="text" name="jam" value="<?php echo (!empty($jam))? $jam : '';?>">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="ajar_id"><b>Kode Guru Mengajar</b></label>
		<div class="controls">
			    <?php $no_ajar=$this->db->select('no_ajar');
		$this->db->select('ajar_id');
		$ajar_table = $this->db->get('ajar_table');
		foreach($ajar_table->result() as $row){
		$reject2[$row->no_ajar] = $row->ajar_id;}
		$choose2 = array($no_ajar);
		echo form_dropdown('no_ajar',$reject2,$choose2);?>
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="idRuang"><b>Ruang Kelas</b></label>
		<div class="controls">
		     <?php $no=$this->db->select('no');
		$this->db->select('idRuang');
		$ruang = $this->db->get('ruang');
		foreach($ruang->result() as $row){
		$reject[$row->no] = $row->idRuang;}
		$choose = array($no);
		echo form_dropdown('no',$reject,$choose);?>
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

