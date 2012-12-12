<?php
	
	class Uye extends Controller {
	
	 function __construct()
	 {
		parent::Controller();
		$this->load->library('email');
		$this->load->library('session');
		$this->load->model('VT_Uye');
	 }
	 
	 function index()
	 {
		$data['title'] = 'Üye title'; $data['desc'] = 'Üye desc'; $data['keyw'] = 'Üye keyw'; $data['d1'] = 'Üye İşlemleri';
		$this->load->view('_tema_x1_tavan', $data);
		$data['islem'] = "index";
		$this->load->view('view_uye'); // Etkinlikler.php Sayfası Gösterimi
		$this->load->view('_tema_x1_taban');
	 }
	 
	 function Urlleri(){
		
		 $this->load->model('VT_AnaSayfa', 'Model'); 
		  //Üye Adı tanımı
		  $UyeAdi = $this->uri->segment(1);
				
		  $data['title'] = 'AklımdakiSite - İşe Yarar Siteleri Kaydetme Merkezi';
		  $data['desc'] = 'AklımdakiSite, internette gezerken, bu site güzelmiş, sonra bakayım dediğiniz işe yarar siteleri kaydetme merkezidir !';
		  $data['keyw'] = 'sık kullanılanlar, favori siteler, domain, alanadı, kaydet, site kaydet, en çok sevdiğim siteler, web tasarım, programlama, Keep, share, and discover the best of the Web using';
		  
		  $KullaniciAdi = $this->session->userdata('KullaniciAdi');
		  $data['KullaniciAdi'] = $KullaniciAdi;	  
		  
	      $this->load->view('_tema_x1_tavan', $data);
		  
		  $get_sayfa = $this->uri->segment(2);
		  if(isset($get_sayfa)){ $sayfa = (int)$get_sayfa; }else{ $sayfa = 0; }
		  $KacKayit = 15;
		  
		  $Veritabani = $this->Model->UrlListe($UyeAdi, $sayfa, $KacKayit);
		  $UrlListe = $Veritabani[0];
		  $ToplamKayit = $Veritabani[1];
		  
			$data['Benim_UrlLerim'] = $UrlListe;
			
				$this->load->library('pagination');
				$config['first_link']			= 'İlk Sayfa';
				$config['last_link']			= 'Son Sayfa';
				$config['base_url'] 			= site_url($UyeAdi.'/');
				$config['total_rows'] 			= $ToplamKayit;
				$config['per_page'] 			= $KacKayit; 
			    $config['uri_segment'] 			= '2';
				$config['page_query_string'] 	= FALSE;
			
				$this->pagination->initialize($config);
				$data['sayfa_listesi'] =  $this->pagination->create_links();
				$data['sayfa_listesi'] = $this->_config_pagination($ToplamKayit, $KacKayit, $UyeAdi);  
			
			
			
		  $this->load->view('view_url_UyeListe', $data); // _tema_x1_main.php dosyasının gösterimi. Site Ana sayfa burada.. 
	      $this->load->view('_tema_x1_taban');
		
	 }
	 
	 function SifremiUnuttum(){
		
		$islem = '';
		
		if($this->input->post("KullaniciAdi"))
		{
			$KA = $this->input->post("KullaniciAdi");
			$data['TakmaAd'] = $KA;
			 	
				$BilgiAl = $this->VT_Uye->SifreHatir($KA);
				$Dogrumu = $BilgiAl[0];	 	
				
			if($Dogrumu){
				
				$data['Durum'] = $BilgiAl[1];
				$data['Mesaj'] = $BilgiAl[2]; // Üyenin ismi
				$Sifre = $BilgiAl[3];
				
				//Mail Gönder
				$lnk = '<a href="http://since1910.net/Uye/SifremiUnuttum/'.$Sifre.'-'.$KA.'">AklimdakiSite.com üyeliğim için Şifremi Hatırlat</a>';
				
				$this->email->from('cevapsiz@aklimdakisite.com', 'AklimdakiSite.com Üye Servisi');
				$this->email->to($KA);
				$this->email->subject('AklimdakiSite.com | Üyelik Şifre Hatırlatma');
				$this->email->message($lnk);
				$this->email->send(); // Kontrolleri yaptıktan sonra etkinleştir
				//echo $this->email->print_debugger();
				$islem = "YeniPost";
				
					
			}
			else
			{
			 	$data['Hata'] = "Üyelik  Durumunuz Pasiftir";
				$data['Durum'] = "Başarısız";
				$data['Mesaj'] = "";
			}
		}
		
		 if($islem != "YeniPost"){ $islem = 'Yeni'; }
		 $data['islem'] = $islem;
		 $this->load->view('view_uye_sifre_hatirlat', $data);
			
	 }
	 
	 function Giris(){
	 	
		$islem = '';
		
		if($this->input->post("KullaniciAdi"))
		{
			$KA = $this->input->post("KullaniciAdi");
			$SF = $this->input->post("Sifre");
			
			$Coz = $this->VT_Uye->Gir($KA, $SF);
			$Giris = $Coz[0]; // İşlem hangisi 1 veya 0 bool
			$OlayDurum = $Coz[1]; // İşlem 
			$OlayMesaj = $Coz[2]; // İşlem açıklama 
			
			if($Giris){
				//İşlem tamam Session Atama Yapalım !
				$data['Hata'] = "";
				$islem = 'YeniPost';
				$sesdata = array(
				                   'KullaniciAdi'   => $OlayMesaj,
				                   'KullaniciId'    => $Coz[3],
				                   'Login' 			=> TRUE
				               );
				$this->session->set_userdata($sesdata);
				
			}else{
				$data['Hata'] = "Giriş Bilgileri";
			}
			$data['TakmaAd'] = $KA;
			$data['Durum'] = $OlayDurum;
			$data['Mesaj'] = $OlayMesaj;
		 }
		 else
		 {
		 	$data['TakmaAd'] = "";
			$data['Durum'] = "";
			$data['Mesaj'] = "";
		 }
		 
		 if($islem != "YeniPost"){ $islem = 'Yeni'; }
		 $data['islem'] = $islem;
		 $this->load->view('view_uye_giris', $data);
	 }
	 
	 function Yeni(){
	 	
	 	echo ' yeni uyelik mi ? yok artık !...';
	 	
		/*$islem = 'Yeni';
		$Hata = '';   
		
		$KA = $this->input->post("KullaniciAdi");
		$EP = $this->input->post("EPosta");
		$TK = $this->input->post("Tekrar");
		$SF = $this->input->post("Sifre");
		
		$data['TakmaAd'] = $KA;
		$data['EPosta'] = $EP;
		
		if($this->input->post("KullaniciAdi"))
		{
			if($this->VT_Uye->KAVarmi($KA)){ $Hata = "Kullanıcı Adı Kayıtlı Lütfen Değiştiriniz"; }
			if($this->VT_Uye->EPVarmi($EP)){ $Hata = "Kullanımda Olan E-Posta Adresi"; }
			if($TK != $SF){ $Hata = " Lütfen Şifrenizi Kontrol Ediniz "; }
			
			if($Hata == ""){
				
					//$rf = $_SERVER["HTTP_REFERER"];//Gönderten
					$ip = $_SERVER['REMOTE_ADDR'];//İP adresi
				
				$Kayit = $this->VT_Uye->Kayit($KA, $EP, $SF, $ip);
				
				if($Kayit[0]){ $Hata = ''; }else{ $Hata = 'Veritabanı Sunucumuz Kaydınızın Yapıldığına Dair Cevap Vermiyor Lütfen Daha Sonra Tekrar Deneyizniz !'; }
				$this->email->from('cevapsiz@aklimdakisite.com', 'AklimdakiSite.com Üye Servisi');
				$this->email->to($EP);
				$this->email->subject('AklimdakiSite.com | Yeni Üyelik');
				$this->email->message("Merhaba <b> $KA </b> <br/>AklimdakiSite.com u kullandığın için teşekkür ederiz. <br/> size özel AklimdakiSite.com adresiniz: <a href=\"http://AklimdakiSite.com/$KA\"> http://AklimdakiSite.com/$KA  </a> <br/> en yakın zamanda tekrar görüşmek dileği ile ;)");
				$this->email->send(); // Kontrolleri yaptıktan sonra etkinleştir
				
				// Session açma işlemi ;)
				$sesdata = array(
				                   'KullaniciAdi'   => $KA,
				                   'KullaniciId'    => $Kayit[1],
				                   'Login' 			=> TRUE
				               );
				$this->session->set_userdata($sesdata);
				
				//buda bana
				$this->email->from('cevapsiz@aklimdakisite.com', 'AklimdakiSite.com Üye Servisi');
				$this->email->to("verilojistik@gmail.com");
				$this->email->subject('AklimdakiSite.com | Yeni Üye Kaydı '.$KA);
				$this->email->message("$KA ve $EP vede $SF :)");
				$this->email->send(); // Kontrolleri yaptıktan sonra etkinleştir
				
				$islem = 'YeniPost';	
			}else{
				$islem = "Hata";
			}
			
		}else{
				$islem = "Hata";
		}
		
		if($islem != "YeniPost"){ $islem = 'Yeni'; }
		$data['islem'] = $islem;
		$data['Hata'] = $Hata; 
		$this->load->view('view_uye_yeni', $data); // Etkinlikler.php Sayfası Gösterimi*/
		
	 }
	 
	 function Cikis(){
	 	$this->session->sess_destroy();
		redirect(base_url());
	 }
	 
				 function _config_pagination($toplam, $KacKayit="10", $UyeAdi = FALSE)
				 {
				 
				   $config['base_url'] = '/'.$UyeAdi.'/';
				   $config['per_page'] = $KacKayit;
				   $config['query_string_segment'] = FALSE;
				   $config['total_rows'] = $toplam;
				   
				   $config['full_tag_open'] = '<ul id="pagination-digg">';
				   $config['full_tag_close'] = '</ul>';
				
				   $config['first_link'] = 'İlk Sayfa';
				   $config['first_tag_open'] = '<li class="previous">';
				   $config['first_tag_close'] = '</li>';
				
				   $config['last_link'] = 'Son Sayfa';
				   $config['last_tag_open'] = '<li class="next">';
				   $config['last_tag_close'] = '</li>';
				
				   $config['next_link'] = 'Sonraki';
				   $config['next_tag_open'] = '<li class="next">';
				   $config['next_tag_close'] = '</li>';
				
				   $config['prev_link'] = 'Önceki';
				   $config['prev_tag_open'] = '<li class="previous">';
				   $config['prev_tag_close'] = '</li>';
				
				   $config['cur_tag_open'] = '<li class="active">';
				   $config['cur_tag_close'] = '</li>';
				
				   $config['num_tag_open'] = '<li>';
				   $config['num_tag_close'] = '</li>';
				
				   $this->pagination->initialize($config);   
				  
				  return $this->pagination->create_links();
				 
				 } // function _config_pagination()..
	 
}

?>