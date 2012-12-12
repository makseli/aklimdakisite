<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>  AklimdakiSite.com - Üyelik İşlemleri - Üye Şifre Hatırlatma - Site Girişi </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="AklimdakiSite.com da Url-Link-Site Eklemek için kullanılır" />
<meta name="keywords" content="site kaydet, favorisite, sık kullanılan site kaydet, delicious, url ekleme, link ekleme" />
<script src="/_tema/x1/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="/_tema/x1/js/jquery.validate.js"></script>
<script type="text/javascript" src="/_tema/x1/js/cmxforms.js"></script>
<script type="text/javascript">
	
	
Event.observe(window, 'load', function() {
  $("Url").focus();
});

	
function UrlmizFokus()
{
    document.getElementById("Url").focus();
}
		  
      $(document).ready(function() {
      $('#commentForm').validate({
      rules: {
	      Url: { required: true, minlength:10 }
      },
      messages: {
	      Url: { required: 'Gerekli', minlength: '10 karekterden fazla giriniz' }
      }
      });
      });
$(document).ready(function() {
	$("#commentForm").validate();
});

$(document).ready( UrlmizFokus );
</script>
<style type="text/css">
	#commentForm label { width: 150px; }
	#commentForm label.error, #commentForm input.submit {
	margin-left: 5px; width:auto; color:#cf0000; background-color:#efefef; font:normal 11px Verdana;
}
</style>
</head>
<body onload="UrlmizFokus()">
<center>
		<br />
	<div style="text-align:center; width:200px; margin-top:5px; margin-left:10px; padding:5px; color:#ffffff; background-color:#cf0000; font:normal 13px Calibri, Verdana;">
	<!--<div style="text-align:center; margin-left:225px; margin-top:80px; position:absolute; width:auto;">
		<img src="<?PHP echo base_url(); ?>/_tema/x1/images/AklimdakiSite.com_UyeKaydi.png" alt="Giriş Yaptığınız İçin Teşekkür Ederiz !" />
	</div>-->
	<strong> AklimdakiSite.com </strong>  Url Ekleme <!-- <br/> Site Eklemek için Üye olun ve giriş yapın ! -->
	</div>
	
	<div style="float:left; width:100%; text-align:center;">
		<!-- Kayıt Formu -->
		<br />
<?PHP
if($islem == "YeniPost")
?>
		<form class="cmxform" id="commentForm" action="?" method="POST">
			<table>
				<tr><td align="left" style="color:#343434; font:normal 11px Calibri, Arial;"><strong>Link</strong> (<i>Url</i>) : </td></tr>
				<tr><td align="left" style="color:#343434; font:normal 13px Calibri, Verdna;">
					<input id="Url" name="Url" value="<?PHP if(isset($Url)){ echo $Url; } ; ?>" style="padding-top:3px; padding-left:5px; width:450px; height:27px;" class="required" type="input" />
					<br/><input style="background-color:#d3dd33; font:bold 13px Calibri,Verdana; color:darkblue; border: 1px solid #e8f15a; border-top: 2px solid lightblue; border-bottom: 2px solid lightblue;" type="submit" value="İleri" />
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
			</table>
		</form>
	</div>
	</center>
</body>
</html>