<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP if($title != ""){ echo $title; }else { ?>AklımdakiSite - İşe Yarar Siteleri Kaydetme Sistemi<?PHP } ?> BETA</title>
<meta name="Description" content="<?PHP if($desc != ""){ echo $desc; }else{ ?>AklımdakiSite, internette gezerken, bu site güzelmiş, sonra bakayım dediğiniz işe yarar siteleri kaydetme merkezidir ! Sık kullanılan siteleri kaydetme<?PHP } ?>"/>
<meta name="Keywords" content="<?PHP if($keyw != ""){ echo $keyw; }else{ ?>sık kullanılanlar, favori siteler, domain, alanadı, kaydet, site kaydet, en çok sevdiğim siteler, web tasarım, programlama, Keep, share, and discover the best of the Web using<?PHP } ?>"/>
<link type="application/rss+xml" rel="alternate" title="Rss imizi takip edin ;)" href="http://aklimdakisite.com/rss" />
<link href="<?PHP echo base_url(); ?>_tema/x1/css/css.css" rel="stylesheet" type="text/css" />
<script src="/_tema/x1/js/jquery.js" type="text/javascript"></script>
<script src="/_tema/x1/js/JeKu.js" type="text/javascript"></script>
<script src="/_tema/x1/js/thickbox.js" type="text/javascript"></script>
<link href="/_tema/x1/css/thickbox.css" rel="stylesheet" type="text/css" />
<?PHP if(isset($Ex)) echo $Ex; ?>
<meta name="google-site-verification" content="KC6PULd_7S0wg6dD5vfmMiVZd8R3BQABPJKsD4_tGes" />
</head>
<body>
	<div class="AklimdakiSiteLogo" title="Favori Sitelerim Logosu">
		<a href="http://aklimdakisite.com/" title="Üyelik Gerektirmeden işlerinizi halledin. Aklınızda Kalmasın, Tuttuğunuz Siteleri Kaydedin">
			<img alt="SiteKaydetme, Aklımda tut" border="0" src="/_tema/x1/images/AklimdakiSiteLogo.png" width="450" />
		</a>
		<div class="FavoriSiteSlogan" title="Favori Sitelerinizi Kaydedin ;)">  | AklimdakiSite.com (<i>beta</i>)<br/>
																				| sizde <strong>aklınızda tutun, mutlu olun :)</strong>
		</div>
	</div>
	<div style="text-align:center; font:normal 15px Calibri, Verdana; color:#ffffff; padding:5px; background:#a8cb2d;">
	<?PHP if($KullaniciAdi != ""){
		echo '
		<a href="http://aklimdakisite.com/Url/Ekle?TB_iframe=true&height=333&width=666" title="Site (Url) ekleme" class="thickbox" style="color:#0f94c6; font:bold 16px Calibri, Verdana; text-decoration:none;"> 
		<img src="/_tema/x1/images/url_ekle_kaydet_aklimdakisite.com.png" border="0" alt="işe yarar site" />
		Link eklemek için tıklayın!
		</a>
		<br/>Merhaba <b> '.$KullaniciAdi.'</b>
		'; } 
		
	?>
	<br/><b>AklimdakiSite.com</b> nette gezerken merak edip de zaman ayıramadığımızdan "sonra bakim ben bu siteye" dediğimiz url leri kaydetmek için açmış bulunuyoruz.
	<br/>Sistemimiz test aşamasında olsada, site (url) ekleme hizmetimizden yararlanabilirsiniz. Önce <b>aklimdakisite.com</b> a sadece eposta adresinizle <a href="http://aklimdakisite.com/Uye/Yeni?TB_iframe=true&height=350&width=400" title="Yeni Üyelik" style="color:#343434; font:bold 12px Calibri, Verdana;" class="thickbox">kayıt olabilirsiniz</a>
	<br/>
	
	
	
		<script type="text/javascript"><!--
		google_ad_client = "pub-6835867072960020";
		/* 468x60, oluşturulma 11.05.2010 AklimdakiSiteUSt */
		google_ad_slot = "0906407437";
		google_ad_width = 468;
		google_ad_height = 60;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	
	</div>
	<div class="AklimdakiSiteMenuNavi" title="Kaydetmek İstediğiniz Siteleri aklimdakisite.com a eklemek üzere yardımcı olacak menü burasıdır!">
	<?PHP
	
	if($KullaniciAdi == ""){
		?>
		 <a href="<?PHP echo base_url(); ?>Uye/Yeni?TB_iframe=true&height=350&width=400" title="Üye Olun" class="thickbox MenuNavigasyon"> &nbsp; Üye Olayım &nbsp; </a>		   
		 | <a href="http://aklimdakisite.com/Uye/Giris?TB_iframe=true&height=350&width=350" title="Üye Girişi" class="thickbox MenuNavigasyon"> &nbsp; Üye Girişi &nbsp; </a>
		 | <a href="http://aklimdakisite.com/Uye/SifremiUnuttum?TB_iframe=true&height=350&width=350" title="Şifrenizi Tekrar Gönderin" class="thickbox MenuNavigasyon"> &nbsp; Şifremi Unuttum &nbsp; </a> |
		<?PHP
	}
	 
	?>
 
		  <!--<a href="http://aklimdakisite.com/Neden" title="AklimdakiSite.com u neden " class="MenuNavigasyon"> &nbsp; Neden &nbsp; </a> 
		  |  -->
		  
		<a href="http://aklimdakisite.com/Uygulamalar?TB_iframe=true&height=350&width=350" title="AklimdakiSite.com Sosyal Ağ Uygulamaları" class="thickbox IseYararSiteyiGonderen"> &nbsp; Uygulamalar &nbsp; </a>
	<?PHP
	
	if($KullaniciAdi != ""){
		?>
		| <a href="http://aklimdakisite.com/Url/UrlDuzenle" title="Eklediğiniz linkleri buradan yönetebilirsiniz !" class="MenuNavigasyon"> &nbsp; <b>**Benim Linklerim</b> &nbsp; </a> 
		| <a href="http://aklimdakisite.com/Uye/cikis" title="LogOut" class="MenuNavigasyon"> &nbsp; Çıkış &nbsp; </a>
		<?PHP
	}
	 
	?>
	</div>
	<div class="SiteKaydetIcerikAlani">