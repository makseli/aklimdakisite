<?PHP

if( is_array($Benim_UrlLerim))
{
	$i = 1;
	 foreach ($Benim_UrlLerim AS $Kayit): 

		 $KL =  $Kayit['KisaLink'];
		 $Url = $Kayit['SiteUrl'];
		 $Baslik = $Kayit['Baslik'];
		 $UyeId = $Kayit['UyeId'];
		 $Aciklama = $Kayit['Aciklama'];
		 //$Kategori = explode(",", $Kayit['Kategori']);
		 $Kategori = $Kayit['Kategori'];
		 
		 $UyeAdi = UyeAdi($UyeId);
		 $GorunenMetin = '';
		 //Açıklama Olayı
		 if($Aciklama == ""){ $Aciklama = $Baslik; }
		 //Görünecek Metin
		 if($GorunenMetin == ""){ $GorunenMetin = $Baslik; }
		 if($GorunenMetin == ""){ $GorunenMetin = $Url; }
		 
		 if( strlen($KL) > 1){
		 	$KisaLink = 'kisa link <a href="http://kl.gen.tr/'.$KL.'" rel="nofollow" title="Kısaltılmış urlsi : '.$Url.'" class="KisaLink" target="_blank" > http://kl.gen.tr/'.$KL.'</a> &nbsp;&nbsp;';
		 }else{ $KisaLink = ""; }
		 
		 $Whois = 'tarih: '.$Kayit['Tarih'];
		 
		 ?>
		 <div class="IseYararSite" id="<?PHP echo $i; ?>">
						<a href="<?PHP echo $Url; ?>" title="<?PHP echo $Aciklama; ?>" rel="nofollow" class="KaydedilmisSite" target="_blank">
							<?PHP echo KisaGoster($GorunenMetin, 95); ?>
						</a>

						<br/><span class="SiteIslem" id="SiteIslem<?PHP echo $i; ?>">
								<a href="http://aklimdakisite.com/Uye/Giris?TB_iframe=true&height=350&width=350" title="Sevdiyseniz Sizde Kaydedin !" class="thickbox"><img src="/_tema/x1/images/heart_blue.png" alt="Bunu Sevdim" border="0" /></a> 
								<a href="http://aklimdakisite.com/Uye/Giris?TB_iframe=true&height=350&width=350" title="Uygunsuz ise Şikayet Edin !" class="thickbox"><img src="/_tema/x1/images/element_fire.png" alt="Bunu Bildir" border="0" /></a>
								<a href="http://aklimdakisite.com/Uye/Giris?TB_iframe=true&height=350&width=350" title="Rss takip" class="thickbox"><img src="/_tema/x1/images/rss.png" alt="Bu yayıncının Rss i" border="0"  /></a>
								<a href="http://aklimdakisite.com/Uye/Giris?TB_iframe=true&height=350&width=350" title="Paylaş" class="thickbox"><img src="/_tema/x1/images/share_this.png" alt="Paylaş" border="0" /></a>
								&nbsp; 
								<?PHP 
								
								echo $KisaLink;
 
								echo $Whois;
								
								?>
						</span>
						<div class="IseYararSiteEtiketKategori">
							<?PHP echo KisaGoster($Kategori, 120); ?> 
						</div>
						 <span class="IseYararSiteyiGonderen">
						 	<?PHP echo '<a href="http://'.DomainiCikar($Url).'" rel="nofollow" title="Linkin ana domaini" class="SikKullanilanSite" target="_blank">'.DomainiCikar($Url).'</a>'; 
							  ?> 
							  |
						 	( s. <a href="http://aklimdakisite.com/<?PHP echo $UyeAdi; ?>" title="<?PHP echo $UyeAdi; ?> takma isimli üyenin gönderileri" class="IseYararSiteyiGonderen"><?PHP echo $UyeAdi; ?></a> )
						 </span>
			</div>	
			<br/>
	<?php 
	$i++;
	endforeach;
}
?>
