CREATE DATABASE EenmaalAndermaal
GO

/*
============================================================
 DROP TABLES
============================================================
*/
USE EenmaalAndermaal

DROP TABLE Bod
DROP TABLE Gebruikerstelefoon
DROP TABLE Bestand
DROP TABLE Voorwerp_in_Rubriek
DROP TABLE Rubriek
DROP TABLE Feedback
DROP TABLE Voorwerp
DROP TABLE Verkoper
DROP TABLE Gebruiker
DROP TABLE Vraag

GO


USE EenmaalAndermaal
/*
============================================================
VRAAG
============================================================
*/
CREATE TABLE Vraag (
vraagnummer		NUMERIC(6)			NOT NULL,
tekst_vraag		CHAR(125)			NOT NULL,

--PK
CONSTRAINT PK_Vraag PRIMARY KEY(vraagnummer)

)

GO
/*
============================================================
GEBRUIKER
============================================================
*/

CREATE TABLE Gebruiker (
gebruikersnaam	CHAR(30)		NOT NULL,
voornaam		CHAR(30)		NOT NULL,
achternaam		CHAR(30)		NOT NULL,
adresregel1		CHAR(50)		NOT NULL,
adresregel2		CHAR(50),
postcode		CHAR(7)			NOT NULL,
plaatsnaam		CHAR(50)		NOT NULL,
land			CHAR(50)		NOT NULL,
geboortedag		DATE			NOT NULL,
mailbox			CHAR(50)		NOT NULL,
wachtwoord		CHAR(50)		NOT NULL,
vraagnummer		NUMERIC(6)		NOT NULL,
antwoordTekst	CHAR(125)		NOT NULL,
verkoper		CHAR(3)			NOT NULL,

--PK
CONSTRAINT PK_Gebruiker PRIMARY KEY (gebruikersnaam),

--FK
CONSTRAINT FK_Gebruiker__Vraag FOREIGN KEY (vraagnummer)
	REFERENCES Vraag(vraagnummer),

--CK
CONSTRAINT CK_Gebruiker_Verkoper CHECK(verkoper IN ('ja', 'nee')),
CONSTRAINT CK_Gebruiker_Geboortedatum CHECK (geboortedag > '1900')
)

GO
/*
============================================================
GEBRUIKERSTELEFOON
============================================================
*/

CREATE TABLE Gebruikerstelefoon	(
volgnr			NUMERIC(2)		NOT NULL,
gebruiker		CHAR(30)		NOT NULL,
telefoon		NUMERIC(12)		NOT NULL,

--PK
CONSTRAINT PK_Gebruikerstelefoon PRIMARY KEY (volgnr, gebruiker),

--FK
CONSTRAINT FK_Gebruikerstelefoon__Gebruiker FOREIGN KEY (gebruiker)
	REFERENCES Gebruiker(gebruikersnaam)
)

GO
/*
============================================================
RUBRIEK
============================================================
*/

CREATE TABLE Rubriek (
rubriekNummer	NUMERIC(5)		NOT NULL,
rubriekNaam		CHAR(30)		NOT NULL,
rubriek			NUMERIC(5),
volgnr			NUMERIC(2)		NOT NULL,

--PK
CONSTRAINT PK_Rubriek PRIMARY KEY(rubrieknummer),

--FK
CONSTRAINT FK_Rubriek FOREIGN KEY (rubriek)
	REFERENCES Rubriek(rubrieknummer)
)

GO
/*
============================================================
VERKOPER
============================================================
*/

CREATE TABLE Verkoper (
gebruiker		CHAR(30)		NOT NULL,
bank			CHAR(30),
bankrekening	NUMERIC(7),
controleOptie	CHAR(10)		NOT NULL,
creditcard		CHAR(19),

--PK
CONSTRAINT PK_Verkoper PRIMARY KEY(gebruiker),

--FK
CONSTRAINT FK_Verkoper__Gebruiker FOREIGN KEY (gebruiker)
	REFERENCES Gebruiker(gebruikersnaam)
)

GO
/*
============================================================
VOORWERP
============================================================
*/

