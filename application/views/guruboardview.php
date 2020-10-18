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
                <li><a href="<?php echo site_url();?>/clientservices" title="">berita</a></li>
				<li><a href="<?php echo site_url();?>/clientprivacy" title="">privasi</a></li>
                <li><a class="current" href="<?php echo site_url();?>/clientcontact" title="">kontak kami</a></li>
            </ul>
        </div>
        
    </div>
    
    <div class="green_box">
    	<div class="clock">
        <img src="<?php echo base_url();?>assets/images/clock.png" alt="" title="" />             
        </div>
        <div class="text_content">
        <h1>Selamat Datang, <?php if ($this->session->userdata('guru_nama')) { $guru_nama = $this->session->userdata('guru_nama'); echo $guru_nama;} ?></h1>
        <p class="green">
        <?php 
		if ($this->session->userdata('guru_nama')) 
 $guru_nik = $this->session->userdata('guru_nik');
 $guru_alamat = $this->session->userdata('guru_alamat');
 $guru_nohp = $this->session->userdata('guru_nohp');
 $guru_jabatan = $this->session->userdata('guru_jabatan');
 $guru_jabatan_detail = $this->session->userdata('guru_jabatan_detail');
 $guru_status = $this->session->userdata('guru_status');
 $guru_kodemapel = $this->session->userdata('ajar_id');
 $guru_mapel = $this->session->userdata('mapel');
 $guru_statuskuota = $this->session->userdata('kapasitas_total');
 echo "<table><tr><td><label style='width:35%;text-align:left;'>NIK </label>";
 echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'> ".$guru_nik."</label>";
 echo "</td></tr><tr><td><label style='width:35%;text-align:left;'>Alamat</label>";
 echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'> ".$guru_alamat."</label>";
 echo "</td></tr><tr><td><label style='width:35%;text-align:left;'>No Handphone</label>";
 echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'> ".$guru_nohp."</label>";
  echo "</td></tr><tr><td><label style='width:35%;text-align:left;'>Jabatan</label>";
  echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'> ".$guru_jabatan_detail."</label>";
  echo "</td></tr><tr><td><label style='width:35%;text-align:left;'>Merangkup</label>";
  echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'> ".$guru_jabatan."</label>";
  echo "</td></tr><tr><td><label style='width:35%;text-align:left;'>Status</label>";
  echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'>".$guru_status."</label>";
   echo "</td></tr><tr><td><label style='width:35%;text-align:left;'>Kode / Mapel</label>";
   echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'> ".$guru_kodemapel." / ".$guru_mapel."</label>";
   echo "</td></tr><tr><td><label style='width:35%;text-align:left;'>Kuota</label>";
   echo "<label style='text-align:left;width:1%;'>:</label>";
 echo "<label style='text-align:left;width:55%;'> ".$guru_statuskuota."</label>";
 echo "</td></tr><tr><td></table>";?>
        </p>
        </div>
        
        <div id="right_nav">
            <ul>                                        
			<li><a href="<?php echo site_url();?>/gurudashboard" title="">View Penjadwalan</a></li>
			<li><a href="<?php echo site_url();?>/gurudashboard/inputbykelas" title="">Input Penjadwalan</a></li>
                <li><a href="<?php echo site_url();?>/clientclass2" title="">Update Status Guru</a></li>
                <li><a href="<?php echo site_url();?>/gurudashboard/logout" title="">Logout</a></li>	
            </ul>
        </div>       
        
    
    </div><!--end of green box-->
    
    <div id="main_content" style="margin:5px;">
       <h2 style="width:75%">View Jadwal</h2>
	   <table style="background-color:#CFFBFF;">
	   <?php
	     if ($displaybyhari){
	  foreach($displaybyhari as $key =>$displayhari){
	  echo "<tr><td style='width:25%;background-color:lightblue;text-align:center;'>",$displayhari['hari_nama'];
	  echo "</tr>";
	  }
	  }
	   ?>
	   </table>
	
    <div style=" clear:both;"></div>
    </div><!--end of main content-->
     <div id="footer">
     	<div class="copyright">
<text style="color:white;font-size:11px;">&copy; 2013 Reza Fajar Nugroho created with dedication</text>
        </div>
    	<div class="footer_links"> 
   <a href="<?php echo site_url();?>/clientabout">Tentang Kami</a>
         <a href="<?php echo site_url();?>/clientprivacy">Privasi</a> 
        <a href="<?php echo site_url();?>/clientcontact">Kontak Kami</a>
		<a href="<?php echo site_url();?>/clientlogin">Login</a>
        </div>  
    </div>  
</div> 
</body>
</html>