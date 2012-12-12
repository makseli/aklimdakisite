<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>  AklimdakiSite.com - Üyelik İşlemleri - Üye Girişi - Site Girişi </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="AklimdakiSite.com da üyelik işlemlerini yapmak üzere giriş için kullanılır" />
<meta name="keywords" content="site kaydet, favorisite, sık kullanılan site kaydet, delicious, üye girişi" />
<script src="/_tema/x1/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="/_tema/x1/js/jquery.validate.js"></script>
<script type="text/javascript" src="/_tema/x1/js/cmxforms.js"></script>
<link href="<?PHP echo base_url(); ?>_tema/x1/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">	  
      $(document).ready(function() {
      $('#commentForm').validate({
      rules: {
	      KullaniciAdi: { required: true, minlength:3, number: false, email: true },
	      Sifre: { required: true, minlength:4 }
      },
      messages: {
	      KullaniciAdi: { required: 'Gerekli', minlength: '<br />3 karekterden fazla giriniz', number: 'sayı girmeyiniz !', email: '<br />geçerli bir e-mail adresi giriniz' },
	      Sifre: { required: 'Gerekli',  minlength: '<br />4 karekterli şifrenizi giriniz' }
      }
      });
      });
$(document).ready(function() {
	$("#commentForm").validate();
});
</script>
<style type="text/css">
	#commentForm label { width: 150px; }
	#commentForm label.error, #commentForm input.submit {
	margin-left: 5px; width:auto; color:#cf0000; background-color:#efefef; font:normal 11px Verdana;
}
</style>
</head>
<body>

<?PHP

if($islem == "YeniPost"){
	?>	
		<center style="color:#343434; font:normal 20px Calibri, Verdna;">
				<br/><br/><br/><br/>
				<a href="/" target="_parent" style="text-decoration:none; color:#33c6d3; padding:5px; background-color:#343434; font:normal 19px Calibri, Verdana;">
					Giriş yaptığınız için teşekkür ederiz. Ana sayfaya gitmek için tıklayınız ! 
				</a>
				<br/><br/><br/><br/>
				Hoşgeldiniz <b><?PHP echo $Mesaj; ?></b>
		</center>
	<?PHP
}
else
{
	
?>
	<center>
		<br />
	<div style="text-align:center; width:200px; margin-top:5px; margin-left:10px; padding:5px; color:#ffffff; background-color:#cf0000; font:normal 13px Calibri, Verdana;">
	<!--<div style="text-align:center; margin-left:225px; margin-top:80px; position:absolute; width:auto;">
		<img src="<?PHP echo base_url(); ?>/_tema/x1/images/AklimdakiSite.com_UyeKaydi.png" alt="Giriş Yaptığınız İçin Teşekkür Ederiz !" />
	</div>-->
	<strong> AklimdakiSite.com </strong>  Üye Girişi ! <!-- <br/> Site Eklemek için Üye olun ve giriş yapın ! -->
	</div>
	
	<div style="float:left; width:100%; text-align:center;">
		<!-- Kayıt Formu -->
		<br />
		<form class="cmxform" id="commentForm" action="?" method="POST">
			<table>
				<tr><td align="left" style="color:#343434; font:normal 11px Calibri, Arial;"><strong>Kullanıcı Adınız</strong> (<i>Eposta</i>) : </td></tr>
				<tr><td align="left" style="color:#343434; font:normal 13px Calibri, Verdna;">
					<input id="KullaniciAdi" name="KullaniciAdi" value="<?PHP if(isset($TakmaAd)){ echo $TakmaAd; } ; ?>" style="padding-top:3px; padding-left:5px; width:250px; height:27px;" class="required" type="input" />
		<?PHP
			if(isset($Hata)){ 
				?>
					<div style="padding:10px; width:300px; text-align:center; font:bold 13px Arial; color:#ffffff; background-color:#850000;">
					<?PHP echo $Hata.'<br/>'.$Durum.'<br/>'.$Mesaj.'<br/>'; ?>
					</div>
				<?PHP
				$Hata = "";
			}
		?>
				</td></tr>
				<tr><td align="left" style="color:#343434; font:normal 11px Arial;"><strong>Şifre</strong>niz : </td></tr>
				<tr><td align="left" style="color:#343434; font:normal 13px Verdna;">
					<input style="padding-top:3px; padding-left:5px; width:250px; height:27px;" class="required minlength:4" type="password"  id="Sifre" name="Sifre" />
				</td></tr>
				<tr><td color="2" align="left" style="color:#343434; font:normal 11px Arial;">
					<br/>
					<a href="http://aklimdakisite.com/Uye/SifremiUnuttum" title="Şifrnizi Unuttuysanız Tıklayın !" class="SiteKaydetmeSistemLinkleri"> şifre hatırlat</a>  
					 |  
					<a href="http://aklimdakisite.com/Uye/Yeni" title="Yeni Üyelik için Tıklayın !" class="SiteKaydetmeSistemLinkleri"> yeni üyelik </a>
					<br/><br />
					<input style="background: #daebf5; font:bold 13px Verdana; color:darkblue; border: 1px solid #85a9bf; border-top: 2px solid lightblue; border-bottom: 2px solid lightblue;" type="submit" value="Beni Kaydet" />
				</td></tr>
			</table>
		</form>
	</div>
	</center>	

<?PHP
}
?>
</body>
</html>