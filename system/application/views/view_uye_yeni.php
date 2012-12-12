<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>  AklimdakiSite.com - Yeni Üye - Üyelik Kaydı - Site Kaydı </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="AklimdakiSite.com da yeni üyelik açmak için kullanılır" />
<meta name="keywords" content="site kaydet, favorisite, sık kullanılan site kaydet, delicious" />
<script src="/_tema/x1/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="/_tema/x1/js/jquery.validate.js"></script>
<script type="text/javascript" src="/_tema/x1/js/cmxforms.js"></script>
<link href="<?PHP echo base_url(); ?>_tema/x1/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">	  
      $(document).ready(function() {
      $('#commentForm').validate({
      rules: {
	      KullaniciAdi: { required: true, minlength:3, number: false },
	      EPosta: { required: true, email: true },
	      Sifre: { required: true, minlength:4 },
	      Tekrar: { required: true, minlength:4, equalTo: "#Sifre" }
      },
      messages: {
	      KullaniciAdi: { required: 'Gerekli', minlength: '<br />3 karekterden fazla giriniz', number: 'sayı girmeyiniz !' },
	      EPosta: { required: 'Gerekli', email: '<br />geçerli bir e-mail adresi giriniz' },
	      Sifre: { required: 'Gerekli',  minlength: '<br />4 karekterli şifrenizi giriniz' },
	      Tekrar: { required: 'Gerekli', minlength:'<br />4 karakter olarak giriniz !', equalTo:' Şifrenizi Tekrar Giriniz !' }
      }
      });
      });
$(document).ready(function() {
	$("#commentForm").validate();
});

$("#Sifre").blur(function() {
	$("#Tekrar").valid();
});

function UyeAdiBelirle(yeni){
	document.getElementById('UyeAdimiz').innerHTML = yeni;
}

</script>
<style type="text/css">
	#commentForm label { width: 150px; }
	#commentForm label.error, #commentForm input.submit {
	margin-left: 5px; width:auto; color:#cf0000; background-color:#efefef; font:normal 11px Verdana;
}
</style>
</head>
<body>
	<center>
<?PHP

if($islem == "YeniPost"){
	?>	
				<br/><br/><br/><br/>
				<a href="/" target="_parent" style="text-decoration:none; color:#33c6d3; padding:5px; background-color:#343434; font:normal 19px Calibri, Verdana;">
					Üye olduğunuz için teşekkür ederiz. Ana sayfaya gitmek için tıklayınız !
				</a>
	<?PHP
}
else
{
?>


	<div style="text-align:center; width:200px; margin-top:5px; padding:5px; color:#ffffff; background-color:#cf0000; font:normal 13px Calibri, Verdana;">
	<!--<div style="text-align:center; margin-left:230px; margin-top:100px; position:absolute; width:auto;">
		<img src="<?PHP echo base_url(); ?>/_tema/x1/images/AklimdakiSite.com_UyeKaydi.png" alt="Kaydolduğunuz İçin Teşekkür Ederiz !" />
	</div>-->
		<strong> AklimdakiSite.com </strong>  Yeni Üye Kaydı! <!--<br/> Üye olun ve işlemlerinizi kolaylaştırın !-->
	</div>
	
	<div style="width:380px; text-align:center; margin-left:30px;">
		<!-- Kayıt Formu -->
		<br />
		<form class="cmxform" id="commentForm" action="?" method="POST">
			<table>
				<tr><td align="left" style="color:#343434; font:normal 11px Calibri, Verdana;">Üye Adı ( <strong><i>aklimdakisite.com/</i><span id="UyeAdimiz" name="UyeAdimiz" style="background-color:#ccd74e; color:#343434;"><i>UyeAdi</i></strong></span> )  </td></tr>
				<tr><td align="left" style="color:#343434; font:normal 13px Calibri, Verdana;">
					<input id="KullaniciAdi" name="KullaniciAdi" value="<?PHP echo $TakmaAd; ?>" onkeyup="UyeAdiBelirle(this.value)" style="padding-top:3px; padding-left:5px; width:250px; height:27px;" class="required" type="input" />
				</td></tr>
				<tr><td align="left" style="color:#343434; font:normal 11px Calibri, Verdana;"><strong>Eposta</strong> Adresiniz : </td></tr>
				<tr><td align="left" style="color:#343434; font:normal 13px Calibri, Verdana;">
						<!--onchange="kontrolet('KullaniciEpostaKontrol', this.value);"-->	
					<input value="<?PHP echo $EPosta; ?>" id="EPosta" name="EPosta" style="padding-top:3px; padding-left:5px; width:250px; height:27px;" class="required email" type="input" />
					<!--<span id="KullaniciEpostaKontrolsonuc"></span>-->
		<?PHP
			if($Hata != ""){ 
				?>
					<div style="padding:10px; width:300px; text-align:center; font:bold 13px Calibri, Verdana; color:#ffffff; background-color:#850000;">
					<?PHP echo $Hata; ?>
					</div>
				<?PHP
				$Hata = "";
			}
		?>
				</td></tr>
				<tr><td align="left" style="color:#343434; font:normal 11px Calibri, Verdana;"><strong>Şifre</strong>niz : </td></tr>
				<tr><td align="left" style="color:#343434; font:normal 13px Calibri, Verdana;">
					<input style="padding-top:3px; padding-left:5px; width:250px; height:27px;" class="required minlength:4" type="password"  id="Sifre" name="Sifre" />
				</td></tr>
				<tr><td align="left" style="color:#343434; font:normal 11px Calibri, Verdana;">Tekrar <strong>Şifre</strong>niz : </td></tr>
				<tr><td align="left" style="color:#343434; font:normal 13px Calibri, Verdana;">
					<input style="padding-top:3px; padding-left:5px; width:250px; height:27px;" class="required equalTo:Sifre" type="password" id="Tekrar" name="Tekrar" />
				</td></tr>
				<tr><td color="2" align="left" style="color:#343434; font:normal 11px Calibri, Verdana;">
					<a href="http://aklimdakisite.com/Uye/SifremiUnuttum" title="Şifrnizi Unuttuysanız Tıklayın !" class="SiteKaydetmeSistemLinkleri">şifre hatırlat</a>  
					 |  
					<a href="http://aklimdakisite.com/Uye/Giris" title="Üyelik bilgilerinizle giriş yapmak için Tıklayın !" class="SiteKaydetmeSistemLinkleri"> üye girişi</a><br/>
					<input style="background: #daebf5; font:bold 13px Calibri, Verdana; color:darkblue; border: 1px solid #85a9bf; border-top: 2px solid lightblue; border-bottom: 2px solid lightblue;" type="submit" value="Beni Kaydet" />
				</td></tr>
			</table>
		</form>
	</div>

<?PHP
}

?>
	</center>	
</body>
</html>