CREATE TABLE Voorwerp (
voorwerpnummer			NUMERIC(10)		NOT NULL,
titel					CHAR(30)		NOT NULL,
beschrijving			CHAR(125)		NOT NULL,
startprijs				NUMERIC(9)		NOT NULL,
betalingswijzeNaam		CHAR(9)			NOT NULL,
betalingsInstructie		CHAR(23),
plaatsnaam				CHAR(50)		NOT NULL,
land					CHAR(50)		NOT NULL,
looptijd				NUMERIC(3)		NOT NULL,
looptijdBeginDag		DATE			NOT NULL,
looptijdBeginTijdstip	TIME,
verzendkosten			NUMERIC(5),
verzendInstructies		CHAR(50),
verkoper				CHAR(30)		NOT NULL,
koper					CHAR(30),
looptijdEindeDag		DATE			NOT NULL,
looptijdEindeTijdstip	TIME			NOT NULL,
velingGesloten			CHAR(3)			NOT NULL,
Verkoopprijs			NUMERIC(9),

--PK
CONSTRAINT PK_Voorwerp PRIMARY KEY(voorwerpnummer),

--FK
CONSTRAINT FK_Voorwerp__Verkoper FOREIGN KEY (verkoper)
	REFERENCES Verkoper(gebruiker),
CONSTRAINT FK_Voorwerp__Gebruiker FOREIGN KEY (koper)
	REFERENCES Gebruiker(gebruikersnaam)
)

GO
/*
============================================================
VOORWERP_IN_RUBRIEK
============================================================
*/

CREATE TABLE Voorwerp_in_Rubriek (
voorwerp					NUMERIC(10)		NOT NULL,
rubriek_op_Laagste_Niveau	NUMERIC(5)		NOT NULL,

--PK
CONSTRAINT PK_Voorwerp_in_Rubriek PRIMARY KEY(voorwerp, rubriek_op_Laagste_Niveau),

--FK
CONSTRAINT FK_VoorwerpIR__Voorwerp FOREIGN KEY (voorwerp)
	REFERENCES Voorwerp(voorwerpnummer),
CONSTRAINT FK_VoorwerpIR__Rubriek FOREIGN KEY (rubriek_op_Laagste_Niveau)
	REFERENCES Rubriek(rubrieknummer)
)

GO
/*
============================================================
BESTAND
============================================================
*/

CREATE TABLE Bestand (
filenaam		CHAR(13)		NOT NULL,
voorwerp		NUMERIC(10)		NOT NULL,

--PK
CONSTRAINT PK_Bestand PRIMARY KEY (filenaam),

--FK
CONSTRAINT FK_Bestand__Voorwerp FOREIGN KEY (voorwerp) 
	REFERENCES Voorwerp (voorwerpnummer)
)

GO
/*
============================================================
BOD
============================================================
*/

CREATE TABLE Bod (
voorwerp		NUMERIC(10)		NOT NULL,
bodbedrag		NUMERIC(10)		NOT NULL,
gebruiker		CHAR(30)		NOT NULL,
bodDag			DATE			NOT NULL,
bodTijdstip		TIME			NOT NULL,

--PK
CONSTRAINT PK_Bod PRIMARY KEY (voorwerp, bodbedrag),

--FK
 CONSTRAINT FK_Bod__Voorwerp FOREIGN KEY (voorwerp)
	REFERENCES Voorwerp(voorwerpnummer),
 CONSTRAINT FK_Bod__Gebruiker FOREIGN KEY (gebruiker)
	REFERENCES Gebruiker(gebruikersnaam)
)

GO
/*
============================================================
FEEDBACK
============================================================
*/

CREATE TABLE Feedback (
voorwerp		NUMERIC(10)		NOT NULL,
soortGebruiker	CHAR(15)		NOT NULL,
feedbackSoort	CHAR(15)		NOT NULL,
dag				DATE			NOT NULL,
tijdstip		TIME			NOT NULL,
commentaar		CHAR(125),

--PK
CONSTRAINT PK_Feedback PRIMARY KEY (voorwerp, soortGebruiker),

--FK
CONSTRAINT FK_Feedback__Voorwerp FOREIGN KEY (voorwerp)
	REFERENCES Voorwerp(voorwerpnummer),

--CK
CONSTRAINT CK_Feedback_soortGebruiker CHECK(soortGebruiker IN ('Bezoeker', 'Gebruiker', 'Verkoper', 'Beheerder'))
)

GO
/*
============================================================
*/