<table id="table" style="display:none"></table>
<script type="text/javascript" language="javascript">
 $('#table').flexigrid ({
  url: '<?php echo $url_json?>',      
  dataType: 'json', 
  colModel : [
   {display: 'NIK',   name : 'guru_nik',  width : 100,  sortable : false, align: 'left'},
   {display: 'Nama Guru',  name : 'guru_nama',  width : 200,  sortable : false, align: 'left'},
    {display: 'Kode Ajar',   name : 'ajar_id',  width : 100,  sortable : false, align: 'left'},
   {display: 'Nama Ruang',  name : 'NamaRuang',  width : 200,  sortable : false, align: 'left'},
    {display: 'Kuota Ajar',   name : 'kapasitas',  width : 100,  sortable : false, align: 'left'},
  ],
  buttons : [     
   {name: 'Delete', bclass: 'delete', onpress : action},
   {separator: true}
  ],
  searchitems : [ 
    {display: 'Nama Wali Kelas',   name : 'guru_nama', isdefault: false},
  ],
  sortname: 'jadwal_id', 
  sortorder: 'asc',
  usepager: true,
  resizable: false,
  useRp: true,
  rp: 30,
  width: 1000,
  height: 300
 });
  
   
 function action(com,grid) {
  if (com == 'Add') {   
   forms('add', '');
  } else if (com == 'Edit') {
   if ($('.trSelected',grid).length == 1) { 
    $('.trSelected',grid).each(function() {
     var id = $(this).attr('id');
     id = id.substring(id.lastIndexOf('row')+3);      
     forms('edit', id);
    });    
   } else {
    alert('Silahkan pilih salah satu baris yang ingin di edit');
    return false;
   }
  } else if (com == 'Delete') {
   if ($('.trSelected',grid).length == 1) {
    $('.trSelected',grid).each(function() {
     var id   = $(this).attr('id');
     id = id.substring(id.lastIndexOf('row')+3);
     if(confirm('Apakah anda yakin akan menghapus ruang dengan nama : '+id+' ?')) {
      $.ajax({
       type: 'get',
       url:'<?php echo $url_form?>/delete/'+id,         
       success: function() { $('#table').flexReload(); }
      });
     }
    });
   } else {
    alert('Silahkan pilih salah satu baris yang ingin di delete');
    return false;
   }
  }
 }
   
 function forms(clas, id){ 
  if(id != ''){ 
   id = '/' + id; 
  }else { 
   id = ''; 
  }
  $('.'+clas).colorbox({
   href  : '<?php echo $url_form?>/'+clas+id,  
   innerWidth : 600, 
   innerHeight : 800,
   iframe  : true,
   overlayClose: false,
   title  : '<font color="#45678D"><b><?php echo $title_form?></b></font>',
   onLoad  : function() { $('#cboxClose').remove(); }
  });
 }
</script>