-- phpMyAdmin SQL Dump
-- version 4.2.13
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 07:32 PM
-- Server version: 5.5.16
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `franasramekcz1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
`id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `login`, `password`, `last_login`) VALUES
(1, 'nina', '02c7fe682cfe77d576cb70ac808cd4d3', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`id` int(11) NOT NULL,
  `index` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `perex` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `public` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `index`, `name`, `date`, `perex`, `text`, `visible`, `public`, `created`, `created_by`) VALUES
(2, 2, 'Pracujeme na obsahu webu', '15. prosince 2011', 'Webové stránky nové výstavy v Muzeu Fráni Šrámka zatím ještě nejsou kompletní. I přesto zde naleznete mnoho informací o expozici, doprovodných programech a otvírací době. V blízké době stránky doplníme o ukázky vybraných exponátů, virtuální prohlídku celé výstavy a další zajímavé informace.', '', 1, 0, '2012-01-18 23:26:24', 1),
(5, 4, 'Fotky z vernisáže', '15. ledna 2012', 'Chcete vědět o všem, co se v muzeu šustne? Sledujte náš &lt;a href=&quot;http://www.facebook.com/#!/MuzeumFraniSramka&quot;&gt;Facebook.&lt;/a&gt; Zajímat by vás mohly například fotografie z vernisáže a aktuality z právě probíhajících filmových workshopů, kterých se účastní žáci ZŠ Sobotka.  ', '', 1, 0, '2012-01-16 17:12:15', 1),
(8, 7, 'Virtuální prohlídka', '20. ledna 2012', 'Nepřehlédněte prosím novinku na webu - &lt;a href=&quot;http://franasramek.cz/virtualni-prohlidka&quot;&gt;virtuální prohlídku muzea&lt;/a&gt;, díky níž si můžete udělat bližší představu o podobě muzea. Doufáme, že vás tím nalákáme k opravdové návštěvě!', '', 1, 0, '2012-01-20 08:29:39', 1),
(7, 6, 'Přání', '19. ledna 2012', 'Muzeum přeje všechno nejlepší Fráňu Šrámkovi &lt;br&gt; ke 135. narozeninám! ', '', 1, 0, '2012-01-20 08:30:13', 1),
(11, 10, 'Muzeum je nominováno na cenu Jivínského Štefana', '9. února 2012', 'Projekt v Muzeu Fráni Šrámka je nominován na cenu Jivínského Štefana za &quot;scénář, zajištění prostředků z evropských zdrojů a provedení významné přestavby Šrámkova muzea v Sobotce s novými audiovizuálními efekty, grafickým přiblížením života Fráni Šrámka a k návštěvníkovi mluvícími ukázkami Mistrova díla.&quot; Hlavním smyslem &lt;a href=&quot;http://jivinskystefan.webnode.cz/&quot;&gt;ceny Jivínského Štefana&lt;/a&gt;  je získat přehled o všech bohulibých kulturních aktivitách na okrese, pozvat lidi na setkání a tam jim poděkovat.', '', 1, 0, '2012-02-09 12:04:15', 1),
(10, 9, 'Proběhl poslední filmový workshop', '6. února 2012', 'Vybraní žáci ZŠ Sobotka absolvovali čtyři workshopy, v nichž se naučili natáčet filmy. Atmosféru posledního setkání, ve kterém jsme stříhali natočený materiál, vám přiblíží &lt;a href=&quot;https://www.facebook.com/#!/media/set/?set=a.334093626635096.83797.287881434589649&amp;type=1&quot;&gt;soubor fotografií&lt;/a&gt;.  \r\n\r\n', '', 1, 0, '2012-02-10 09:42:34', 1),
(12, 11, 'V muzeu vznikla filmová reportáž o Sobotce', '10. února 2010', 'Během čtyř filmových workshopů žáci základní školy v Sobotce natočili &lt;a href=&quot;http://vimeo.com/36511409&quot;&gt;o městě krátkou reportáž &lt;/a&gt;. Doufáme, že se vám bude líbit!', '', 1, 0, '2012-02-15 08:44:01', 1),
(13, 12, 'Uveřejnili jsme videa z přednášek', '26. února 2012', 'V rámci filmové soutěže jsme uspořádali čtyři workshopy, v nichž se žáci ZŠ Sobotka učili natáčet a stříhat filmy. Nemohli jste se zúčastnit? Nevadí, právě pro vás jsme připravili &lt;a href=&quot; http://franasramek.cz/workshopy&quot;&gt; videozáznamy přednášek&lt;/a&gt;! A teď &lt;a href=&quot;http://franasramek.cz/doprovodne-akce&quot;&gt;hurá natáčet a soutěžit&lt;/a&gt;! ', '', 1, 0, '2012-02-26 11:13:45', 1),
(14, 13, 'Nepište a nenatáčejte do šuplíku, představte své dílo veřejnosti!', '22. května 2012', 'Až do 31. května máte čas zaslat příspěvky do literární a filmové soutěže. Veškeré informace naleznete v záložce &lt;a href=&quot;http://franasramek.cz/doprovodne-akce&quot;&gt;Doprovodné akce&lt;/a&gt;. Máte jedinečnou příležitost, tak pište a natáčejte, máte posledních pár dní!', '', 1, 0, '2012-05-22 23:20:57', 1),
(15, 14, 'Hlasujte o cenu čtenářů', '23. května 2012', 'Další expanze do online prostředí: soutěžní texty uveřejněny na stránce &lt;a href=&quot;http://www.scribd.com/MuzeumFraniSramka&quot;&gt;SCRIBD.COM&lt;/a&gt;. Vznikla tak v podstatě virtuální výstava děl zaslaných do literární soutěže v rámci doprovodných programů. Komentujte, lajkujte, sdílejte a hlavně čtěte! ', '', 1, 0, '2012-05-22 23:18:28', 1),
(16, 15, 'Poslední šance soutěžit', '31. května 2012', 'Do dnešní půlnoci máte poslední možnost přihlásit svoje texty nebo filmy do soutěží pořádaných Muzeem Fráni Šrámka. Více informací naleznete v záložce &lt;a href=&quot;http://franasramek.cz/doprovodne-akce&quot;&gt;doprovodné akce&lt;/a&gt;. Práce posílejte e-mailem &lt;a href=&quot;mailto:nina.seyckova@gmail.com&quot;&gt;Nině Seyčkové&lt;/a&gt; nebo na adresu Muzea. ', '', 1, 0, '2012-05-31 09:37:29', 1),
(17, 16, 'Porota rozhodla o 14 vítězích', '27. června 2012', 'Porota literární a filmové soutěže ve středu rozhodla o 14 oceněných. Literární soutěž je hodnocena v kategorii základní a střední školy a v kategorii komiksu. Již příští středu zveřejníme výsledkovou listinu. Atmosféru rozhodování vám přiblíží &lt;a href=&quot;https://www.facebook.com/media/set/?set=a.423928200984971.100040.287881434589649&amp;type=1&quot;&gt;série fotografií&lt;/a&gt;. \r\n\r\n  ', '', 1, 0, '2012-06-29 10:37:44', 1),
(20, 19, 'Vyhlášení cen proběhne 4. července 2012', '29. července 2012', 'Během slavnostního večera budou představeny literární a filmové workshopy, které soutěžím předcházely. Budou vyhlášeni vítězové literární a filmové soutěže. Součástí večera je autorské čtení a promítání vítězných snímků. Zároveň v průběhu večera bude muzeum slavnostně znovuotevřeno před letní sezónou. Více informací o festivalu a jeho programu najdete na &lt;a href=&quot;http://www.sramkovasobotka.cz/program-2012/#streda&quot;&gt;webu Šrámkovy Sobotky&lt;/a&gt;. ', '', 1, 0, '2012-06-29 10:40:41', 1),
(21, 20, 'Výsledky soutěží zveřejněny', '5. července 2012', 'Oceněno bylo 6 textů v kategorii základní školy a střední školy, tři texty získlay speciální ocenění za žurnalistický talent, vtip a za nejlepší báseň. Dále cenu získaly tři komiksy a oceněny byli dva filmy. Seznam &lt;a href=&quot;http://franasramek.cz/vyherci.php&quot;&gt;výherců&lt;/a&gt; naleznete v sekci Doprovodné programy. Uvažujeme také o vydání sborníku vítězných prací. \r\n\r\n\r\n\r\n', '', 1, 0, '2012-07-10 12:19:17', 1),
(19, 18, 'Sítotiskový workshop s TOY_BOX', '28. června 2012', 'Komiksová autorka a streetartistka TOY_BOX, která je autorkou vizuální tváře výstavy a &lt;a href=&quot;http://franasramek.cz/zivotopis&quot;&gt;komiksového životopisu Fráni Šrámka&lt;/a&gt; představí svoji tvorbu a ukáže techniku sítotisku na sítotiskovém workshopu. Máte jedinečnou možnost si pod jejím vedením sami potisknout trička, která si přineste. Na místě také bude možnost zakoupit nepotisknutá trička a látkové tašky. Workshop proběhne ve středu 4. července 2012 od 15.00 v zahradě Šrámkova domu. ', '', 1, 0, '2012-08-27 23:28:34', 1),
(22, 21, 'Vydali jsme Sborník soutěžních prací', '27. srpna 2012', 'V sekci Soutěže najdete všechny informace o literární a filmové soutěži a můžete si stáhnout &lt;a href=&quot;http://franasramek.cz/sbornik.php&quot;&gt;Sborník vítězných prací&lt;/a&gt; ve formátu PDF nebo ve formátu ePub pro elektronické čtečky. Přejeme vám příjemné čtení!   ', '', 1, 1, '2012-08-27 23:27:35', 1),
(23, 22, 'Webové stránky muzea se zapojily do projektu WebArchivu', '23. 10. 2012', 'Tyto stránky jsou pravidelně archivovány Národní knihovnou ČR pro svou kulturní, vzdělávací, vědeckou, výzkumnou nebo jinou informační hodnotu za účelem dokumentace autentického vzorku českého webu. Jsou součástí kolekce českých webových stránek, které NK ČR hodlá dlouhodobě uchovávat a zpřístupňovat pro budoucí generace. ', '', 1, 1, '2012-10-23 15:42:44', 1),
(24, 23, 'E-sborník uveřejnila pražská knihovna', '13. 2. 2013', 'Vrcholem literární a filmové soutěže, kterou v loňském roce uspořádalo Muzeum Fráni Šrámka, bylo vydání Sborníku vítězných prací. Pracovníci Městské knihovny v Praze Sborník posoudili a zpřístupnili &lt;a href=&quot;http://search.mlp.cz/?lang=cs&amp;action=sTitul&amp;key=3837917&quot;&gt;svým čtenářům&lt;/a&gt;. Velmi nás toto uznání těší a doufám, že se tak výherní texty dostanou k většímu počtu čtenářů.  ', '', 1, 1, '2013-02-13 16:50:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_article`
--

CREATE TABLE IF NOT EXISTS `image_article` (
`id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
`id` int(11) NOT NULL,
  `photo_group` int(11) NOT NULL DEFAULT '0',
  `gallery_id` int(11) NOT NULL DEFAULT '0',
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `file_thumb` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_group`
--

CREATE TABLE IF NOT EXISTS `photo_group` (
`id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
`id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `set_char` text COLLATE utf8_unicode_ci,
  `set_int` int(11) DEFAULT NULL,
  `set_date` datetime DEFAULT NULL,
  `set_float` float DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `set_char`, `set_int`, `set_date`, `set_float`) VALUES
(1, 'workshopy', '&lt;p class=&quot;perex&quot;&gt;V návaznosti na soutěže proběhlo sedm workshopů, v nichž žáci ZŠ Sobotka a studenti Gymnázia Dr. Emila Holuba v Holicích získali informace, znalosti a dovednosti jak začít psát a jak natáčet filmy. &lt;br&gt;Na stránce &lt;a href=&quot;http://www.scribd.com/MuzeumFraniSramka&quot;&gt;SCRIBD.COM&lt;/a&gt; najdete příspěvky z literárních soutěží.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;font color=&quot;red&quot;&gt;Zatím neplánujeme organizaci dalších workshopů - tato stránka má poskytnout informace těm, kteří se z realizačních důvodů nemohli zúčastnit. Uvažujeme však o dalších zajímavých akcích a velmi oceníme vaše náměty, co byste chtěli v muzeu zažít. Pište je na &lt;a href=&quot;mailto:nina.seyckova@gmail.com&quot;&gt;nina.seyckova@gmail.com&lt;/a&gt;&lt;/font&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;Informace z literárních workshopů&lt;/h2&gt;\r\n\r\n&lt;h3 style=&quot;padding-top:14px&quot;&gt; &lt;font color=&quot;red&quot;&gt;1. Beseda a workshop s mladým spisovatelem&lt;/font&gt;&lt;/h3&gt;\r\n&lt;p&gt;Během první půl hodiny laureát Magnesii Litery 2012 za prózu Marek Šindelka představil svoje dílo, mluvil o práci spisovatele, o své inspiraci, zdrojích, o autorech, kteří ho ovlivnili, o tom, jak je důležité číst, jaký je rozdíl mezi scénáristou a psaním krásné literatury, jak je možné začít psát a kudy vedla jeho cesta k úspěšnému vydání první knihy. Struktura besedy měla jen rámcové obrysy a vyvíjela se podle dotazů studentů. &lt;br&gt;&lt;br&gt;\r\n\r\n&lt;font color=&quot;red&quot;&gt;Tvůrčí úkol:&lt;/font&gt; Studenti dostali jako zadání úryvek z románu &lt;a href=&quot;http://www.iliteratura.cz/Clanek/23225/sindelka-marek-chyba-&quot;&gt;Chyba&lt;/a&gt; a jejich úkolem bylo dopsat příběh jedné z postav nebo případně dotvořit jejich společnou cestu. Studenti měli na paměti hlavní poučku: snažit se vytvořit dramatickou záplatku, která čtenáře zaujme a vytvoří oblouk fungujícího příběhu. Studenti psali po skupinách. V jednom z jejich příběhu se Nina žijící jen s do sebe zahleděnou, uplakanou a nefunkční matkou zapletla s drogami; jiní napsali válečné drama plné zvratů a emocí. Důležitým bodem programu byla i prezentace studentů vytvořených výtvorů a zpětná vazba, kterou jim Marek poskytl. \r\n&lt;/p&gt;&lt;br /&gt;\r\n\r\n&lt;img src=&quot;http://i.nyx.cz/files/00/00/07/90/790437_432e80343dac485d4ac4.jpg?name=marek.jpg&quot; width=300 alt=&quot;Marek Sindelka&quot;&gt; \r\n\r\n&lt;h3 style=&quot;padding-top:14px&quot;&gt; &lt;font color=&quot;red&quot;&gt;2. Literární žánry v prostředí internetu&lt;/font&gt;&lt;/h3&gt;\r\n&lt;p&gt;Cílem druhého setkání nebylo nahradit workshopem výuku literatury a věnovat se podrobně různým typům literárních žánrů, ale ukázat, jak je možné začít psát, aniž bychom se rovnou chtěli stát „opravdovými“ spisovateli. Společně se studenty jsme vydefinovali základní žánry – epiku, lyriku, drama – a snažili se přijít na to, proč vlastně literární žánry máme. Poté jsme si představili tři možnosti jak v dnešní době prezentovat svoje dílo – tvorba školního časopisu, tvorba webové stránky a založení blogu. Zaměřili jsme se na blog, který byl obsahem tvůrčího úkolu (vysvětlili jsme si, jaká jsou typická témata blogu, jak jednoduchá je jeho správa a jak získat a budovat své pravidelné čtenáře). &lt;br&gt;&lt;br&gt;\r\n\r\n&lt;font color=&quot;red&quot;&gt;Tvůrčí úkol:&lt;/font&gt; Úkolem studentů bylo opět ve skupinách, jeden chlapec však pracoval sám, vymyslet název a téma blogu, definovat cílovou skupinu a napsat jeden (ne první) příspěvek. Vzniklo několik nápadů a textů, které odrážely zájmy studentů a ukázaly mnohotvárnost a různorodost možností, které blogy skýtají. Jeden blog byl kuchařský; druhý se věnoval volejbalu a byl určen začátečníkům; dva chlapci opravdu přímo během workshopu založili blog o počítačové hře World of tanks a dále jej spravují; chlapec pracující sám napsal první z řady fantasy povídek o dvou nepozemských bytostech; jiná skupina psala blog ze života teenagera, jejichž příspěvek se týkal vztahu mladých a starších občanů v městské hromadné dopravě; další skupina napsala velmi svižný a vtipný článek o rande naslepo. Nejvíce mě však zaujal nápad založit blog o dění ve škole, ve kterém by se reflektovaly školní nespravedlnosti a který by obsahoval nápady na změnu vycházející z řad studentů – jednalo se o jediný projekt, který byl opravdu velmi vážný a aktivistický. &lt;/p&gt;&lt;br /&gt;\r\n\r\n&lt;img src=&quot;http://i.nyx.cz/files/00/00/07/90/790438_6abac889f952110ff23c.jpg?name=komiks2.jpg&quot; width=500 alt=&quot;Komiksovy workshop&quot;&gt; \r\n\r\n&lt;h3 style=&quot;padding-top:14px&quot;&gt; &lt;font color=&quot;red&quot;&gt;3. Komiks a literatura&lt;/font&gt;&lt;/h3&gt;\r\n&lt;p&gt;Třetí setkání vedl opět Marek Šindelka, především díky jeho zkušenosti s převedením &lt;a href=&quot;http://opicirevue.cz/obsah/chyba&quot;&gt;románu Chyba do komiksové podoby&lt;/a&gt;. V první půlhodině nejprve představil různé druhy komiksů (komiksové stripy, grafický román, superhrdninský komiks, komiks s vážným námětem atd.). Debata se dostala až k angažovanému street artu, všudypřítomnosti komiksu (média, &lt;a href=&quot;http://www.umenivmetru.cz/cz/&quot;&gt;projekt Umění v metru&lt;/a&gt; apod.) a zfilmovaným komiksovým dílům, vyprávěl o tvorbě komiksové Chyby a přirovnával práci na této knize spíše k tvorbě filmu (pracovali v týmu, v němž každý měl svou roli). Studenti velmi živě reagovali, bylo vidět, že se jich téma dotýká a zajímavý byl především přesah diskuze do street artu. &lt;br&gt;&lt;br&gt;\r\n\r\n&lt;font color=&quot;red&quot;&gt;Tvůrčí úkol:&lt;/font&gt; Při přípravě tvůrčího úkolu jsme chtěli eliminovat případný strach a ostych z kreslení, které je nedílnou a nepostradatelnou součástí tvorby komiksu. Proto jsme využili knihy českého komiksového kreslíře &lt;a href=&quot;http://www.sarden.cz/recenze-nikkarin-130-hodni-zli-osklivi&quot;&gt;Nikkarina 130: hodní, zlí a oškliví&lt;/a&gt; a vybrali 8 stránek z knihy, protože obsahovaly velmi málo textu a byly díky tomu nejméně „návodné“, zároveň byly obrázky čitelné a srozumitelné. Skupiny měly k dispozici nůžky, lepidlo a velké papíry formátu A3 – měly vystříhat potřebná políčka, sestavit z nich příběh, doplnit ho o komiksové bubliny či jiné popisky nebo případně příběh domalovat dle potřeby. Na tuto práci potřebovali studenti více času, než při úkolech v minulých dvou setkáních. Bylo velmi zajímavé, že intuitivně užili zavedené, oblíbené a fungující vyprávěcí postupy – v jednom z výsledných komiksů se objevila retrospektiva, v jedné příběh v příběhu a v dalších dvou se pracovalo s motivem a tématem snu. Atmosféru workshopu vám příblíží&lt;a href=&quot;https://www.facebook.com/media/set/?set=a.373924075985384.91587.287881434589649&amp;type=3&quot;&gt; fotoalbum&lt;/a&gt;. &lt;/p&gt;&lt;br /&gt;\r\n\r\n&lt;img src=&quot;http://i.nyx.cz/files/00/00/07/90/790436_6e1a9dd602a8c1e0e1c9.jpg?name=komiks.jpg&quot; width=300 alt=&quot;Komiksovy workshop&quot;&gt; \r\n\r\n&lt;h2&gt;Informace z filmových workshopů&lt;/h2&gt;\r\n&lt;p&gt;Každý workshop začal krátkou přednáškou, která poskytla účastníkům teoretické znalosti. Informace posléze zúročily v praktické části hodiny. V prvním setkání jsme se zaměřili na filmové žánry a v hraných scénkách se skupinky snažily vystihnout typické prvky žánru. V druhém setkání žáci ZŠ Sobotka vymýšleli dramatický příběh pro konkrétní postavy - vznikly velice povedené příběhy mladých lidí, kteří se potýkají s každodenními problémy (nadváhou, příliš zaměstnanou matkou, zraněním či pýchou). V příštím setkání jsme konečně vzali do rukou kamery a natočili reportáž o Sobotce a rozhovor básníka a jeho ženy Milky, ve kterém hrál hlavní roli životopisný komiks. V posledním setkání jsme natočený materiál sestříhali.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;padding-top:14px&quot;&gt; &lt;font color=&quot;red&quot;&gt;1. Filmové žánry&lt;/font&gt;&lt;/h3&gt;\r\n&lt;p&gt;Proč máme filmové žánry? Pomůže nám charakteristika žánrů při tvorbě příběhu? Jaké jsou rozdíly mezi dramatem, komedií a dokumentem? Odpovědi naleznete v &lt;a href=&quot;http://www.slideshare.net/MuzeumFraniSramka/filmove-zanry&quot;&gt;prezentaci &quot;Filmové žánry&quot; na SlideShare.&lt;/a&gt; &lt;/p&gt;&lt;br /&gt;\r\n\r\n&lt;iframe src=&quot;http://player.vimeo.com/video/37418460?title=0&amp;amp;byline=0&amp;amp;portrait=0&quot; width=&quot;600&quot; height=&quot;300&quot; frameborder=&quot;0&quot; webkitAllowFullScreen mozallowfullscreen allowFullScreen&gt;&lt;/iframe&gt;&lt;p&gt;&lt;a href=&quot;http://vimeo.com/37418460&quot;&gt;Záznam 1. přednášky &quot;Filmové žánry&quot;&lt;/a&gt; from &lt;a href=&quot;http://vimeo.com/muzeumfranisramka&quot;&gt;Muzeum Frani Sramka&lt;/a&gt; on &lt;a href=&quot;http://vimeo.com&quot;&gt;Vimeo&lt;/a&gt;.&lt;/p&gt;\r\n\r\n\r\n&lt;h3 style=&quot;padding-top:14px&quot;&gt; &lt;font color=&quot;red&quot;&gt;2. Výběr filmového tématu, práce s námětem a tvorba příběhu&lt;/font&gt;&lt;/h3&gt;\r\n&lt;p&gt; K čemu slouží filmový scénář? Jaký je rozdíl mezi literárním a technickým scénářem? Jak vystavět příběh, který bude fungovat? Odpovědi naleznete v &lt;a href=&quot;http://www.slideshare.net/MuzeumFraniSramka/filmovy-scenar&quot;&gt;prezentaci &quot;Filmový scénář&quot; na SlideShare.&lt;/a&gt; Muzeum není jen tichý prostor - během druhého workshopu to v něm pěkně žilo a tvořilo přímo na básníkově stole. Podívejte se na &lt;a href=&quot;https://www.facebook.com/media/set/?set=a.317871161590676.81023.287881434589649&amp;type=3&quot;&gt;fotografie z opravdu vydařeného setkání&lt;/a&gt;! &lt;/p&gt;\r\n&lt;br /&gt;\r\n&lt;iframe width=&quot;100%&quot; height=&quot;166&quot; scrolling=&quot;no&quot; frameborder=&quot;no&quot; src=&quot;http://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F37990784&amp;show_artwork=true&quot;&gt;&lt;/iframe&gt;\r\n\r\n&lt;h3 style=&quot;padding-top:14px&quot;&gt; &lt;font color=&quot;red&quot;&gt;3. Práce s kamerou&lt;/font&gt;&lt;/h3&gt;\r\n&lt;p&gt;Jaké funkce má kamera? Proč nepoužívat zoom? Co je záběr a jaké má vlastnosti? Odpovědi naleznete v &lt;a href=&quot;http://www.slideshare.net/MuzeumFraniSramka/prace-s-kamerou&quot;&gt;prezentaci &quot;Práce s kamerou&quot; na SlideShare.&lt;/a&gt; &lt;/p&gt;\r\n&lt;br /&gt;\r\n&lt;iframe src=&quot;http://player.vimeo.com/video/37460480?title=0&amp;amp;byline=0&amp;amp;portrait=0&quot; width=&quot;600&quot; height=&quot;300&quot; frameborder=&quot;0&quot; webkitAllowFullScreen mozallowfullscreen allowFullScreen&gt;&lt;/iframe&gt;&lt;p&gt;&lt;a href=&quot;http://vimeo.com/37460480&quot;&gt;Záznam 3. přednášky &quot;Práce s kamerou&quot;&lt;/a&gt; from &lt;a href=&quot;http://vimeo.com/muzeumfranisramka&quot;&gt;Muzeum Frani Sramka&lt;/a&gt; on &lt;a href=&quot;http://vimeo.com&quot;&gt;Vimeo&lt;/a&gt;.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;padding-top:14px&quot;&gt; &lt;font color=&quot;red&quot;&gt;4. Filmový střih&lt;/font&gt;&lt;/h3&gt;\r\n&lt;p&gt;Proč filmy stříháme? Lze spojit jakékoli dva záběry? Proč dodržovat osvědčená střihová pravidla? Odpovědi naleznete v &lt;a href=&quot;http://www.slideshare.net/MuzeumFraniSramka/filmovy-stih&quot;&gt;prezentaci &quot;Filmový střih&quot; na SlideShare.&lt;/a&gt; Atmosféru posledního setkání, ve kterém jsme stříhali natočený materiál, vám přiblíží &lt;a href=&quot;https://www.facebook.com/#!/media/set/?set=a.334093626635096.83797.287881434589649&amp;type=1&quot;&gt;soubor fotografií&lt;/a&gt;. Kvůli mrazu jsme poslední setkání uskutečnili v budově ZŠ Sobotka. Výsledkem workshopů je &lt;a href=&quot;http://vimeo.com/36511409&quot;&gt;krátká reportáž o Sobotce&lt;/a&gt;. Doufáme, že se vám bude líbit!&lt;/p&gt;\r\n&lt;br /&gt;\r\n&lt;iframe src=&quot;http://player.vimeo.com/video/37365220?title=0&amp;amp;byline=0&amp;amp;portrait=0&quot; width=&quot;600&quot; height=&quot;300&quot; frameborder=&quot;0&quot; webkitAllowFullScreen mozallowfullscreen allowFullScreen&gt;&lt;/iframe&gt;&lt;p&gt;&lt;a href=&quot;http://vimeo.com/37365220&quot;&gt;Záznam 4. přednášky &quot;Filmový střih&quot;&lt;/a&gt; from &lt;a href=&quot;http://vimeo.com/muzeumfranisramka&quot;&gt;Muzeum Frani Sramka&lt;/a&gt; on &lt;a href=&quot;http://vimeo.com&quot;&gt;Vimeo&lt;/a&gt;.&lt;/p&gt;', NULL, NULL, NULL),
(2, 'media', '&lt;p class=&quot;perex&quot;&gt;V případě dotazů kontaktuje autorku výstavy a celého projektu Ninu Seyčkovou: &lt;a href=&quot;mailto:nina.seyckova@gmail.com&quot;&gt;nina.seyckova@gmail.com&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;Tisková zpráva o projektu&lt;/h2&gt;\r\n&lt;p&gt;Máte-li zájem uveřejnit informace o projektu Revitalizace Muzea Fráni Šrámka v Sobotce, je vám k dispozici oficiální &lt;a href=&quot;http://www.franasramek.cz/Tisk_zprava_sramek.docx&quot;&gt;tisková zpráva ke stažení&lt;/a&gt;. Rádi vám poskytneme další informace včetně fotografií z vernisáže, výstavy a workshopů, které se uskutečnily se žáky místní školy na půdě muzea a ZŠ Sobotka.&lt;/p&gt;\r\n\r\n&lt;h2&gt;Napsali o nás&lt;/h2&gt;\r\n&lt;li&gt;&lt;p&gt;O literární soutěži Muzea Fráni Šrámka na webu Gymnázia Dr. Emila Holuba v Holicích, &lt;br&gt;25. července 2012: &lt;/br&gt;&lt;a href=&quot;http://www.gyholi.cz/content/uspech-katky-beckove&quot;&gt;Úspěch Katky Bečkové&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Rozhovor Deníku o Šrámkově Sobotce s vedoucím zdejšího městského kulturního střediska Jakubem Novosadem, 25. června 2012: &lt;/br&gt;&lt;a href=&quot;http://www.denik.cz/ostatni_kultura/sobotka-sramkova-novosad-festivalove-dny-poji-tajemstvi-korespondence-20120624-1.html&quot;&gt;Šéf Šrámkovy Sobotky: Festivalové dny pojí tajemství korespondence&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Avízo soutěže na webu Gymnázia Dr. Emila Holuba v Holicích, 24. května 2012: &lt;/br&gt;&lt;a href=&quot;http://www.gyholi.cz/content/pozor-soutez&quot;&gt;Pozor, soutěž!&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Článek v Jičínském deníku, 23. června 2012, str. 03: Festivalové dny pojí tajemství korespondence&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Článek na blogu literárního a kulturního časopisu H_aluze o soutěžích pořádaných Muzeem Fráni Šrámka: &lt;/br&gt;&lt;a href=&quot;http://blog.h-aluze.cz/jste-tvurci-soutezte/&quot;&gt;„Jste tvůrčí? Soutěžte!&quot;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Článek o nové výstavě a projektu v Muzeu Fráni Šrámka: &lt;/br&gt;&lt;a href=&quot;http://www.infojet.cz/index.php/clanky/ruzne/1312-muzeum-frani-sramka-zhyn-otroku-zhyn-pse&quot;&gt;„Zhyň, otroku, zhyň, pse!“&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Literární workshopy na Gymnáziu Dr. Emila Holuba v Holicích, 19. března 2012: &lt;/br&gt;&lt;a href=&quot;http://www.gyholi.cz/content/literarni-workshop-1&quot;&gt;Literární workshop 1&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Článek v Jičínském deníku, 24. února 2012, str. 08: Projekt ve Šrámkově muzeu&lt;br&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Článek v Jičínském deníku, 24. února 2012, titulní strana: V muzeu můžete dokonce tvořit&lt;br&gt;\r\n      \r\n&lt;li&gt;&lt;p&gt;Článek o vernisáži v Jičínském deníku, 21. prosince 2011: &lt;/br&gt;&lt;a href=&quot;http://jicinsky.denik.cz/kultura_region/jcsobotka-sramkuvdum-expozicesramek20111220.html&quot;&gt;Šrámkův dům představil novou expozici&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;li&gt;&lt;p&gt;Rozhovor s autorkou projektu Ninou Seyčkovou v šestém čísle časopisu Splav! (2011): &lt;/br&gt;&lt;a href=&quot;http://www.sramkovasobotka.cz/sramkuv-dum-stojici-spici/&quot;&gt;Šrámkův dům stojící, spící&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Webové stránky Muzea Fráni Šrámka byly vybrány Národní knihovnou jako reprezentativní vzorek českého webu. Zařadili jsme se tak do projektu WebArchiv, který dlouhodobě uchovává webové stránky pro budoucí historické a výzkumné účely. Více informací o projektu po kliknutí na logo WebArchivu. &lt;br&gt;&lt;br&gt;\r\n&lt;a href=&quot;http://www.webarchiv.cz/files/vydavatele/certifikat.html&quot; onclick=&quot;return !window.open(this, &#039;kod&#039;, &#039;toolbar=no, menubar=no, directories=no, resizable=yes, status=no, width=600, height=210, top=200, left=50&#039;)&quot; &gt;&lt;img title=&quot;STRÁNKY ARCHIVOVÁNY NÁRODNÍ KNIHOVNOU ČR&quot; style=&quot;border:none&quot; oncontextmenu=&quot;return false&quot; src=&quot;http://www.webarchiv.cz/images/webarchiv_certifikat_c.gif&quot; /&gt;&lt;/a&gt; \r\n&lt;/p&gt;', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_article`
--
ALTER TABLE `image_article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_group`
--
ALTER TABLE `photo_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_article`
--
ALTER TABLE `image_article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo_group`
--
ALTER TABLE `photo_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
