<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>  AklimdakiSite.com - Üyelik İşlemleri - Üye Şifre Hatırlatma - Site Girişi </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="AklimdakiSite.com da Eklenen Url-Site-Linklere kategori belirlemek için kullanılır" />
<meta name="keywords" content="site kaydet, favorisite, sık kullanılan site kaydet, delicious, tag belirleme" />
<script src="/_tema/x1/js/jquery.js" type="text/javascript"></script>
</head>
<body onload="UrlmizFokus()">
<center>
	<div style="text-align:center; width:400px; margin-top:5px; margin-left:10px; padding:5px; color:#ffffff; background-color:#cf0000; font:normal 13px Calibri, Verdana;">
	<strong> AklimdakiSite.com </strong>  Url Ekleme -> Kategori ve Açıklama Belirleme
	</div>
	
	<div style="float:left; width:100%; text-align:center;">
		<!-- Kayıt Formu -->
		<br />
<?PHP
if($islem == "YeniPost"){
?>
		<form class="cmxform" id="commentForm" action="?" method="POST">
			<input type="hidden" name="GURL" id="GURL" value="<?PHP if(isset($Url)){ echo $Url; } ; ?>" />
			<table>
				<tr>
					<td align="center" style="color:#54acc9; font:normal 13px Calibri, Arial;">
						Link(<i>Url</i>) : <strong><?PHP if(isset($Url)){ echo DomainiKisaGoster($Url); } ; ?></strong><br/> 
						<label style="color:#343434;"><input type="checkbox" id="Ozel" name="Ozel" /> <strong> Özel İşaretli </strong> (<i>siz hariç kimsenin görmemesi için</i>) </label>
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
					</td>
				</tr>
				<tr>
					<td align="left" style="color:#343434; font:normal 11px Calibri, Arial;"><strong>Başlık</strong> (<i>Title</i>) : </td>
				</tr>
				<tr>
					<td align="left" style="color:#343434; font:normal 13px Calibri, Verdna;">
					<input id="Title" name="Title" value="<?PHP if(isset($Title)){ echo $Title; } ; ?>" style="padding-top:3px; padding-left:5px; width:450px; height:27px;" type="input" />
					</td>
				</tr>
				<tr>
					<td align="left" style="color:#343434; font:normal 11px Calibri, Arial;"><strong>Açıklama</strong> (<i>Description</i>) : </td>
				</tr>
				<tr>
					<td align="left" style="color:#343434; font:normal 13px Calibri, Verdna;">
					<textarea id="Aciklama" name="Aciklama" style="padding-top:3px; padding-left:5px; width:470px; height:45px;"></textarea>
					</td>
				</tr>
				<tr>
					<td align="left" style="color:#343434; font:bold 11px Calibri, Arial;">Kategori (<strong><i>Etiketleme işlemi. Lütfen Kategorilerinizi virgül (,) ile ayırarak yazınız !</i></strong>) : </td>
				</tr>
				<tr>
					<td align="left" style="color:#343434; font:normal 13px Calibri, Verdna;">
						<input id="Kategori" name="Kategori" style="font:bold 13px Verdana; color:#54acc9; padding-top:3px; padding-left:5px; width:470px; height:27px;" type="input" />
					</td>
				</tr>
				<tr>
					<td align="left" style="color:#343434; font:normal 13px Calibri, Verdna;">
					<br/><input style="background-color:#d3dd33; font:bold 13px Calibri,Verdana; color:darkblue; border: 1px solid #e8f15a; border-top: 2px solid lightblue; border-bottom: 2px solid lightblue;" type="submit" value="İleri" />
					</td>
				</tr>
			</table>
		</form>
<?PHP
}else{
	
	?>	
				<br/><br/><br/><br/>
				<a href="/" target="_parent" style="text-decoration:none; color:#33c6d3; padding:5px; background-color:#343434; font:normal 19px Calibri, Verdana;">
					Link Eklendi! Ana sayfaya gitmek için tıklayınız...</a> veya  <a href="/Url/Ekle?TB_iframe=true&height=333&width=666" title="Yeni bir link ekleyin" style="text-decoration:none; color:#33c6d3; padding:5px; background-color:#343434; font:normal 19px Calibri, Verdana;">Yeni Link Eklemek için tıklayınız</a>
	<?PHP
	
}
?>
	</div>
	</center>
</body>
</html>