<?php
  
class VT_AnaSayfa extends Model {

    function __construct()
    {
        parent::Model();
    }
 
    function UrlListe($UyeAdi = FALSE, $sayfa = FALSE, $KacKayit = FALSE, $Tumu = "")
    {
    	
		if($UyeAdi != ""){
			$query = $this->db->query("SELECT UyeId FROM _uye WHERE TakmaAdUrl='$UyeAdi'");
			$row = $query->row();
			@$UyeId = $row->UyeId;
		}else{ $UyeId = 0; }
		
		//Üye Id Gelmişse 
		if($UyeId > 0)
		{ 
			$kueri = $this->db->where("UyeId", $UyeId); 
		}
		else
		{
			$kueri = $this->db->limit(20); 
		}
		
		
		
		//echo 'KK'.$KacKayit.'<br> sayfa:'.$sayfa;
		
		//Sayfalama içindir !
		if($KacKayit > 0){
			$kueri = $this->db->limit($KacKayit, $sayfa);
		}
		
		//Gizlileri de göstersin mi
		if($Tumu == ""){
			$kueri = $this->db->where("KisiyeOzel", 1);	
		}
		
		$kueri = $this->db->order_by("SiteId", "DESC");
		$kueri = $this->db->get("_siteler_url");


			if($UyeId > 0){
				if($Tumu == ""){ $Nkueri = $this->db->where("KisiyeOzel", 1); } 
				
				$Nkueri = $this->db->where("UyeId", $UyeId); 
				$Nkueri = $this->db->get("_siteler_url");
				$ToplamKayit = $Nkueri->num_rows();
				
			}else{ $ToplamKayit = 0; }
		
		return array($kueri->result_array(), $ToplamKayit);		
    }
	
}

?>