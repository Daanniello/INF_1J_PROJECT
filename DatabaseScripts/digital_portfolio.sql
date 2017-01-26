--
-- Database: `digital_portfolio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `AdminCode` int(11) NOT NULL,
  `Naam` varchar(30) DEFAULT NULL,
  `TelphoneNumber` int(10) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `GebruikerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `Message` varchar(250) NOT NULL,
  `GebruikerID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `comment`
--

INSERT INTO `comment` (`CommentID`, `Message`, `GebruikerID`, `Date`, `Time`) VALUES
(1, 'Dit is een comment ', 3, '2017-01-18', '11:17:13'),
(2, 'hoI ', 3, '2017-01-18', '11:18:40'),
(3, 'IK BEN EEN DOCENT ', 4, '2017-01-18', '11:23:06'),
(4, 'sssd', 3, '2017-01-18', '12:15:19'),
(5, 'Hoi', 4, '2017-01-21', '18:59:23'),
(6, 'TEST', 4, '2017-01-21', '18:59:38'),
(7, 'Wow dit is super leuk !', 3, '2017-01-23', '00:12:40'),
(8, 'd vv xv xcvx', 3, '2017-01-26', '13:13:19');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cv`
--

CREATE TABLE `cv` (
  `CV_ID` int(11) NOT NULL,
  `Link` varchar(45) DEFAULT NULL,
  `StudentNummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cv`
--

INSERT INTO `cv` (`CV_ID`, `Link`, `StudentNummer`) VALUES
(1, 'xlsx', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docent`
--

CREATE TABLE `docent` (
  `DocentCode` int(11) NOT NULL,
  `Naam` varchar(30) DEFAULT NULL,
  `Postvak` int(4) DEFAULT NULL,
  `TelefoonNummer` varchar(10) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `ProjectNummmer` int(11) DEFAULT NULL,
  `GebruikerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `GebruikerID` int(11) NOT NULL,
  `Gebruiker` varchar(30) DEFAULT NULL,
  `Rechtcode` int(11) DEFAULT NULL,
  `Wachtwoord` varchar(61) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`GebruikerID`, `Gebruiker`, `Rechtcode`, `Wachtwoord`) VALUES
(3, 'Daanniello', 1, '$2a$07$XG15uJVTXq5dHVG85giiR.P3oXotwOJuAYbZcHwwnZ9lixcSJi1J.'),
(4, 'docenten', 2, '$2a$07$APkzLdXrIyBwwtqRRzWDfusg.tcnGj8b.z7xwF4je/o7jkPyBJIxq'),
(5, 'henkhenk', 1, '$2a$07$JYGbFHFN2d48dlgw9hE9auMZGGJkD8zIQLhUbvxbZe1fQbLbc6eqe'),
(6, 'daanniello1', 1, '$2a$07$gn8AvLnlrZ1SHZmKNwVVQeg9uYDdtHJRdzGa0lg0Sw1aL9ABscBMq'),
(7, 'slbdocent', 3, '$2a$07$1Wyw8c3ypRSklUDyGNYGb.kiLNzF62ImSbVJdTKpFSDWWugOKesJW');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker_heeft_internecommunicatie`
--

CREATE TABLE `gebruiker_heeft_internecommunicatie` (
  `Code_Communicatie_ID` int(11) NOT NULL,
  `GebruikerID` int(11) DEFAULT NULL,
  `CommunicatieCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `internecommunicatie`
--

CREATE TABLE `internecommunicatie` (
  `CommunicatieCode` int(11) NOT NULL,
  `InterneCommunicatie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE `project` (
  `ProjectNummer` int(11) NOT NULL,
  `Naam` varchar(20) DEFAULT NULL,
  `Project` varchar(20) DEFAULT NULL,
  `StudentNummer` int(11) DEFAULT NULL,
  `Cijfer` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `project`
--

INSERT INTO `project` (`ProjectNummer`, `Naam`, `Project`, `StudentNummer`, `Cijfer`) VALUES
(2, 'Kaas', 'jpg', 3, 10),
(3, 'Hans', 'PNG', 3, 9),
(4, 'LOL', 'jpg', 5, 8),
(5, 'Presentatie', 'docx', 3, 7),
(7, 'boek', 'jpg', 3, 7),
(8, 'Oefening', 'docx', 3, 8),
(9, 'lol', 'log', 3, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recht`
--

CREATE TABLE `recht` (
  `RechtCode` int(11) NOT NULL,
  `Recht` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `recht`
--

INSERT INTO `recht` (`RechtCode`, `Recht`) VALUES
(1, 'Student'),
(2, 'Docent'),
(3, 'SLBer'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slber`
--

CREATE TABLE `slber` (
  `SLBerID` int(11) NOT NULL,
  `Naam` varchar(30) DEFAULT NULL,
  `TelefoonNummer` int(10) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `GebruikerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slber_heeft_slbproduct`
--

CREATE TABLE `slber_heeft_slbproduct` (
  `Code_SLB_ID` int(11) NOT NULL,
  `SLBerID` int(11) DEFAULT NULL,
  `SLBProductCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slbproduct`
--

CREATE TABLE `slbproduct` (
  `SLBProductCode` int(11) NOT NULL,
  `Historie` varchar(255) DEFAULT NULL,
  `SLBProduct` varchar(20) DEFAULT NULL,
  `Cijfer` float DEFAULT NULL,
  `GebruikerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `slbproduct`
--

INSERT INTO `slbproduct` (`SLBProductCode`, `Historie`, `SLBProduct`, `Cijfer`, `GebruikerID`) VALUES
(1, 'Malware', 'png', 5, 3),
(3, 'LOGI', 'docx', 7, 3),
(4, 'boeki', 'xlsx', 10, 3),
(5, 'inhouf', 'docx', 4, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `social`
--

CREATE TABLE `social` (
  `StudentNummer` int(11) NOT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `social`
--

INSERT INTO `social` (`StudentNummer`, `facebook`, `linkedin`, `twitter`, `instagram`) VALUES
(3, 'ok', 'HOIIOIII', NULL, 'ok');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `StudentNummer` int(11) NOT NULL,
  `Naam` varchar(30) DEFAULT NULL,
  `TelefoonNummer` varchar(10) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Land` varchar(20) DEFAULT NULL,
  `Woonplaats` varchar(25) DEFAULT NULL,
  `Adres` varchar(250) DEFAULT NULL,
  `Postcode` varchar(6) DEFAULT NULL,
  `School` varchar(20) DEFAULT NULL,
  `GeboorteDatum` date DEFAULT NULL,
  `Profielfoto` varchar(400) DEFAULT NULL,
  `GebruikerID` int(11) DEFAULT NULL,
  `beschrijving` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `student`
--

INSERT INTO `student` (`StudentNummer`, `Naam`, `TelefoonNummer`, `Email`, `Land`, `Woonplaats`, `Adres`, `Postcode`, `School`, `GeboorteDatum`, `Profielfoto`, `GebruikerID`, `beschrijving`) VALUES
(3, 'Daan', '0650214118', 'daansmits_@hotmail.com', 'Afghanistan', 'Emmen', 'Groenespecht 6', '7827RD', 'Stenden', '0000-00-00', '.png', 3, 'Hoi ik ben Daan en dit is mijn portfolio, je kunt hier van alles van mij vinden.'),
(4, 'Docent', '0650214118', 'kipdaan100@hotmail.nl', 'Netherlands', 'plaats', 'plaats', '7827RD', 'Stenden', '0767-07-08', '.jpg', 4, NULL),
(5, 'Henk', '8798989878', 'henk@henk.com', 'Kazakhstan', 'kjllkjkjljlk', 'jlkjkljlkkjl', 'kjlkjl', 'jjkkljkljkljklj', '0887-09-08', '.jpg', 5, NULL),
(6, 'Daan', '0650214118', 'kipdaan100@hotmail.com', 'Netherlands', 'plaats', 'plaats', '7827RD', 'Stenden', '0053-03-04', '.png', 6, NULL),
(7, 'SLB', '8909898988', 'docent@docent.com', 'Bahamas', 'Emmen', 'specht', '7827RD', 'Stenden', '8787-07-08', '.jpg', 7, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `style`
--

CREATE TABLE `style` (
  `StyleID` int(11) NOT NULL,
  `StyleCode` int(2) DEFAULT NULL,
  `KleurCode` varchar(30) DEFAULT NULL,
  `Lettertype` varchar(16) DEFAULT NULL,
  `LetterGrote` int(3) DEFAULT NULL,
  `StudentNummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `style`
--

INSERT INTO `style` (`StyleID`, `StyleCode`, `KleurCode`, `Lettertype`, `LetterGrote`, `StudentNummer`) VALUES
(1, 1, '#000000', 'arial', 11, 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminCode`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexen voor tabel `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`CV_ID`),
  ADD KEY `StudentNummer` (`StudentNummer`);

--
-- Indexen voor tabel `docent`
--
ALTER TABLE `docent`
  ADD PRIMARY KEY (`DocentCode`),
  ADD KEY `ProjectNummmer` (`ProjectNummmer`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`GebruikerID`),
  ADD KEY `Rechtcode` (`Rechtcode`);

--
-- Indexen voor tabel `gebruiker_heeft_internecommunicatie`
--
ALTER TABLE `gebruiker_heeft_internecommunicatie`
  ADD PRIMARY KEY (`Code_Communicatie_ID`),
  ADD KEY `GebruikerID` (`GebruikerID`),
  ADD KEY `CommunicatieCode` (`CommunicatieCode`);

--
-- Indexen voor tabel `internecommunicatie`
--
ALTER TABLE `internecommunicatie`
  ADD PRIMARY KEY (`CommunicatieCode`);

--
-- Indexen voor tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectNummer`),
  ADD KEY `StudentNummer` (`StudentNummer`);

--
-- Indexen voor tabel `recht`
--
ALTER TABLE `recht`
  ADD PRIMARY KEY (`RechtCode`);

--
-- Indexen voor tabel `slber`
--
ALTER TABLE `slber`
  ADD PRIMARY KEY (`SLBerID`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexen voor tabel `slber_heeft_slbproduct`
--
ALTER TABLE `slber_heeft_slbproduct`
  ADD PRIMARY KEY (`Code_SLB_ID`),
  ADD KEY `SLBerID` (`SLBerID`),
  ADD KEY `SLBProductCode` (`SLBProductCode`);

--
-- Indexen voor tabel `slbproduct`
--
ALTER TABLE `slbproduct`
  ADD PRIMARY KEY (`SLBProductCode`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexen voor tabel `social`
--
ALTER TABLE `social`
  ADD KEY `StudentNummer` (`StudentNummer`);

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentNummer`),
  ADD KEY `GebruikerID` (`GebruikerID`);

--
-- Indexen voor tabel `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`StyleID`),
  ADD KEY `StudentNummer` (`StudentNummer`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminCode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `cv`
--
ALTER TABLE `cv`
  MODIFY `CV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `docent`
--
ALTER TABLE `docent`
  MODIFY `DocentCode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `GebruikerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `gebruiker_heeft_internecommunicatie`
--
ALTER TABLE `gebruiker_heeft_internecommunicatie`
  MODIFY `Code_Communicatie_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `internecommunicatie`
--
ALTER TABLE `internecommunicatie`
  MODIFY `CommunicatieCode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `project`
--
ALTER TABLE `project`
  MODIFY `ProjectNummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `recht`
--
ALTER TABLE `recht`
  MODIFY `RechtCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `slber`
--
ALTER TABLE `slber`
  MODIFY `SLBerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `slber_heeft_slbproduct`
--
ALTER TABLE `slber_heeft_slbproduct`
  MODIFY `Code_SLB_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `slbproduct`
--
ALTER TABLE `slbproduct`
  MODIFY `SLBProductCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `student`
--
ALTER TABLE `student`
  MODIFY `StudentNummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `style`
--
ALTER TABLE `style`
  MODIFY `StyleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`GebruikerID`);

--
-- Beperkingen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`GebruikerID`);

--
-- Beperkingen voor tabel `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`StudentNummer`) REFERENCES `student` (`StudentNummer`);

--
-- Beperkingen voor tabel `docent`
--
ALTER TABLE `docent`
  ADD CONSTRAINT `docent_ibfk_1` FOREIGN KEY (`ProjectNummmer`) REFERENCES `project` (`ProjectNummer`),
  ADD CONSTRAINT `docent_ibfk_2` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`GebruikerID`);

--
-- Beperkingen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD CONSTRAINT `gebruiker_ibfk_1` FOREIGN KEY (`Rechtcode`) REFERENCES `recht` (`RechtCode`);

--
-- Beperkingen voor tabel `gebruiker_heeft_internecommunicatie`
--
ALTER TABLE `gebruiker_heeft_internecommunicatie`
  ADD CONSTRAINT `gebruiker_heeft_internecommunicatie_ibfk_1` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`GebruikerID`),
  ADD CONSTRAINT `gebruiker_heeft_internecommunicatie_ibfk_2` FOREIGN KEY (`CommunicatieCode`) REFERENCES `internecommunicatie` (`CommunicatieCode`);

--
-- Beperkingen voor tabel `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`StudentNummer`) REFERENCES `student` (`StudentNummer`);

--
-- Beperkingen voor tabel `slber`
--
ALTER TABLE `slber`
  ADD CONSTRAINT `slber_ibfk_1` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`GebruikerID`);

--
-- Beperkingen voor tabel `slber_heeft_slbproduct`
--
ALTER TABLE `slber_heeft_slbproduct`
  ADD CONSTRAINT `slber_heeft_slbproduct_ibfk_1` FOREIGN KEY (`SLBerID`) REFERENCES `slber` (`SLBerID`),
  ADD CONSTRAINT `slber_heeft_slbproduct_ibfk_2` FOREIGN KEY (`SLBProductCode`) REFERENCES `slbproduct` (`SLBProductCode`);

--
-- Beperkingen voor tabel `slbproduct`
--
ALTER TABLE `slbproduct`
  ADD CONSTRAINT `slbproduct_ibfk_1` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`GebruikerID`);

--
-- Beperkingen voor tabel `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `social_ibfk_1` FOREIGN KEY (`StudentNummer`) REFERENCES `student` (`StudentNummer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`GebruikerID`) REFERENCES `gebruiker` (`GebruikerID`);

--
-- Beperkingen voor tabel `style`
--
ALTER TABLE `style`
  ADD CONSTRAINT `style_ibfk_1` FOREIGN KEY (`StudentNummer`) REFERENCES `student` (`StudentNummer`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
