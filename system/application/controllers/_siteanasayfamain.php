<?php

$sa = $_SERVER["SERVER_NAME"];//Site adresi www lulu
if($sa != "aklimdakisite.com"){ @header("Location:http://aklimdakisite.com"); }

class _SiteAnaSayfaMain extends Controller {

	function __construct()
	{
		parent::Controller();
		$this->load->model('VT_AnaSayfa'); 
		$this->load->library('session');  	
	}
	
	function index()
	{
	  
	  $data['title'] = 'AklımdakiSite - İşe Yarar Siteleri Kaydetme Merkezi';
	  $data['desc'] = 'AklımdakiSite, internette gezerken, bu site güzelmiş, sonra bakayım dediğiniz işe yarar siteleri kaydetme merkezidir !';
	  $data['keyw'] = 'sık kullanılanlar, favori siteler, domain, alanadı, kaydet, site kaydet, en çok sevdiğim siteler, web tasarım, programlama, Keep, share, and discover the best of the Web using';
	  
	  $KullaniciAdi = $this->session->userdata('KullaniciAdi');
	  $data['KullaniciAdi'] = $KullaniciAdi;
	  
      
	  $VeriTabani = $this->VT_AnaSayfa->UrlListe(FALSE, 0, 200); // sıfırıncı elemanı Son 20 Link i gönderir :)
	  $data['Benim_UrlLerim'] = $VeriTabani[0];
	  
	  $this->load->view('_tema_x1_tavan', $data);
	  $this->load->view('_tema_x1_main', $data); // _tema_x1_main.php dosyasının gösterimi. Site Ana sayfa burada.. 
      $this->load->view('_tema_x1_taban');
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */