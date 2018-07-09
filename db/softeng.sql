-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: softeng
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`city_name`)
) ENGINE=InnoDB AUTO_INCREMENT=438 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (139,' آبادان'),(182,' آباده'),(69,' آبدانان'),(206,' آبيك'),(1,' آذرشهر'),(43,' آران و بيدگل'),(256,' آزادشهر'),(267,' آستارا'),(268,' آستانه اشرفيه'),(399,' آشتيان'),(257,' آق قلا'),(382,' آمل'),(428,' ابركوه'),(416,' ابوموسي'),(159,' ابهر'),(400,' اراك'),(34,' اردبيل'),(44,' اردستان'),(429,' اردكان'),(95,' اردل'),(183,' ارسنجان'),(20,' اروميه'),(371,' ازنا'),(184,' استهبان'),(420,' اسدآباد'),(133,' اسفراين'),(2,' اسكو'),(237,' اسلام آباد غرب'),(85,' اسلام شهر'),(21,' اشنويه'),(45,' اصفهان'),(185,' اقليد'),(207,' البرز'),(380,' الشتر'),(372,' اليگودرز'),(269,' املش'),(140,' اميديه'),(141,' انديمشك'),(3,' اهر'),(142,' اهواز'),(160,' ايجرود'),(143,' ايذه'),(171,' ايرانشهر'),(70,' ايلام'),(71,' ايوان'),(383,' بابل'),(384,' بابلسر'),(144,' باغ ملك'),(221,' بافت'),(430,' بافق'),(212,' بانه'),(109,' بجستان'),(134,' بجنورد'),(46,' برخوار و ميمه'),(108,' برد سكن'),(222,' بردسير'),(373,' بروجرد'),(96,' بروجن'),(4,' بستان آباد'),(417,' بستك'),(223,' بم'),(5,' بناب'),(270,' بندر انزلي'),(259,' بندر تركمن'),(258,' بندر گز'),(411,' بندر لنگه'),(409,' بندرعباس'),(145,' بندرماهشهر'),(186,' بوانات'),(208,' بوئين زهرا'),(76,' بوشهر'),(22,' بوكان'),(251,' بوير احمد'),(421,' بهار'),(146,' بهبهان'),(385,' بهشهر'),(252,' بهمئي'),(213,' بيجار'),(101,' بيرجند'),(35,' بيله سوار'),(36,' پارس آباد'),(187,' پاسارگاد'),(86,' پاكدشت'),(238,' پاوه'),(374,' پلدختر'),(23,' پير انشهر'),(209,' تاكستان'),(110,' تايباد'),(6,' تبريز'),(111,' تحت جلگه'),(112,' تربت جام'),(113,' تربت حيدريه'),(431,' تفت'),(401,' تفرش'),(24,' تكاب'),(386,' تنكابن'),(77,' تنگستان'),(422,' تويسركان'),(87,' تهران'),(47,' تيران و كرون'),(239,' ثلاث باباجاني'),(135,' جاجرم'),(413,' جاسك'),(115,' جغتاي'),(7,' جلفا'),(78,' جم'),(240,' جوانرود'),(387,' جويبار'),(116,' جوين'),(188,' جهرم'),(224,' جيرفت'),(172,' چابهار'),(48,' چادگان'),(8,' چار اويماق'),(25,' چالدران'),(388,' چالوس'),(114,' چناران'),(415,' حاجي آباد'),(432,' خاتم'),(173,' خاش'),(161,' خدابنده'),(375,' خرم آباد'),(189,' خرم بيد'),(162,' خرمدره'),(147,' خرمشهر'),(37,' خلخال'),(117,' خليل آباد'),(419,' خمير'),(402,' خمين'),(49,' خميني شهر'),(190,' خنج'),(118,' خواف'),(50,' خوانسار'),(26,' خوي'),(191,' داراب'),(241,' دالاهو'),(166,' دامغان'),(119,' درگز'),(102,' درميان'),(72,' دره شهر'),(148,' دزفول'),(149,' دشت آزادگان'),(79,' دشتستان'),(80,' دشتي'),(377,' دلفان'),(174,' دلگان'),(403,' دليجان'),(88,' دماوند'),(253,' دنا'),(376,' دورود'),(73,' دهلران'),(81,' دير'),(82,' ديلم'),(214,' ديواندره'),(389,' رامسر'),(150,' رامشير'),(151,' رامهرمز'),(260,' راميان'),(225,' راور'),(89,' رباط كريم'),(423,' رزن'),(271,' رشت'),(120,' رشتخوار'),(272,' رضوانشهر'),(226,' رفسنجان'),(242,' روانسر'),(412,' رودان-دهبارز'),(273,' رودبار'),(227,' رودبار جنوب'),(274,' رودسر'),(90,' ري'),(175,' زابل'),(121,' زاوه'),(176,' زاهدان'),(228,' زرند'),(404,' زرنديه'),(192,' زرين دشت'),(163,' زنجان'),(177,' زهك'),(390,' ساري'),(65,' ساوجبلاق'),(405,' ساوه'),(122,' سبزوار'),(193,' سپيدان'),(104,' سر بيشه'),(243,' سر پل ذهاب'),(9,' سراب'),(178,' سراوان'),(103,' سرايان'),(179,' سرباز'),(123,' سرخس'),(27,' سردشت'),(215,' سروآباد'),(216,' سقز'),(378,' سلسله'),(28,' سلماس'),(167,' سمنان'),(51,' سميرم'),(54,' سميرم سفلي'),(244,' سنقر'),(217,' سنندج'),(391,' سوادكوه'),(275,' سياهكل'),(229,' سيرجان'),(152,' شادگان'),(406,' شازند'),(168,' شاهرود'),(29,' شاهين دژ'),(52,' شاهين شهر و ميمه'),(10,' شبستر'),(276,' شفت'),(91,' شميرانات'),(153,' شوش'),(154,' شوشتر'),(230,' شهر بابك'),(53,' شهر رضا'),(97,' شهركرد'),(92,' شهريار'),(194,' شيراز'),(74,' شيران و چرداول'),(136,' شيروان'),(245,' صحنه'),(433,' صدوق'),(277,' صومعه سرا'),(164,' طارم'),(434,' طبس'),(278,' طوالش'),(11,' عجبشير'),(261,' علي آباد'),(231,' عنبرآباد'),(98,' فارسان'),(137,' فاروج'),(195,' فراشبند'),(105,' فردوس'),(55,' فريدن'),(56,' فريدون شهر'),(398,' فريدونكنار'),(124,' فريمان'),(196,' فسا'),(57,' فلاورجان'),(279,' فومن'),(197,' فيروزآباد'),(93,' فيروزكوه'),(392,' قائم شهر'),(106,' قائن'),(218,' قروه'),(210,' قزوين'),(414,' قشم'),(246,' قصر شيرين'),(232,' قلعه گنج'),(211,' قم'),(125,' قوچان'),(198,' قير و كارزين'),(199,' كازرون'),(58,' كاشان'),(127,' كاشمر'),(219,' كامياران'),(424,' كبودر آهنگ'),(66,' كرج'),(262,' كرد كوي'),(233,' كرمان'),(247,' كرمانشاه'),(128,' كلات'),(263,' كلاله'),(12,' كليبر'),(407,' كميجان'),(180,' كنارك'),(83,' كنگان'),(248,' كنگاور'),(38,' كوثر'),(234,' كوهبنان'),(379,' كوهدشت'),(99,' كوهرنگ'),(254,' كهگيلويه'),(235,' كهنوج'),(418,' گاوبندي'),(155,' گتوند'),(255,' گچساران'),(264,' گرگان'),(169,' گرمسار'),(39,' گرمي'),(59,' گلپايگان'),(393,' گلوگاه'),(129,' گناباد'),(84,' گناوه'),(265,' گنبد كاووس'),(249,' گيلان غرب'),(200,' لارستان'),(156,' لالي'),(201,' لامرد'),(280,' لاهيجان'),(100,' لردگان'),(60,' لنجان'),(281,' لنگرود'),(282,' ماسال'),(30,' ماكو'),(138,' مانه و سملقان'),(165,' ماه نشان'),(61,' مباركه'),(408,' محلات'),(394,' محمود آباد'),(13,' مراغه'),(14,' مرند'),(202,' مرودشت'),(220,' مريوان'),(157,' مسجد سليمان'),(40,' مشگين'),(130,' مشهد'),(425,' ملاير'),(15,' ملكان'),(203,' ممسني'),(236,' منوجان'),(131,' مه ولات'),(31,' مهاباد'),(170,' مهدي شهر'),(204,' مهر'),(75,' مهران'),(435,' مهريز'),(32,' مياندوآب'),(16,' ميانه'),(436,' ميبد'),(410,' ميناب'),(266,' مينو دشت'),(62,' نائين'),(63,' نجف آباد'),(64,' نطنز'),(67,' نظرآباد'),(33,' نقده'),(395,' نكا'),(41,' نمين'),(396,' نور'),(381,' نورآباد'),(397,' نوشهر'),(426,' نهاوند'),(107,' نهبندان'),(205,' ني ريز'),(42,' نير'),(132,' نيشابور'),(181,' نيكشهر'),(94,' ورامين'),(17,' ورزقان'),(250,' هرسين'),(18,' هريس'),(427,' همدان'),(158,' هنديجان'),(437,' يزد'),(68,'طالقان'),(126,'طرقبه و شانديز'),(19,'هشترود');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliniks`
--

DROP TABLE IF EXISTS `cliniks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliniks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinik_name` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cities_id_1` (`city_id`),
  CONSTRAINT `fk_cities_id_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliniks`
