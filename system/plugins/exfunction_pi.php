<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    
	function FriendFeed($Baslik, $Link, $Yorumu_Aciklama){
		$ff_api_url = "http://friendfeed-api.com/v2/entry";
		$ff_data = "body=".$Baslik."&link=".$Linkiniz."&comment=".$Yorumu_Aciklama."&image_url=".$ResimVarsaAdresi;
		$ff_user = "makseli";
		$ff_password = "trail611ladle";
		$ch = curl_init($ff_api_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $ff_data);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERPWD, "{$ff_user}:{$ff_password}");
		$twitter_data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if ($httpcode != 200) {
			echo "<strong>Friendfeed</strong> HATA<br />";
			} else {
			echo "<strong>Friendfeed</strong> OK<br />";
			}
	}
	
	function DomainiCikar($lnk){ $ln = explode("/", $lnk); return $ln[2]; }
	
	function DomainiKisaGoster($lnk){
		
		$lnk = str_replace(array('http://', "https://"), array('', ''), $lnk);
		
		if(strlen($lnk) > 40){
			$lnk = substr($lnk, 0, 25).'...'.substr($lnk, -15);
		}
		return $lnk;
	}
	
	function KisaGoster($lnk, $Uzunluk = false){
		
		if($Uzunluk < 35){ $Uzunluk = 50; }
		if(strlen($lnk) > $Uzunluk){
			$lnk = '<span title="'.$lnk.'">'.substr($lnk, 0, $Uzunluk).'...</span>';
		}
		return $lnk;
	}
	
	function UyeAdi($UyeId)
	{
		$sor = mysql_query("SELECT TakmaAdUrl FROM _uye WHERE UyeId='$UyeId'");
		return @mysql_result($sor, 0);
		
	}
	
	
	function UrlTitle($url){
		$ch = curl_init(); //<strong>CURL</strong> oturumunu baslattik.. 
		curl_setopt($ch, CURLOPT_URL, $url); //URL'yi belirttik..
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; tr; rv:1.9.1.5) AklimdakiSite.com Url Ekleme");
		@curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
		@curl_setopt($ch, CURLOPT_FOLLOWLOCATION,2); //301 içindir buraya bak !!
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Veriyi direk döndürmedik, curl_exec fonksiyonundan döndürmesini istedik.
		$icerik = curl_exec($ch); //Dokümanin içerigini $icerik degiskenine atadik.. 
		curl_close($ch); //oturumu kapattik.
		preg_match("%<title>(.*?)</title>%si", $icerik, $title); //içerigimizden sadece <title></title> tagleri arasindaki bölgeyi çektik.. 
		//return @mb_convert_encoding($title[1], "UTF-8");
		return @$title[1];
	}
	
	function KisaLink($url){
		
		$Gonder = str_replace("http://", "", $url);
		
		$Gonderiyoruz = @file_get_contents("http://kl.gen.tr/AklimdakiSite/".$Gonder);
		
		return $Gonderiyoruz;
	}
	
		function Yonlendir($ATextdres, $Sure = 0){
			echo '<meta http-equiv="refresh" content="'.$Sure.' URL='.$ATextdres.'">';
		}
		
		function Lnk($Hedef=false, $Title = "", $CssLink = false, $Yazi = false, $Image = false, $CssImage=false, $ExImage = false, $ExLink = false, $Rel = false){
			
			if($Title == ""){ $Title = $Yazi; }
			if($CssLink == ""){ $CssLink = ''; }else{ $CssLink = ' class="'.$CssLink.'" '; }
			if($CssImage == ""){ $CssImage = ''; }else{ $CssImage = ' style="'.$CssImage.'" '; }
			
			if($Rel != ""){ $Rel = ' rel="'.$Rel.'" '; }else{ $Rel = ''; }
			
			if($Image != ""){ $Medya = '<img src="'.base_url().$Image.'" '.$CssImage.' alt="'.$Title.'" '.$ExImage.' />'; }else{ $Medya = ''; }
			
			$Bas = substr($Hedef, 0, 4);
			if($Bas == "http"){ $Yol = $Hedef; }else{ $Yol = base_url().$Hedef; }
			
			$ATextHref = '<a ';
			$ATextHref.= ' href="'.$Yol.'" ';
			$ATextHref.= ' title="'.$Title.'" ';
			$ATextHref.= $CssLink;
			$ATextHref.= $Rel;
			$ATextHref.= $ExLink;
			$ATextHref.= '>';
			$ATextHref.= $Yazi;
			$ATextHref.= $Medya;
			$ATextHref.= '</a>';
			
			return $ATextHref;
		}
		
		
		function Resim($Hedef, $Alt, $Style=false, $Ex=false){
			if($Style == ""){ $Style = ''; }else{ $Style = ' style="'.$Style.'" '; }
			
			$Bas = substr($Hedef, 0, 4);
			if($Bas == "http"){ $Yol = $Hedef; }else{ $Yol = base_url(); }
						
			return '<img src="'.$Yol.$Hedef.'" alt="'.$Alt.'" '.$Style.' '.$Ex.' /> ';
		}
		
		function TMLA($Lnk)
		{
			$tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','%');
			$eng = array('s','s','i','i','g','g','u','u','o','o','c','c','');
			$ALink = str_replace($tr,$eng,$ALink);
			$ALink = strtolower($ALink);
			$ALink = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $ALink);
			$ALink = preg_replace('/[^%a-z0-9 _-]/', '', $ALink);
			$ALink = preg_replace('/\s+/', '-', $ALink);
			$ALink = preg_replace('|-+|', '-', $ALink);
			$ALink = trim($ALink, '-');
			return $ALink;
		}
		
		function tr_ucwords($AText)
		{
			$AText = strtolower(strtr($AText,'ĞÜŞIİÖÇ','ğüşıiöç'));
			$AText = ucwords(strtr($AText,'ĞÜŞIİÖÇ','ğüşıiöç'));
			$t = array(' ğ', ' ü', ' ş', ' ı', ' i', ' ö', ' ç');
			$d = array(' Ğ', ' Ü', ' Ş', ' I', ' İ', ' Ö', ' Ç');
			$AText = str_replace($t,$d,$AText);
			return $AText;
		}
		
	function FormatTarih($Tarih){
		$FormatliTarih=substr($Tarih,8,2).".".substr($Tarih,5,2).".".substr($Tarih,0,4);
		return $FormatliTarih;
	}
	
?>