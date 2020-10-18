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
		<label class="control-label" for="guru_id"><b>Nama Guru</b></label>
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
		<label class="control-label" for="mapel_id"><b>Mata Pelajaran</b></label>
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
	<div class="control-group">
		<div class="controls">
			<input type="submit" value="Submit" class="btn btn-success">&nbsp;<input type="button" value="Cancel" class="btn btn-danger" name="cancel" id="cancel">
		</div>
	</div>
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="<?php echo base_url();?>assets/api/colorbox/jquery.colorbox.js"></script>
</form>

