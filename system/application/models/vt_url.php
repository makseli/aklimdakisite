<?php
    
class VT_Url extends Model {

    function __construct()
    {
        parent::Model();
    }

	function Kayit($UyeId, $Url = false, $Baslik = false, $KisaLnk){
		
		$Bugun = date("Y.m.d");
		
		$data = array(
		               'UyeId' 		=> $UyeId ,
		               'SiteUrl' 	=> $Url ,
		               'Baslik' 	=> $Baslik,
					   'KisaLink' 	=> $KisaLnk,
					   'Tarih'		=> $Bugun
		            );
		
		$kueri = $this->db->insert('_siteler_url', $data); 
		return $kueri; 
	}
	
	// $this->vt_url->TagKayit($KullaniciId, $Title, $Aciklama, $Kategori, $Ozel);
	function TagKayit($UyeId, $Title = false, $Aciklama = false, $Kategori  = false, $Ozel = false, $SiteUrl)
	{
		
		//echo 'Baslik'.$Title.' || Aciklama '.$Aciklama.' || Kategori '.$Kategori.' || KisiyeOzel '.$Ozel.' || SiteUrl '.$SiteUrl.' || UyeId '.$UyeId;
		
			$data = array(
			               'Baslik' => $Title,
						   'Aciklama' => $Aciklama,
			               'Kategori' => $Kategori,
			               'KisiyeOzel' => $Ozel
			            );
			
			$kueri = $this->db->where('UyeId', $UyeId);
			$kueri = $this->db->where('SiteUrl', $SiteUrl);
			$kueri = $this->db->update('_siteler_url', $data); 
			
			return $kueri;
	}
	
}