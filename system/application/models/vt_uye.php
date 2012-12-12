<?php
    
class VT_Uye extends Model {

    function __construct()
    {
        parent::Model();
    }
	
	function SifreHatir($KA){
		
		$query = $this->db->query("SELECT * FROM _uye WHERE EPosta='$KA'");
		$row = $query->row();
		$VKA = $row->EPosta;
		$VDr = $row->Durum;
		$UyeId = $row->UyeId;
		$DurumAciklama = $row->DurumAciklama;
		$IsimSoyisim = $row->IsimSoyisim;
		
		
		
		if($query->num_rows() > 0)
		{
			//*echo $UyeId;
			
			if($VDr == 0){
				return array(0, "Durum Pasif", $DurumAciklama);
			}
			else
			{
				if($KA == $VKA){
					
					// Yeni Rand Şifreyi kaydetme
					$Sifre = sha1(md5($VKA.'_TR_VeriLojistik_AklimdakiSite'));
					$YeniSifre = substr($Sifre, 0, 6);
					$data = array(
					               'UyeId' =>  $UyeId,
					               'Sifre' => $YeniSifre ,
					               'Durum' => 0
					            );
					$kueri = $this->db->insert('_uye_sifre_hatirlat', $data);
					 
					return array(1, "Başarılı", $IsimSoyisim, $YeniSifre);
					
				}else{
					return array(0, "Başarısız", "Kullanıcı Adı Bulunamadı !");
				}
			}
		}
	}
 
    function Gir($KA, $SF)
    {
		$query = $this->db->query("SELECT DurumAciklama, IsimSoyisim, Sifre, UyeId, Durum  FROM _uye WHERE EPosta='$KA'");
		$row = $query->row();
		$VSf = $row->Sifre;
		$VDr = $row->Durum;
		
		if($query->num_rows() > 0)
		{
			if($VDr == 0){
				return array(0, "Durum Pasif", $row->DurumAciklama);
			}
			else
			{
				if(sha1(md5($KA) == $VSf)){
					return array(1, "Başarılı", $row->IsimSoyisim, $row->UyeId);
				}else{
					return array(0, "Başarısız", "Şifre Hatalı");
				}
			}
		}
		else
		{
			return array(0, "Kullanıcı Yok", "<b>".$KA."</b> isimli kullanıcı bulunamadı !");
		}
		
    }
	
    function EPVarmi($Deger)
    {
		$query = $this->db->query("SELECT EPosta FROM _uye WHERE EPosta='$Deger'");
		return $query->num_rows(); 
    }
	
    function KAVarmi($Deger)
    {
		$query = $this->db->query("SELECT TakmaAdUrl FROM _uye WHERE TakmaAdUrl='$Deger'");
		return $query->num_rows(); 
    }
	
	function Kayit($KA, $EP, $SF, $ipd){
		
		$data = array(
		               'TakmaAdUrl' => $KA ,
					   'IsimSoyisim' => $KA ,
		               'EPosta' => $EP ,
		               'Sifre' => sha1(md5($SF)),
					   'KayitIp' => $ipd 
		            );
		
		$kueri = $this->db->insert('_uye', $data); 
		return array($kueri, $this->db->insert_id());
	}
	
}

	
?>