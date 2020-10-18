<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMPN 2 Banyudono</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/color.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.colorbox-min.js"></script>
</head>

<body>
<div id="main_container">
	<div id="header">
    		<div id="logo" style="float:left;"><a href="home.html"><img src="<?php echo base_url();?>assets/images/download.jpg" alt="" title="" border="0"></a></div>
        <div style="font-size:30px;color:green;vertical-align:middle;padding:10px;">SMPN 2</div>
		<div style="font-size:30px;color:green;vertical-align:middle;">BANYUDONO</div>
        <div id="menu">
            <ul>                                        
               <li><a href="<?php echo base_url();?>" title="">home</a></li>
                <li><a class="current" href="<?php echo site_url();?>/clientservices" title="">berita</a></li>
				<li><a href="<?php echo site_url();?>/clientprivacy" title="">privasi</a></li>
                <li><a href="<?php echo site_url();?>/clientcontact" title="">kontak kami</a></li>
            </ul>
        </div>
        
    </div>
    
    <div class="green_box">
    	<div class="clock">
        <img src="<?php echo base_url();?>assets/images/clock.png" alt="" title="" />             
        </div>
        <div class="text_content">
        <h1>Waktu adalah uang</h1>
        <p class="green">
        "Orang yang berhasil memanfaatkan waktu dengan baik, maka mereka berarti memanfaatkan peluang sebaik-baiknya. Mengacu pada waktu yang terbatas, maka bila kita bisa benar-benar memanfaakan waktu untuk focus terhadap suatu usaha maka hasilnya akan cepat muncul, sebaliknya bila seseorang selalu mengulur waktu untuk suatu usaha yang sama maka hasilnya pun akan lama didapatkannya." 
        </p>
        </div>
        
        <div id="right_nav">
            <ul>                                        
      <li><a href="<?php echo site_url();?>/clientclass1" title="">Penjadwalan Kelas VII</a></li>
                <li><a href="<?php echo site_url();?>/clientclass2" title="">Penjadwalan Kelas VIII</a></li>
                <li><a href="<?php echo site_url();?>/clientclass3" title="">Penjadwalan Kelas IX</a></li>
                <li><a href="<?php echo site_url();?>/gurulogin" title="">Penjadwalan Guru</a></li>
                <li><a href="contact.html" title="">Penjadwalan Ekstrakurikuler</a></li>
            </ul>
        </div>       
        
    
    </div><!--end of green box-->
    
    <div id="main_content">
    	<div id="wide_content">
        <h2>Jadwal Mata Pelajaran Kelas VII</h2>
		<?php 
		echo "<div style='margin-bottom:10px;'>";
		echo form_open('clientclass1',array('id'=>'autosubmit'));
		echo "&nbsp;&nbsp;";
		echo "<text style='color:#59CEF9;font-size:12px;'>Pilih Kelas</text>";
		echo "&nbsp;&nbsp;";
		echo form_dropdown('no',$dropdownkelas,array(),'style="width:150px"')."\n";
		echo "&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;";
		echo "<text style='color:#59CEF9;font-size:12px;'>Pilih Hari</text>";
		echo "&nbsp;&nbsp;";
		echo form_dropdown('hari_id',$dropdownhari, array(),'style="width:150px"')."\n";
		echo "&nbsp;";
		echo form_submit('submit','Ubah Kelas & Hari','style="width:150px"');
		

		echo "</div>\n";
if ($displaybyjam){
    echo "<div class='menuall' style='margin-bottom:10px;'>\n<ul class='clear'>\n";
foreach ($displaybyjam as $key => $displayjam){
    echo "<li class='menuone' style='margin-bottom:5px;'><p class='blue'>Ke&nbsp;".$displayjam['jam_ke']."&nbsp;/&nbsp;Waktu&nbsp;".$displayjam['waktu']."</p>";
        echo "<ul class='dateul'>\n"; 
			echo "<li class='courseli yellow'>";
			$jam_ke = $displayjam['jam_ke'];
			$hari_id = $displayjam['hari_id'];
			$no = $displayjam['no'];
			//$user_id = $this->session->userdata('guru_id');
			$retrieveslot = $this->Jadwal->retrieveslot($jam_ke,$hari_id,$no);
			if ($retrieveslot == "true"){
			$retrievematpel = $this->Jadwal->retrievematpel($jam_ke,$hari_id,$no);
			echo "<p>Kode :".$retrievematpel;
			}else{
			echo "<p>Kode : Kosong";
			}
			echo "</li>";
    echo "</ul>";
	echo "</li>";
}
echo "</div>";

}
echo "<text style='color:#59CEF9;font-size:12px;margin-left:10px;'>*Keterangan Kode Jadwal Mata Pelajaran</text>";
echo "<div class='blue' style='float:left;width:80%;border:1px solid black;margin-top:10px;'>\n<ul class='clear'>\n";
if ($displayajar){
foreach ($displayajar as $key => $displayajarguru){
 echo "<li class='courseli red' style='width:45%;float:left;'>".$displayajarguru['ajar_id']."&nbsp;=&nbsp;".$displayajarguru['guru_nama']."&nbsp;/".$displayajarguru['mapel'];
 echo "</li>";
}
}
echo "</div>";
echo form_close();
 ?>
        </div><!--end of left content-->

    </div><!--end of main content-->


      <div id="footer">
     	<div class="copyright">
<text style="color:white;font-size:11px;">&copy; 2013 Reza Fajar Nugroho created with dedication</text>
        </div>
    	<div class="footer_links"> 
<a href="<?php echo site_url();?>/clientabout">Tentang Kami</a>
         <a href="<?php echo site_url();?>/clientprivacy">Privasi</a> 
        <a href="<?php echo site_url();?>/clientcontact">Kontak Kami</a>
        </div>
    
    
    </div>  
 
   

</div> <!--end of main container-->
</body>
</html>
