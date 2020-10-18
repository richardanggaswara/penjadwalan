<table id="table" style="display:none"></table>
<script type="text/javascript" language="javascript">
 $('#table').flexigrid ({
  url: '<?php echo $url_json?>',      
  dataType: 'json', 
  colModel : [
   {display: 'NIK',  name : 'guru_nik',  width : 150,  sortable : true,  align: 'left'},
   {display: 'Nama Guru',   name : 'guru_nama',   width : 100,  sortable : true,  align: 'left'},
   {display: 'Alamat Guru',   name : 'guru_alamat',  width : 60,  sortable : false, align: 'left'},
   {display: 'Status Guru',  name : 'guru_status',  width : 100,  sortable : false, align: 'left'},
   {display: 'Kontak Guru',  name : 'guru_nohp',  width : 100,  sortable : false, align: 'left'},
   {display: 'Jabatan Guru',  name : 'guru_jabatan',  width : 100,  sortable : false, align: 'left'},
   {display: 'Tugas Tambahan',  name : 'guru_jabatan_detail',  width : 150,  sortable : false, align: 'left'},
  ],
  buttons : [     
   {name: 'Delete', bclass: 'delete', onpress : action},
   {separator: true}
  ],
  searchitems : [    
   {display: 'ID', name : 'guru_nik', isdefault: false},
   {display: 'Nama Guru', name : 'guru_nama', isdefault: false},
  ],
  sortname: 'guru_id', 
  sortorder: 'asc',
  usepager: true,
  resizable: false,
  useRp: true,
  rp: 10,
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
     if(confirm('Apakah anda yakin akan menghapus data : '+id+' ?')) {
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