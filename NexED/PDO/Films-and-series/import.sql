-- Netland
DROP DATABASE IF EXISTS `netland`;

CREATE DATABASE `netland`;

USE `netland`;


-- Table structure for table `media`
DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `omschrijving` text,
  `awards` int DEFAULT NULL,
  `duur` int DEFAULT NULL,
  `releasedatum` date NOT NULL,
  `seizoenen` int DEFAULT NULL,
  `land` varchar(255) NOT NULL,
  `youtubetrailer` varchar(255) DEFAULT NULL,
  `soortmedia` enum('film','serie') NOT NULL,
  PRIMARY KEY (`id`)
);


-- Dumping data for table `media`
INSERT INTO `media` VALUES 
(1,'The good place',4.5,'De serie gaat over een vrouw, Eleanor Shellstrop, die zich in het hiernamaals bevindt. Ze wordt verwelkomd door Michael, de \\\'architect\\\' van het utopische dorpje waar ze voor eeuwig gaat wonen. Er zijn twee delen in het hiernamaals, The Good Place (\\\'goede plek\\\') en The Bad Place (\\\'slechte plek\\\'); welke wordt bepaald door ethische punten voor elke handeling op aarde.',0,NULL,'2019-09-19',4,'UK','','serie'),
(2,'Game of Thrones',5.0,'Op het continent Westeros regeert koning Robert Baratheon al meer dan zeventien jaar lang over de Zeven Koninkrijken, na zijn opstand tegen koning Aerys II Targaryen \"De Krankzinnige\". Als zijn adviseur Jon Arryn wordt vermoord, vraagt hij zijn oude vriend Eddard Stark, de Heer van Winterfell en Landvoogd van het Noorden, om zijn plaats in te nemen. Eddard gaat met tegenzin akkoord, en trekt met zijn twee dochters, Sansa en Arya (Maisie Williams), naar de hoofdstad in het zuiden. Vlak voor hun vertrek wordt een van zijn jongste zonen, Bran Stark, uit een van de torens van Winterfell geduwd, na getuige te zijn geweest van de incestueuze affaire tussen koningin Cersei en haar tweelingbroer, Jaime Lannister.',1,NULL,'2011-12-15',8,'UK','','serie'),
(3,'Breaking Bad',5.0,'Walter White is in 2008 een overgekwalificeerde scheikundeleraar op een middelbare school in Albuquerque. Op het moment dat zijn vrouw onverwacht zwanger is van hun tweede kind, stort Walters wereld in. De dokter heeft vastgesteld dat hij terminaal ziek is. Walter heeft longkanker en lijkt niet lang meer te zullen leven. Om ervoor te zorgen dat zijn gezin na zijn dood niet in een financiële crisis belandt en tevens om zijn eigen behandelingen te betalen, besluit Walter over te schakelen op een leven als misdadiger. Met de hulp van Jesse Pinkman, een uitgevallen leerling die hij nog scheikunde gegeven heeft, maakt en verkoopt hij de drug crystal meth. Terwijl hij doorgaat met lesgeven, komt het belang van scheikunde in de moderne maatschappij prangend in zijn lessen naar voren. Zijn product is meer dan 99% zuiver en dit feit loopt als een rode draad door de hele serie heen.',1,NULL,'2008-01-20',3,'USA','','serie'),
(4,'Penoza',3.2,'Hoofdrolspeelster Carmen van Walraven (Monic Hendrickx) ontdekt dat haar man Frans (Thomas Acda) een veel belangrijker rol in de onderwereld speelt dan ze dacht. Ze dwingt hem dan ook ermee te stoppen. Net wanneer alles weer goed lijkt te gaan, wordt haar man voor de ogen van hun jongste zoon Boris (Stijn Taverne) geliquideerd. Carmen krijgt last van schuldeisers en bedreigingen. Ook justitie zit achter haar aan omdat die wil dat zij gaat getuigen tegen de compagnons van haar man.Carmen wil niet als beschermd getuige door het leven gaan en kiest voor een moeilijk alternatief: ze werkt zich naar de top van de georganiseerde misdaad, waar niemand nog aan haar of haar gezin durft te komen. In het vervolg daarop weet ze al snel niet meer wie ze moet vertrouwen, en worden de grenzen tussen goed en kwaad steeds onduidelijker.',0,NULL,'2015-06-09',3,'NL','','serie'),
(5,'De luizenmoeder',4.8,'Het verhaal speelt zich af op de fictieve basisschool De Klimop in Dokkum. De school heeft een zwaar jaar achter de rug, waarin enkele leraren en de conciërge ontslagen zijn. Het is nu aan de schoolleiding om in het nieuwe schooljaar een frisse start te maken. Centraal staan Hannah (Jennifer Hoffman), de moeder van Floor, de \\\'luizenmoeder\\\', en juf Ank (Ilse Warringa), de kordate onderwijzeres. Als moeder van een nieuwe leerling moet Hannah zich staande houden in een absurdistische wereld van hangouders, moedermaffia, schoolpleinregels, rigide verjaardagsprotocollen, verantwoorde traktaties, parkeerbeleid, appgroepjes, ouderparticipatie en ander leed. Ook worden de belevenissen van de andere ouders en de schoolleiding gevolgd. De ouders (moeders) worden geacht het onderwijs te ondersteunen als vrijwilligers en de onderste tree in de bijbehorende hiërarchie die tot de ouderraad loopt is die van luizenmoeder, de moeder die schoolkinderen met een luizenkam controleert op luizen in het haar en deze verwijdert.',1,NULL,'2018-09-11',2,'NL','','serie'),
(6,'My little pony',1.0,'De serie begint met een eenhoorn genaamd Twilight Sparkle, een student van Equestria\\\'s heerser, prinses Celestia. Nadat ze ziet hoe haar student zich alleen maar bezighoudt met boeken, stuurt prinses Celestia haar naar Ponyville met de opdracht een paar vrienden te maken. Twilight Sparkle, samen met haar assistent, een babydraak genaamd Spike, raakt bevriend met de pony\\\'s Pinkie Pie, Applejack, Rainbow Dash, Rarity en Fluttershy. Samen beleven ze avonturen binnen en buiten de stad en lossen ze diverse problemen op. De meeste afleveringen eindigen met Twilight Sparkle of iemand anders die een brief schrijft aan de prinses over wat ze die aflevering geleerd heeft over de magie van de vriendschap. Ook zit er in iedere aflevering een belangrijke les over vriendschap.',0,NULL,'2011-10-13',25,'USA','','serie'),
(7,'Black Panther',4.5,'Duizenden jaren geleden stortte er in Afrika een meteoriet neer op aarde, vol met het metaal vibranium. Vijf stammen trokken ten strijde om dit als hun bezit te claimen. Tijdens de oorlog nam één krijger een paars, hartvormig kruid in dat was aangetast door het vibranium. Dit maakte hem de eerste Black Panther. Hij verenigde vier van vijf stammen en vormde het land Wakanda. Alleen de Jabari-stam bleef autonoom. In de eeuwen die volgden, gebruikten de Wakandanen het vibranium om een technologisch extreem gevorderde beschaving op te bouwen, zich intussen voordoend als een derdewereldland om hun geïsoleerde positie in de wereld te behouden.',1,134,'2018-02-14',NULL,'USA','xjDjIWPwcPU','film'),
(8,'John Wick',4.8,'John Wick is een legende in het misdaadcircuit als voormalige huurmoordenaar voor de Russische maffia. Hij trok zich terug uit deze wereld om te trouwen met zijn geliefde Helen. Wanneer zij vijf jaar later overlijdt aan kanker, krijgt hij in haar opdracht een puppy met de naam Daisy thuisbezorgd. Bij het cadeau zit een brief van Helen waarin ze hem vertelt dat ze hem het hondje geeft omdat ze wil dat hij iets heeft om van te houden. Wick weet niet meteen wat hij met Daisy aan moet, maar het beestje is zo speels, af- en aanhankelijk dat hij van haar gaat houden.',1,110,'2014-11-20',4,'USA','2AUmvWm5ZDQ','film'),
(9,'Frozen',4.0,'Er zijn twee prinsessen in het koninkrijk Arendelle: Elsa (Idina Menzel), de troonopvolgster, en haar jongere zus Anna (Kristen Bell). Elsa heeft magische krachten, waarmee ze sneeuw en ijs kan creëren. Als kleine meisjes spelen ze samen met Elsa\\\'s krachten. Het spel loopt uit de hand, wanneer Elsa per ongeluk Anna\\\'s hoofd raakt. Anna raakt hierdoor bewusteloos. Elsa roept haar ouders en die weten hoe ze het leven van Anna kunnen redden. Ze brengen een bezoek aan de trollen die Anna kunnen helpen. Ze wissen haar geheugen gedeeltelijk waardoor ze niet meer weet dat Elsa magische krachten heeft. De trol vraagt de koning en koningin om de krachten van Elsa te verbergen voor de buitenwereld en ook voor haar zusje. Hierdoor leven ze voortaan allebei een apart bestaan in hetzelfde gesloten kasteel.',NULL,102,'2013-12-11',3,'USA','5ddmISZWTAA','film'),
(10,'Moana',4.2,'De tiener Vaiana, dochter van een opperhoofd gaat op zoek naar de halfgod Maui. Samen met Maui vertrekt ze op een avontuurlijke reis over de oceaan op zoek naar het legendarisch eiland Te Fiti om haar volk van de ondergang te redden.',0,103,'2016-11-30',2,'USA','FpNcGOB_qVQ','film'),
(11,'Sint',1.0,'In de 15e eeuw leefde St. Niklas, een in ongenade gevallen bisschop die met een bende rovers plunderend en moordend door de straten trok. Wanneer hij eraan kwam, riepen de dorpsmensen hun families naar binnen en barricadeerden ze hun huizen. De knechten van Niklas trapten de gesloten deuren niettemin in en klommen ook via de schoorstenen naar binnen. Nadat Niklas op 5 december 1492 weer nietsontziend had toegeslagen, sloegen de dorpelingen terug. Zodra Niklas en zijn trawanten zich in hun boot bevonden, stak de woedende menigte die in brand. De bisschop en zijn handlangers kwamen om in de vlammen.',NULL,85,'2010-11-11',NULL,'NL','Xv3G70mm18k','film'),
(12,'Love, Death & Robots ',8.4,'A collection of animated short stories that span various genres including science fiction, fantasy, horror and comedy.',NULL,NULL,'2019-06-12',3,'USA','wUFwunMKa4E','serie'),
(13,'Cyberpunk: Edgerunners',8.5,'The series tells a standalone, 10-episode story about a street kid trying to survive in Night City — a technology and body modification-obsessed city of the future. Having everything to lose, he stays alive by becoming an edgerunner — a mercenary outlaw also known as a cyberpunk.',69420,NULL,'2022-12-31',1,'USA','JtqIas3bYhg','serie');



-- GEBRUIKERS

CREATE TABLE gebruikers (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(255) NOT NULL UNIQUE,
wachtwoord VARCHAR(255) NOT NULL
);

INSERT INTO gebruikers (username, wachtwoord) VALUES ('test-user', '1234');

SELECT * FROM gebruikers;
