

CREATE TABLE `_siteler_url` (
  `SiteId` int(11) NOT NULL AUTO_INCREMENT,
  `UyeId` int(11) NOT NULL DEFAULT '1',
  `KisaLink` varchar(16) NOT NULL COMMENT 'http://kl.gen.tr den sonra geliyor ;)',
  `SiteUrl` text NOT NULL,
  `Kategori` text NOT NULL COMMENT 'Kategori Id leri burada',
  `Baslik` varchar(512) NOT NULL,
  `Aciklama` varchar(512) NOT NULL,
  `KisiyeOzel` int(1) NOT NULL DEFAULT '1' COMMENT 'Cümle aleme gözüksün 1, gözükmesin 0',
  `Tarih` varchar(10) NOT NULL,
  PRIMARY KEY (`SiteId`),
  KEY `UyeId` (`KisaLink`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `_uye_sifre_hatirlat` (
  `SifreHatilatId` int(11) NOT NULL AUTO_INCREMENT,
  `UyeId` int(11) NOT NULL,
  `Sifre` varchar(6) NOT NULL,
  `Durum` int(1) NOT NULL,
  PRIMARY KEY (`SifreHatilatId`),
  KEY `KullaniciId` (`UyeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `_uye` (
  `UyeId` int(11) NOT NULL AUTO_INCREMENT,
  `IsimSoyisim` varchar(64) NOT NULL,
  `TakmaAdUrl` varchar(128) NOT NULL COMMENT 'Bu alan takma adı, Aynı Zamanda Url si olacaktır !',
  `EPosta` varchar(128) NOT NULL,
  `Sifre` varchar(128) NOT NULL,
  `Durum` int(1) NOT NULL DEFAULT '1',
  `DurumAciklama` varchar(256) NOT NULL,
  `ListePaylas` int(1) NOT NULL DEFAULT '1' COMMENT 'Liste Url le lerini aç kapat',
  `AnaUrlPaylas` int(1) NOT NULL DEFAULT '2' COMMENT '0> kapalı, 1 Sadece AnaSayfaları paylas, 2 > her ikiside paylaşımda',
  `KayitIp` varchar(128) NOT NULL DEFAULT '0',
  `KayitTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UyeId`),
  KEY `UrlTusCalisma` (`KayitIp`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;
