<?php
	
class Url extends Controller {

 function __construct()
 {
	parent::Controller();
	$this->load->library('session');
	$this->load->scaffolding("_siteler_url");
	$this->load->model('vt_url');
 }
 
 function index()
 {
 	//
 }
 
 function UrlDuzenle(){
 	
	  $data['title']	= 'AklımdakiSite - İşe Yarar Siteleri Kaydetme Merkezi';
	  $data['desc']		= 'AklımdakiSite, internette gezerken, bu site güzelmiş, sonra bakayım dediğiniz işe yarar siteleri kaydetme merkezidir !';
	  $data['keyw']		= 'sık kullanılanlar, favori siteler, domain, alanadı, kaydet, site kaydet, en çok sevdiğim siteler, web tasarım, programlama, Keep, share, and discover the best of the Web using';
	  
	  $KullaniciAdi = $this->session->userdata('KullaniciAdi');
	  $data['KullaniciAdi'] = $KullaniciAdi;
	
	  $this->load->view('_tema_x1_tavan', $data); // _tema_x1_main.php dosyasının gösterimi. Site Ana sayfa burada.. 
      
	 	echo 'Url Duzenleme yakimda :(';
		
	$this->load->view('_tema_x1_taban');
 }
 
 function Ekle()
 {
 		
		//Ekleme işlemini 2 aşamalı yap
		// Birinci de Url yi al - kayıt oluştur - title sini al curl ile, ikinci de taglarını girdirirsin !!!
	
	// Bu Url yi ilk aldığımız zamandaki işlemler
	$KullaniciId = $this->session->userdata('KullaniciId');
	if($this->input->post("Url"))
	{
		
		$Url = htmlspecialchars($this->input->post("Url"));
		$Kntrol = substr($Url, 0, 4);
		
		$Url = $this->input->post("Url");
		
		
		if($Kntrol != "http"){
			$Url = "http://".$Url;
		}
		
		$UrlTitle = trim(UrlTitle($Url)); 
		
		$data["islem"] = "YeniPost";
		//Kısa Link i Çıartıyoruz !
		$KisaLnk = KisaLink($Url);
		
		$data["Mesaj"] = 'KısaLink Dönen: '.$KisaLnk.'<br/> Url titleden dönen: '.$UrlTitle.'<br/>';
		
		//Kayıttan Dönen Bilgiyi Alalım
		$Alalim = $this->vt_url->Kayit($KullaniciId, $Url, $UrlTitle, $KisaLnk);
		$data["Url"] = $Url;
		$data["Title"] = $UrlTitle;		
		
		$this->load->view('view_url_ekle_tag', $data);
		
	}else if($this->input->post("Title")){//Burası da tag alımı update çalıştırılacak ve anasayfaya yönlendirilecek !
	
		$Title = $this->input->post("Title");
		if($this->input->post("Ozel") == "on"){ $Ozel = 0; }else{ $Ozel = 1; }
		$Aciklama = $this->input->post("Aciklama");
		$Kategori = $this->input->post("Kategori");
		$GURL = $this->input->post("GURL");
		
		$Alalim = $this->vt_url->TagKayit($KullaniciId, $Title, $Aciklama, $Kategori, $Ozel, $GURL);
		
		//Feedlemeyi herekese yap ;)
		if($KullaniciId == 1){
			//@$FriendFeed 		= FriendFeed($Title, $GURL, $Aciklama);
			


			
		}
			
		
		$data["islem"] = "Post";
		$this->load->view('view_url_ekle_tag', $data);
		
	}else{
		$data["islem"] = "";
		$this->load->view('view_url_ekle', $data);
	}
	
 }
 
}
	
?>