--

LOCK TABLES `cliniks` WRITE;
/*!40000 ALTER TABLE `cliniks` DISABLE KEYS */;
INSERT INTO `cliniks` VALUES (1,'کلینیک حاج محمود و پسران به جز محمد','قم - باجک',211);
/*!40000 ALTER TABLE `cliniks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliniks_doctors`
--

DROP TABLE IF EXISTS `cliniks_doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliniks_doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinik_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cliniks_id_1_idx` (`clinik_id`),
  KEY `fk_doctors_id_1_idx` (`doctor_id`),
  CONSTRAINT `fk_cliniks_id_1` FOREIGN KEY (`clinik_id`) REFERENCES `cliniks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_doctors_id_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliniks_doctors`
--

LOCK TABLES `cliniks_doctors` WRITE;
/*!40000 ALTER TABLE `cliniks_doctors` DISABLE KEYS */;
INSERT INTO `cliniks_doctors` VALUES (1,1,1);
/*!40000 ALTER TABLE `cliniks_doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `expertise_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `identity_UNIQUE` (`identity`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  KEY `fk_expertise_id_1` (`expertise_id`),
  CONSTRAINT `fk_expertise_id_1` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'037','فرید محمد خویی','قم - ننه عباس','0912','1375',138);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expertise`
--

DROP TABLE IF EXISTS `expertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expertise_name` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`expertise_name`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expertise`
--

LOCK TABLES `expertise` WRITE;
/*!40000 ALTER TABLE `expertise` DISABLE KEYS */;
INSERT INTO `expertise` VALUES (29,'آسم و آلرژی'),(69,'آسیب شناسی (پاتولوژی)'),(102,'ارتودنسی'),(169,'اعصاب کودکان'),(32,'اعصاب و روان (روانپزشکی)'),(218,'اندام شناسی (فیزیولوژی)'),(138,'انگل شناسی'),(139,'ایمنی‌شناسی (ایمونولوژی)'),(141,'بهداشت تنظیم خانواده'),(128,'بیمار شناسی (اپیدمیولوژی )'),(15,'بیماری های استخوان و مفاصل (روماتولوژی)'),(93,'بیماریهای فک و دهان و صورت'),(197,'بیوشیمی بالینی'),(51,'بیهوشی'),(22,'پرتودرمانی (رادیوتراپی)'),(114,'پروتز'),(231,'پروتزهای دندانی(ثابت و متحرک)  '),(201,'پزشکی اجتماعی'),(53,'پزشکی فیزیکی و توانبخشی'),(56,'پزشکی قانونی'),(78,'پزشکی هسته ای'),(63,'پوست ، مو و زیبایی'),(2,'تصویر برداری (رادیولوژی)'),(19,'تغذیه'),(14,'جراح عمومی'),(33,'جراحی پلاستیک، ترمیمی و سوختگی '),(38,'جراحی پیوند کلیه و کبد'),(10,'جراحی چشم'),(130,'جراحی دست'),(251,'جراحی ستون فقرات'),(194,'جراحی عروق و تروما'),(91,'جراحی فک و دهان و صورت'),(90,'جراحی قفسه سینه (توراکس)'),(190,'جراحی قلب و عروق'),(37,'جراحی کلیه،مجاری ادراری و تناسلی (اورولوژی)'),(192,'جراحی کودکان'),(77,'جراحی لثه '),(41,'جراحی مغز و اعصاب'),(87,'چشم'),(36,'خون و سرطان (هماتولوژی و انکولوژی)'),(7,'داخلی'),(117,'داروسازی'),(12,'دندانپزشک'),(43,'دندانپزشک کودکان'),(235,'دندانپزشکی ترمیمی'),(237,'رادیولوژی دهان و فک وصورت '),(133,'روانپزشکی کودک و نوجوان'),(39,'روانشناسی'),(52,'ریه'),(11,'زنان و زایمان و نازایی'),(184,'زنان و زایمان(جراحی کانسر)'),(186,'زنان وزایمان (نازایی و آی.وی.اف)'),(209,'ژنتیک پزشکی'),(210,'ژنتیک مولکولی انسانی'),(68,'سایر'),(212,'سم شناسی عمومی '),(76,'شنوایی سنجی (ادیومتریست)'),(25,'ضربه‌شناسی (ارتوپدی ، تروماتولوژی )'),(100,'طب اورژانس'),(70,'طب سالمندان'),(55,'طب سنتی'),(154,'عفونی و گرمسیری'),(42,'علوم آزمایشگاهی'),(18,'عمومی'),(62,'غدد داخلی و متابولیسم'),(99,'غدد و متابولیسم کودکان'),(240,'فارماسیوتیکس  (داروسازی صنعتی)'),(64,'قلب کودکان'),(8,'قلب و عروق'),(109,'کاردرمانی (طب کار)'),(21,'کلیه (نفرولوژی)'),(58,'کلیه کودکان (نفرولوژی)'),(1,'کودکان'),(24,'گفتار درمانی'),(162,'گوارش کودکان'),(26,'گوارش و کبد'),(13,'گوش حلق و بینی (اتولوژی و نورواتولوژی)'),(134,'مشاوره روانپزشکی'),(17,'مغز و اعصاب (نورولوژی)'),(170,'نوزادان'),(222,'ویروس شناسی');
/*!40000 ALTER TABLE `expertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `free_times`
--

DROP TABLE IF EXISTS `free_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `free_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `time_slot_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_free_slot_id_1_idx` (`time_slot_id`),
  KEY `fk_doctors_id_2_idx` (`doctor_id`),
  CONSTRAINT `fk_doctors_id_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_free_slot_id_1` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT tsunique UNIQUE (`date`, `doctor_id`, `time_slot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `free_times`
--

LOCK TABLES `free_times` WRITE;
/*!40000 ALTER TABLE `free_times` DISABLE KEYS */;
/*!40000 ALTER TABLE `free_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `disease` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `blood_type` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `identity` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identity_UNIQUE` (`identity`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'صادق باقرزاده','0930','بوشهر - عاشوری','مرض نادانی','AB+','123456','532');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserves`
--

DROP TABLE IF EXISTS `reserves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `free_time_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_free_slot_id_1_idx` (`free_time_id`),
  KEY `fk_patient_id_1_idx` (`patient_id`),
  CONSTRAINT `fk_free_time_id_1` FOREIGN KEY (`free_time_id`) REFERENCES `free_times` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_patient_id_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserves`
--

LOCK TABLES `reserves` WRITE;
/*!40000 ALTER TABLE `reserves` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_slots`
--

DROP TABLE IF EXISTS `time_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_slots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_slots`
--

LOCK TABLES `time_slots` WRITE;
/*!40000 ALTER TABLE `time_slots` DISABLE KEYS */;
INSERT INTO `time_slots` VALUES (1,'8 - 8:45'),(2,'9 - 9:45'),(3,'10 - 10:45'),(4,'11 - 11:45'),(5,'12 - 12:45'),(6,'13 - 13:45'),(7,'14 - 14:45'),(8,'15 - 15:45'),(9,'16 - 16:45'),(10,'17 - 17:45'),(11,'18 - 18:45'),(12,'19 - 19:45'),(13,'20 - 20:45'),(14,'21 - 21:45'),(15,'22 - 22:45'),(16,'23 - 23:45');
/*!40000 ALTER TABLE `time_slots` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;







DROP TABLE IF EXISTS `doctors_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `comment_text` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `comment_score` int(2) NOT NULL,
  
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `id_UNIQUE` (`comment_id`),
  KEY `fk_patinet_id_10_idx` (`patient_id`),
  KEY `fk_doctor_id_10_idx` (`doctor_id`),
  CONSTRAINT `fk_patient_id_10` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_doctor_id_10` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;






-- Dump completed on 2018-05-17 12:26:13

