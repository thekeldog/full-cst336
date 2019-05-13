-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: soccer_dat
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `league`
--

DROP TABLE IF EXISTS `league`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `league` (
  `identifier` varchar(32) CHARACTER SET utf16 NOT NULL,
  `league_slug` varchar(64) CHARACTER SET utf16 NOT NULL,
  `name` varchar(64) CHARACTER SET utf16 NOT NULL,
  `nation` varchar(64) CHARACTER SET utf16 NOT NULL,
  `level` varchar(16) CHARACTER SET utf16 NOT NULL,
  `federation` varchar(64) CHARACTER SET utf16 NOT NULL,
  `cup` varchar(16) CHARACTER SET utf16 NOT NULL,
  `seasons_available` varchar(16) CHARACTER SET utf16 NOT NULL,
  `first_season` varchar(16) CHARACTER SET utf16 NOT NULL,
  `most_recent_season` varchar(16) CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `league`
--

LOCK TABLES `league` WRITE;
/*!40000 ALTER TABLE `league` DISABLE KEYS */;
INSERT INTO `league` VALUES ('350ce36c95c4b92d2e5428f52da3b170','serie-a-brasileiro','Campeonato Brasileiro Série A','Brasil','1','UEFA','False','1','15-16','15-16'),('726a53a8c50d6c7a66fe0ab16bdf9bb1','premier-league','Premier League','England','1','UEFA','False','4','15-16','18-19'),('8e7fa444c4b60383727fb61fcc6aa387','bundesliga','Bundesliga','Germany','1','UEFA','False','3','15-16','18-19'),('8j17lcoic2uyv5qd7ctkozxop4osftj6','liga','Liga','Spain','1','UEFA','False','3','16-17','18-19'),('ahvto8wwtvpwniwr4fvkqbjjmslqybe9','europa-league','Europa League','Europe','1','UEFA','True','1','17-18','17-18'),('bc425f51d5ee924580c35c38da138de8','serie-a','Serie A','Italy','1','UEFA','False','19','00-01','18-19'),('ea698a964c25e6992973c205cf0e88de','uefa-euro-2016','UEFA EURO 2016 final tour','France','1','UEFA','True','1','16','16'),('eff6271f4bc64e9d53acefd95dfb5fdd','serie-b','Serie B','Italy','2','UEFA','False','4','15-16','18-19'),('mcdqy0nug1d1thpmacfzhtyc3gn7venk','champions-league','Champions League','Europe','1','UEFA','True','1','17-18','17-18'),('pn9py9lbvzy0m0aqejadq1xh4pamwfhx','serie-c-gruppo-a','Serie C - Gruppo A','Italy','3','UEFA','False','1','17-18','17-18'),('qpmsnsiolyrlonrqgyctzckur8az8vts','eredivisie','Eredivisie','Netherlands','1','UEFA','False','3','16-17','18-19'),('tlxz4kz9fmfi2fo68jpko9hqa5nztzac','serie-c-gruppo-c','Serie C - Gruppo A','Italy','3','UEFA','False','1','17-18','17-18'),('u8p4cqhg0ksvklxrjwxesyumnjjlfayw','ligue1','Ligue 1','France','1','UEFA','False','2','17-18','18-19'),('vw04i215grhakrkftssddy17pgmwhkka','serie-c-gruppo-b','Serie C - Gruppo A','Italy','3','UEFA','False','1','17-18','17-18'),('yxqxfngjxwrnrafghjthxea3rrn87is8','coppa-italia','Coppa Italia','Italy','1','UEFA','True','1','17-18','17-18');
/*!40000 ALTER TABLE `league` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `Id` varchar(64) CHARACTER SET utf16 NOT NULL,
  `team_name` varchar(64) CHARACTER SET utf16 NOT NULL,
  `league_slug` varchar(64) CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES ('0456d461197eedec7066eeb13222d96c','Flamengo','serie-a-brasileiro'),('08eba0a4f9cbaf35bab92b774fa356b9','Lanciano','serie-b'),('093082947d160280e489703412544edf','Figueirense','serie-a-brasileiro'),('0a3110a02a99b1f5a0d550c12a58094a','Sassuolo','serie-a'),('0ae159cdaae8265157481a96657a6f89','Brescia','serie-a'),('0aryookccvrpntfybfzmfraczw7xvmur','NAC Breda','eredivisie'),('0c8c40eaadddd1c06c929361809ca328','Ancona','serie-a'),('0ekikk7scjlhk5xongwvphsavbhmsmmz','Prato','serie-c-gruppo-a'),('0f49ff60727073d888e4b22adda0ae15','Perugia','serie-a'),('0f8900d1c8b84f7708ac13322708f9cc','Vasco da Gama','serie-a-brasileiro'),('117465ea8982e9e93c31e88d6d482088','Vicenza','serie-a'),('1577fdf30017a9b12005d78671613249','Bologna','serie-a'),('16d44c9f6c49c3354d16c050f1883e0d','Empoli','serie-a'),('19e4169544e5368344f0f18c0554a2ce','Ascoli','serie-a'),('1b89b8ac6fcde42f8d1cb62deb1d0c26','Fiorentina','serie-a'),('1e1934a85ae61698b1c87d2a6ae45b60','Palmeiras','serie-a-brasileiro'),('1oldvgk9vshzrmudwgghdkmypvnflph7','Mestre','serie-c-gruppo-b'),('1sq2rq5qloeabznscrhkrsx0zl1jj59b','Amiens','ligue1'),('1vylatn9al3aw8tbxlja2u8peubokojo','Dusseldorf','bundesliga'),('2018394b27ed7ddc766023088a9f4264','Sampdoria','serie-a'),('23aaca2cafb6306a00e66642f8805804','Roma','serie-a'),('2497c925cb00486bf278c8d7711bc5ed','Catania','serie-a'),('2efdb9f793967b8276f6a91654be1bc3','Latina','serie-b'),('2k5rtufkyhql4gkto2rbkjwf6j19hal8','AZ','eredivisie'),('2qxbceqcfwzpvjwula9pnfy30eollcuo','Villarreal','liga'),('3691ae1ebc8c24a00bb4688acda03409','Trapani','serie-b'),('37b4bfe3f182fd773b36347352de8f4b','Siena','serie-a'),('3mxwy6zuzdxhf8ahttstpbejzgvqbuyw','Sicula Leonzio','serie-c-gruppo-c'),('3prtjmfogrk8qcxmkgwdp5holo9dsksu','Tolosa','ligue1'),('4bb27720ae013189345e659a991e5bcd','Grêmio','serie-a-brasileiro'),('4cjnmvlocc3lpuvq77mmknpbr6gw6vzg','Burnley','premier-league'),('4dsfvodecrfgzxzcg3wlavlmiwxd0eqg','Racing Strasburgo','ligue1'),('4f788e0a45c2f9a93ae97e72e4ecc773','Chapecoense','serie-a-brasileiro'),('54ada92e32c1b0756864fdd5fef6991e','Udinese','serie-a'),('563bd888f9e2d0825e546304ae338e13','Coritiba','serie-a-brasileiro'),('5a0e87029f75dd2aa3c9b93cb0fce4b5','Corinthians','serie-a-brasileiro'),('5d43758dc933f12f98f2e50d045eae77','Santos','serie-a-brasileiro'),('5e5b5b6d0ea8d26e071067249d6d6982','Virtus Entella','serie-b'),('6854c4d9f2b094f77d58d8aed88e8d32','Joinville','serie-a-brasileiro'),('691f5aae875365927e918fe8cdf59de2','Inter','serie-a'),('6979d02147db9e5338b44adcd59ca55c','Fluminense','serie-a-brasileiro'),('6b11a3efb372a066327f326ac476b7f7','Lazio','serie-a'),('6cxcxvvgupsoe2hcmrk3yw0uiyfoigoj','Lione','ligue1'),('6d2f73346cc68885cb1f51b394bee1b2','Salernitana','serie-b'),('73a1934a26d5fdd1698d89a01f8cffa0','Chievo','serie-a'),('76a4f28c186a6c496cb6b61cb38d44c0','Sport','serie-a-brasileiro'),('792851482de0aa17e6c91911a66f2d7d','Milan','serie-a'),('7bc2ca6dca41749be98aee22cf74368b','Goiás','serie-a-brasileiro'),('7ced8f6dfe60b025d942985576de0341','São Paulo','serie-a-brasileiro'),('7d7e75a04b9be1e1b3fb0b1970a3037f','Internacional','serie-a-brasileiro'),('83557d815bc9a19e60ac117be02fde2b','Piacenza','serie-a'),('88bce665d5b4fdd00a586cf5bbb052fa','AC Venezia 1907','serie-a'),('895bf1c2ff3ea62ee8fbc77542762a92','Reggina','serie-a'),('8ae59550d608eef9e093611692fdc2ea','Livorno','serie-a'),('8ayhpfnzn6m97xs6ntnib49sop9cl0iz','Huddersfield Town','premier-league'),('8c3a3ebd132fa0b15267dadd62c9337e','Atalanta','serie-a'),('8dd22681d945ebc7981247112ef7c8e2','Crotone','serie-a'),('92379aa1a5496b1f6a20fad71bf460a6','Lecce','serie-a'),('9501075e9e2ca088c58c9a6889465d34','Atletico Mineiro','serie-a-brasileiro'),('9661184c40f03bcada5312aa2a424c04','Parma','serie-a'),('9b0445663470c52655227951323c785e','Modena','serie-a'),('9bc9dbb031a54742bf59dffc89ab0ee1','Pescara','serie-a'),('9c247185ac49a4e94a6a535c7c8924b4','Cesena','serie-a'),('9ikkxnlp1dibrljaslzz4xenvxcg0v3r','Colonia','bundesliga'),('9spskkugwru9ppetglcva3ngpkx04ken','Roda','eredivisie'),('a01b1770f7e30769dc84bc0e08169ef3','Messina','serie-a'),('a0iakiyfsbrvge1kldngzouwab2q3htl','Leganes','liga'),('a5153e30fcd8ebacb360a97b7443727b','Verona','serie-a'),('a5zc4rubecosfhagmnkqxgzvkxw7jetu','Juve Stabia','serie-c-gruppo-c'),('a6fe5380cb5f9cadba7b5b151ccd203a','Bari','serie-a'),('a9ef824ba73b0a57e982df21467c3efc','Juventus','serie-a'),('adnmom6x37fhkgdariftnwi3ng7l9y3o','Watford','premier-league'),('akppwaoizlxbsa66oupfkawevutbnjxp','Liverpool','premier-league'),('aqjyt3covmnorwvt8femdptnkqodeg1q','Fidelis Andria','serie-c-gruppo-c'),('awk2yysnh9ldw0iawi4ucmip4ejoiy6t','Gavorrano','serie-c-gruppo-a'),('ayffheqlvsrgnd5hwji78nmzyndc1ebj','Everton','premier-league'),('b14c3bca5c4967c31e8a5eca3075d07e','Novara','serie-a'),('b26bc19b8b90f7b44d0e05fe2b3c438e','Spezia','serie-b'),('b7f5f1b1be693a8e1c5c3aa5aee2a05b','Napoli','serie-a'),('baxnmqhdsygqpkkxz1w4fwqaelnjb3gf','Santarcangelo','serie-c-gruppo-b'),('bbf1884038fee9ecbffb7c0a4c5c97d0','Cruzeiro','serie-a-brasileiro'),('bc41e9a4fe7929e83acdaece03f2c56b','Genoa','serie-a'),('beb010c6464f308d18043eb8cf4a1481','Ternana','serie-b'),('bgcgd1uhamnnjv9qrllvibxbtc0k7nqk','Friburgo','bundesliga'),('blfamr89lxeyywtsraiqzq5p5zuz57i6','Chelsea','premier-league'),('bnbnactqshvxgdniouqfbvjoasstcbxm','Magonza','bundesliga'),('bqukf4whaqlrfkwxgsksv9zbrvzvuan7','Ravenna','serie-c-gruppo-b'),('bt0mtnoesq29j0fotwocnjs1i40mw0tn','Sporting Gijón','liga'),('c37f33b07c0ddc7148a0dba9c7f12279','Cagliari','serie-a'),('c3okvbq0e1yb8q2kfye4dcvgqduoglzo','Eibar','liga'),('c3zn3calz374bfk0ssvjqmvt1au6em01','Siviglia','liga'),('cagppzg80cusmnzs85ty4sxpvqxrrnnx','Reggiana','serie-c-gruppo-b'),('cbzdecozqy00jcsrmxiikccpxbmnfflf','Triestina','serie-c-gruppo-b'),('cd4iyzu9y04bqk51lpsju6kdizr3dfq2','Heracles Almelo','eredivisie'),('cfvzxt37vzv8mdvencpzlnmbujxjwkxp','Virtus Francavilla','serie-c-gruppo-c'),('cj0q3pxkxz9swwxryurzvwpdts10hszy','Granada','liga'),('cyphuoz1fbre3paq4yvlsellmp6sjwdk','Spal','serie-a'),('d4a33f95b8886f6d91afe76666e10224','Ponte Preta','serie-a-brasileiro'),('daa06ddb0cb22f8617eba92fb757e45e','Palermo','serie-a'),('dfd514407e78fb4fc2eb9a52b2dd6f7e','Carpi','serie-a'),('djx9rwtysdkljhha4owmtqtamvft9zdd','Bor Dortmund','bundesliga'),('drasvl3uc9mlamwepokp3x9zf1w4mrzn','Pro Piacenza','serie-c-gruppo-a'),('dthydwo5hutq0pzlrvuevsonnz99a2bt','Real Sociedad','liga'),('duxhyfawfyhfhdrttmdn651gqswz1kjo','Lipsia','bundesliga'),('dxdqyy0k3en5vlib85gfdajb1qgcgcfl','Wolfsburg','bundesliga'),('ee06a5e816bc0d5527bf7c2f4ff47732','Avellino','serie-b'),('efshcgidxw03s8gj8gyeuwaanfkprxky','Bassano','serie-c-gruppo-b'),('emruloy6esuxm93ukxazhqlnskdtb6l1','Pisa','serie-b'),('esmsxerk5hipmghi7yrpctld5ayhldj1','Ol. Marsiglia','ligue1'),('ethn1l67pxbuumri86iyt3br3aoyvnz9','Crystal Palace','premier-league'),('f3b3066e1309bbd8d57611602674feb7','Treviso','serie-a'),('f405b33b8089c613ef4e9880b43b4bd4','Como','serie-a'),('f785e73159440771597369d52c1b0a00','Pro Vercelli','serie-b'),('fc667e43d834f6e4e49e722e67de8e02','Avai','serie-a-brasileiro'),('fd44979f6395b22dee799df6d3ef52ce','Atletico Paranaense','serie-a-brasileiro'),('fe6e0zt76gaejrbjuq662ayqvxln4bmh','Barcellona','liga'),('fe88d384ba12a694f98b8aab8da04709','Frosinone','serie-a'),('ff5fede07290d13e5f85cca4f9dd01c1','Torino','serie-a'),('fhx1bjpqnrr3uwevbxhffjwomxtyhfuq','Saint-Étienne','ligue1'),('fqbr4kophvl89tow9irc35ne6lterglu','Hannover','bundesliga'),('fs7dl7rsxh0u85qfz0l0gtisanety6hk','Pontedera','serie-c-gruppo-a'),('fw3ok0fty95tz0ydspi2g5yzghm5exdj','Real Madrid','liga'),('fwublaqs28vzd2ksnlur9ygm4hfeydjz','Nizza','ligue1'),('g1htydxo3x1rjsxhkysudhmzkk1wdqdr','Siracusa','serie-c-gruppo-c'),('gd9iiyjvehcktyhp2qz14fvidddgkhtp','Ajax','eredivisie'),('ggulnzzce2unibhbkcnrixtnmyfm7tcq','Utrecht','eredivisie'),('gtmfhgwvzgt1eqo8p7ayq6vyapauzaq1','Alessandria','serie-c-gruppo-a'),('h8j54zwbdnlwpqqdze47pypthkt1dyzy','Eintracht','bundesliga'),('hdmswsecjowa3scigs1hiz1ifbkyslw5','Cardiff City','premier-league'),('hedehgktovgyr1tzyyvsa20nac9ahd5a','Monopoli','serie-c-gruppo-c'),('hkrkfydcsq4dx78g1bsv0v8uc7bkqxfx','Schalke','bundesliga'),('hnqbtarjduar19giygmp2vzfs95nmybb','Las Palmas','liga'),('hnyqmc3bvi56mavf1lxfv64kn50ejwxa','Arzachena','serie-c-gruppo-a'),('hsjlwwi2gkjevlq0mmt2mlkgj0vgfcyl','Sambenedettese','serie-c-gruppo-b'),('htkh0bupi4nvnrlzwyii4zdgofxzrfg2','GO Ahead','eredivisie'),('ibgjys7uhsmaxy7nfttzrmuspzefyd5r','Foggia','serie-b'),('ifjdrlucvahfevrsshdqptadbslbbskk','Bordeaux','ligue1'),('ihf8ftgbqmhmopfxuw1o8gyppitifpzh','Arezzo','serie-c-gruppo-a'),('ivuslft2wq0kwyskydqqxja43mv5ofbx','Paris SG','ligue1'),('izwlavgq1ux7yr04h4aqjmmob6mb5odn','Real Valladolid','liga'),('jarkkvnw2yjxserhq6uyflnfxb80zjmm','Werder','bundesliga'),('jfcb3mrwldeebidgjohwtujvtasgqipu','Cittadella','serie-b'),('jhmz6orxi0ketcdtsgu1d6kmui6bck7g','Bisceglie','serie-c-gruppo-c'),('jm6h5x6rh34r1rz1reo7kt9wqf4pj1ig','Getafe','liga'),('jmuqdgqscvurogyemdkuo9panffwlexf','Hertha','bundesliga'),('jrtmmepzjrrv5bktak9oomtwfxptfuem','Deportivo','liga'),('k9owffhu1cnaux4mcdcny9smixpgbr8z','Pistoiese','serie-c-gruppo-a'),('kdrhmjjufk8em0fqjtaltym29v4dwhhb','Tottenham','premier-league'),('kfy1ubmszm0owil32bcvmzppsfrpzdlx','Digione','ligue1'),('kpfiahjj3w38cbfgxn5rewpfcczl6ubc','Nantes','ligue1'),('kywzms4a9knaaqq05ifijbywl4s8ay8g','West Bromwich','premier-league'),('kzubk67on3abljpfaxehefl1igrlt9uh','Metz','ligue1'),('l48mbl7oqnb3jkhncgn4whgtc5n9d2ks','Sunderland','premier-league'),('l7vewuf64g8cr9rone74zvz7xohwhi2q','Venlo','eredivisie'),('lgnz1t8g35leu2jbjogoqv2roe8kjc1t','NEC','eredivisie'),('lpmcxwfuv7ntb5h90amnc2kpl0qk4amm','Stoccarda','bundesliga'),('lsv7dpqmvad9c1vtuwj2bwm9rqncytor','Betis Balompie','liga'),('megarx0vnfc1ufyuztn7vmbzlx7gizni','Racing Fondi','serie-c-gruppo-c'),('mnvcd2mvtikfz6vfvq3y7znaw9hc5h6h','Cuneo','serie-c-gruppo-a'),('mxdeujb2zvmob4f02vngjhqk02ymlhzz','Zwolle','eredivisie'),('n5dwzheaeqlhp9nucubgfjkjmpbhevku','Osasuna','liga'),('n7nsdr8fbhtjfnimktwbqnkzjklorhxo','Matera','serie-c-gruppo-c'),('ngqghd5gteapt98gjbf1jt3d1oupet6z','Feralpisalò','serie-c-gruppo-b'),('nwtoem9vddp0pnsupqzlxyfrwkriv20f','Emmen','eredivisie'),('nzc6pxsty7hiyrvamg85laf8qhpmrjcp','Fortuna','eredivisie'),('olkpo4ekakvofxnd478rd1dii4hjfaax','Norimberga','bundesliga'),('onfnrnafxnulumznr1qwu9lqhjhfq1ow','Levante','liga'),('otsgas9tksigzykvoytyl4ginfez4mj8','Rennes','ligue1'),('ov5akmafiouzbqpil4mysq7shaagxm6m','Rayo','liga'),('oy55cniwjm7dgcbca6gn9ftr5gqnjx9e','M\'Gladbach','bundesliga'),('oysyc68zrritfhqj4an5fnlcdesapwop','Valencia','liga'),('pd8qxpyvhbtxy2n5piivnddpfyquhfiw','Twente','eredivisie'),('pe2emzcdhwvshbdkqvx0vvu00wlxb6dt','Caen','ligue1'),('pi3bwhuzo57ib3kysurbidmovyr5iobf','Sudtirol','serie-c-gruppo-b'),('ppkk2rs4xj0b09gcjse7dncbjjw5ce2f','Willem II','eredivisie'),('qbjroceg7uoxc3sqwcbmjfyzg7e7qbyy','Viterbese','serie-c-gruppo-a'),('qkvawtwwi5mvhnkwcpvdwymzqxw8lace','Troyes','ligue1'),('qleh8xrkshgx3vck7qdw9wakuyu7p70w','PSV','eredivisie'),('qljylgr6kik5ksgk7awgt8jztewtcguy','Heerenveen','eredivisie'),('qngf4xllztqc9ufhlodfcyw2foowq37v','Stoke City','premier-league'),('qtjxv9d71ntirsgpjbmeefda4gewdnd9','Man United','premier-league'),('qudxk6w5vg41uphoh7tt53kwbakvrkws','Brighton & Hove Albion','premier-league'),('qxtmrcmnovgms7onozveovg2nmnxlykt','Malaga','liga'),('r4xhp8c6tpedhrd9v14valjgye847oa5','ADO','eredivisie'),('r8f1qwd7bfjamo5p3tfncukcmj9amovh','Casertana','serie-c-gruppo-c'),('rfkszw2rywx9ydbxmeci1ltsspwu9w9e','Benevento','serie-a'),('roosbxygok9rmszvk3i8x12osw3a66yb','Fermana','serie-c-gruppo-b'),('rpimigiqittelecmdtcvx7egzvhv99sd','Pordenone','serie-c-gruppo-b'),('rwdmsofg8iurwsoh6jcrm9uapczrqtnb','Newcastle','premier-league'),('rwikb7xcvidp3ttrpvialetonqavm4qi','Wolverhampton','premier-league'),('rzdwbc1u7hyhjzpgbz1tk9fly0tvdc2r','Carrarese','serie-c-gruppo-a'),('s3gdgeu2hg7dn5teerz039lef1dorv0r','Espanyol','liga'),('s43zvsj2nykofbrki5muzrxjbekvw3oq','Leicester City','premier-league'),('sb5fhlwrtuqmuehwioecgxy3aqjzhsgt','Guingamp','ligue1'),('sdmfdoru0erqkrtu3vce8bu7t8qfpkha','Venezia','serie-b'),('sfzph69atv1dx9btuq0uux0filfobfvy','Rende','serie-c-gruppo-c'),('sncantrhxrnxhm8despt9ct4nsh0hfqp','Hoffenheim','bundesliga'),('sqr5ww5xsuulsypvukj6y01spuawdfpj','Alaves','liga'),('sr0iv0alcjpvf3lxkqtpck5dryddtlka','Celta Vigo','liga'),('sv7cv06j1g1ywndcorxc4nzlvyi35jx7','Cosenza','serie-b'),('tkabudsbiofrgrudgderbadnwrbfcvv8','Reims','ligue1'),('trw9iz9lkvdg0du0wvxssfi7d1h9lvdg','Hull City','premier-league'),('ubo6txgiva9mkgyajicqy70uj08v3glj','Feyenoord','eredivisie'),('uburpkzsxppcnstykfqhujnvjep7fkcu','Huesca','liga'),('uib3tekuw1rcay846oo1rjqlhaxq877g','West Ham','premier-league'),('uskk92ojo4eb2qlfaodhsfn1ptnquegi','Atl. Madrid','liga'),('uu6y9ogbchtv4kicklibikcecnq8qiy0','Athletic','liga'),('uuin0ankkhrohulbn0sazpzwioa5lclw','Catanzaro','serie-c-gruppo-c'),('vba10sc0qxvcg9gohpesbqco4a371xxb','Paganese','serie-c-gruppo-c'),('vc3mv3edpz3yhaml05n5c5r3ksx8bz94','Teramo','serie-c-gruppo-b'),('vq2vij33yb9vdy1q4qg1izoig3slihdg','Groningen','eredivisie'),('vtugbccw4fz4zberpnikmbxa96gru2jp','Fulham','premier-league'),('vvd2cquwb3copz6wydlkwtte0lpmbuyh','Lucchese','serie-c-gruppo-a'),('vwatf77myx1mns8harrwn5ttw69prta0','Girona','liga'),('vwukoorrrn05evkbgihedi7hfqoi9xrb','Bournemouth','premier-league'),('w3hrk7slzvc4pubhgbzm5sl7r1teffcv','Angers','ligue1'),('w7i7rixqdd0iuhk2jytneqsokylsdtfd','Monza','serie-c-gruppo-a'),('w8gasbpiifixfhobonqxm40xqdwscckb','Sparta Rotterdam','eredivisie'),('wbnlfprkojj5c2kky1ofbboku8ssr5kn','Middlesbrough','premier-league'),('wfshtzkpbmzvrgesqgwz6g68vab3ddtd','Olbia','serie-c-gruppo-a'),('wfx186yg8va80gxxuyyjmwqyue4aehaj','Lilla','ligue1'),('wp34ipmpb9mu3lu39qjfua40wlo14apt','Vitesse','eredivisie'),('wtisfy1sbyfixbmm07opmocriethcdy4','Monaco','ligue1'),('wtjodr5eddguphaqo4ynrffu7nvanenf','Excelsior','eredivisie'),('wwqemgj3hiif2x1qqf3hd1q9ty34euiv','Fano','serie-c-gruppo-b'),('wx02iutyutvyun2vkcxwhogennhsokyi','Montpellier','ligue1'),('x8zsxyto8ep3d2lw3ghwla1re4r5jmda','Augusta','bundesliga'),('xgxwdwbay5pa2i7kvjyinz2e5pepupwm','Cremonese','serie-b'),('xut5tuxudprx5sflsgrfj2izbzjmffvs','Renate','serie-c-gruppo-b'),('xy8xez8msmv4qucyabkhhk4rqbimnprx','Man City','premier-league'),('yaernjoxufr1knn8eimqopexdx6bslqx','Giana Erminio','serie-c-gruppo-a'),('yhkj7gpl7qihwfhop3fmftqqzofffoln','Nimes','ligue1'),('yhlenszynlnphzvjzk3lvajanprrqnpy','Akragas','serie-c-gruppo-c'),('ypq0zer1yk8cjympbswu4qapxrjeqjfw','Bayern','bundesliga'),('yqeke8r7uobxccx1hjfe6inzeyyaungd','Amburgo','bundesliga'),('ysfn7wu5zmd91nomttd4qxumxq0r6wsj','Gubbio','serie-c-gruppo-b'),('yu6jdoyiqeoo5d0ed1vwm53rbfsbzveg','Padova','serie-b'),('zhwpc025pq8hxjucxifwkjzgrv42m6zo','Swansea City','premier-league'),('zsascozfdrwxxjsrp27o9pbbwfpy6000','Albinoleffe','serie-c-gruppo-b'),('zxvu692gs1bunfquz1hvelrdmrf4iwdg','Bayer','bundesliga'),('zygiwlhkuidaovewgbhdk8p0ojhps7m2','Southampton','premier-league'),('zymx5xdh4knl5dwbcfv3kszge9d8brnw','Arsenal','premier-league'),('zzjl8nd2lxyrbubbckludggba6k2jt2g','Graafschap','eredivisie');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `subscription` varchar(32) COLLATE utf8_bin NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('john@john.com','yomomma','platinum',1),('whaat','$2y$11$SwdjNRCqnDdkVsQ.R8CXJO.P.vQ4Napoa.koJnsRn1/dTeElRHP/q','Bronze',2),('','$2y$11$2fwrd9hf1CXIJZC1p8wz7OTklAvFTvUtaylrmlyWxY22RyVeeNC82','Plat',3),('secret','$2y$11$C8/fuzLhcHw1JhUMutGpJOnDlpzaOKi4w4lKPQLCa70bKHL62cqku','Plat',4),('and','$2y$11$uD7LhBgQheVA4iSPAKWMX.9LwK4DFmffDC4bUAuX6hB2yNoqpzKJO','Bronze',5),('blenz8','$2y$11$QIdW219FyjNAJd3.ArsMNOSa6U8KAfpUYqw3Lx10OTYUvFFeZWYkO','Gold',6),('whatever','$2y$11$5mT6Hf1ZF1g7QekFRNDbJOHx8Dp9Efs9UoUKXg9ODqsei.m7kwXJC','Plat',7),('new','$2y$11$HOY5F1yDbONqTI4hYpwOHOkLwKgLtiCYLt775eaY9GPBSH/J4nIjK','Bronze',8),('','$2y$11$7bLlHkBc/0ZuKlECO6jVLOzX3QyznSsZtRCzoxZNXqa/taMYj3S96','Bronze',9),('','$2y$11$Yh6Zh4ahUjymELyGiQ1sWeGuz56kYN8Ok5TviI5SNtnHcBnJOB3X.','Bronze',10),('','$2y$11$.macNedeRM/4utOmS3FTo.Kj48qoH.S94NjYfP9KrAp952CopvDQm','Bronze',11),('newnew','$2y$11$KaJJJzzVQWLfb/p3OES6V.QmyDv3OC/WDvbzF./OKyVIZ5sCwftEK','Plat',12),('nonenone','$2y$11$byELR/cNOs40bZwQoLNQJusYZZe4KJ7uq/5dWKXxrtnzYdxjIvkpu','Bronze',13),('hellotherejohnny','$2y$11$L0v8unEHa2Vb0mGeAS7OK.1x6T0rQJoH0iwKPj.5x9WQkcRfuDvlC','Plat',14);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-11  5:05:42
