<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMPN 2 Banyudono</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" media="screen" />
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
    	<div id="left_content">
       <h2>Berita Terbaru</h2> 
        <div class="news">
        	<div class="news_icon"><img src="<?php echo base_url();?>assets/images/news_icon.gif" alt="" title="" /></div>   
            <div class="news_content">    
<span>"Kedudukan Kurikulum dan Guru dalam Pendidikan</span><br />
Kurikulum disebut-sebut sebagai inti pendidikan dan menjadi ciri utama sekolah sebagai institusi yang bergerak pelayanan pendidikan. Kurikulum di dalamnya terdiri dari lima komponen: (1) Tujuan Pendidikan; (2) Isi (3) Strategi; (4) Pengelolaan Kurikulum, dan (5)  Evaluasi.
			</div>
        </div>  
        <div class="read_more_link"><a href="<?php echo site_url();?>/latestnews1">baca artikel</a></div>     
        
 
 
         <div class="news">
        	<div class="news_icon"><img src="<?php echo base_url();?>assets/images/news_icon.gif" alt="" title="" /></div>   
            <div class="news_content">    
<span>"Daftar nilai Ujian Nasional (UN) SMP Tahun Pelajaran 2012/2013 murni tertinggi</span><br />
Kementerian Pendidikan dan Kebudayaan (Kemdikbud) merilis daftar peserta didik, sekolah/madrasah, dan provinsi dengan rerata nilai Ujian Nasional (UN) SMP Tahun Pelajaran 2012/2013 murni tertinggi. 
			</div>
        </div>  
        <div class="read_more_link"><a href="<?php echo site_url();?>/latestnews2">baca artikel</a></div>
 
 
        <div class="news">
        	<div class="news_icon"><img src="<?php echo base_url();?>assets/images/news_icon.gif" alt="" title="" /></div>   
            <div class="news_content">    
<span>"Daftar Sekolah yang Menerapkan Kurikulum 2013</span><br />
Kurikulum pengganti KTSP, yaitu kurikulum 2013 mulai diterapkan tahun pelajaran 2013/2014 pada tingkat SD sampai dengan SMA/SMK. 
			</div>
        </div>  
        <div class="read_more_link"><a href="<?php echo site_url();?>/latestnews3">baca artikel</a></div> 
 
 

        
        </div><!--end of left content-->



    	<div id="right_content">
        <h2>Informasi Kami</h2>
        	<div class="contact_info_box">
				<div class="contact_info_title">Kontak Kami</div>
            <div class="contact_info">
            <img src="<?php echo base_url();?>assets/images/phone_icon.gif" alt="" title="" class="box_img" />
            0700 679 122 489<br />
            0700 679 122 489
            </div>
            
             <div class="contact_info">
            <img src="<?php echo base_url();?>assets/images/contact_icon.gif" alt="" title="" class="box_img" />
           banyudono@yahoo.com<br>
            luciferama@yahoo.com
            </div> 
            
            <div class="adress">
            Boyolali , Banyudono 2005 , CP 14-7089
            </div>

            </div>
            
            
 
  <h2>Login Administrator</h2>
                 <div id="contact_form">
				 <?php echo form_open('verifylogin') ?>
                    <div class="form_row">
                    <label>Nama:</label><input type="text" name="name" id="name" class="contact_input" />
                    </div>
                    
                    <div class="form_row">
                    <label>Password:</label><input type="password" name="password" id="password" class="contact_input" />
                    </div>                    
                    
					<input id="btnlogin" class="send" value="Login" type="submit" style="color:white;font-weight:bold;"/>               
            
                </div>
 <?php echo validation_errors(); ?>
 
 
            
        
        </div><!--end of right content-->


    
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
 
   

</div> <!--end of main container-->
</body>
</html>
