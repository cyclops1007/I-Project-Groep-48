/*
CREATE DATABASE EenmaalAndermaal
*/


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

INSERT INTO Vraag
VALUES (
		1, 
		'Wanneer is je moeder geboren?'
),
(		2,
		'Wat is de naam van je eerste huisdier?'
),
(		3,
		'Wat was je bijnaam op de middelbare school?'
),
(		4,
		'Wat is je favoriete maaltijd?'
),
(		5,
		'Bij welk bedrijf kreeg je je eerste baan?'
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

INSERT INTO Gebruiker
VALUES ( 
		 'MalleMan',
		 'Jan',
		 'Jansen',
		 'Groenewoud 11',
		 NULL,
		 '5043AG',
		 'Nijmegen',
		 'Nederland',
		 '8 August 1990',
		 'MalleMan@hotmail.com',
		 'testwachtwoord',
		  1,
		 '4 February 1960',
		 'Ja'
),
( 
		 'ZwoeleMan',
		 'Mark',
		 'Wahlberg',
		 'Tweekamp 11',
		 NULL,
		 '2012PF',
		 'Arnhem',
		 'Nederland',
		 '22 January 1985',
		 'ZwoeleMan@hotmail.com',
		 'testwachtwoord',
		  2,
		 'Rufus',
		 'Nee'
),
(		 'Zuckerborg',
		 'Mark',
		 'Zuckerberg',
		 'Acaciastraat 10',
		 NULL,
		 '1204 TQ',
		 'Wijchen',
		 'Nederland',
		 '6 May 1983',
		 'W4TCH1NGY0U@Botmail.com',
		 'TestWachtwoord',
		  5,
		 'Facebook',
		 'Ja'
),
(		 'HAXOR',
		 'Max',
		 'Smit',
		 'Oebranilaan 12',
		  NULL,
		 '9043 TY',
		 'Rotterdam',
		 'Nederland',
		 '29 November 1994',
		 'Pegasister@gmail.com',
		 'TestWachtwoord',
		  2,
		 'Rex',
		 'Ja'

),
(		 'Piertje12',
		 'Roos',
		 'Malenboom',
		 'Veluwelaan 265',
		  NULL,
		 '5053CE',
		 'Otterlo',
		 'Nederland',
		 '11 March 2001',
		 'Piertje12@gmail.com',
		 'TestWachtwoord',
		 4,
		 'Pannekoeken',
		 'Nee'
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

INSERT INTO Gebruikerstelefoon
VALUES ( 
		1,
		'MalleMan',
		310653424234
		 
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

INSERT INTO Rubriek
VALUES (
		1,
		'Speelgoed',
		1,
		1
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

INSERT INTO Verkoper
VALUES (
		'MalleMan',
		'Rabobank',
		'1234567',
		'Reader',
		'AB123CD456EF789'
),
(
		'HAXOR',
		'Rabobank',
		'694946',
		'Reader',
		'B345E410G500'
),
(		'Zuckerborg',
		'ABN Ambro',
		'6924234',
		'Reader',
		'OP869CYKA5032'

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

INSERT INTO Voorwerp
VALUES ( 
		1,
		'Lego-set',
		'Een oude lego-set.',
		25.00,
		'Online',
		NULL,
		'Nijmegen',
		'Nederland',
		2,
		'23 april 2018',
		'22:00:00',
		NULL,
		NULL,
		'MalleMan',
		NULL,
		'24 April 2018',
		'12:00:00',
		'Ja',
		26.50
),

( 
		2,
		'Katana',
		'Een tweedehands Katana.',
		250.00,
		'Online',
		NULL,
		'Rotterdam',
		'Nederland',
		16,
		'8 April 2018',
		'14:30:00',
		NULL,
		NULL,
		'HAXOR',
		NULL,
		'8 May 2018',
		'09:00:00',
		'Nee',
		NULL
),
( 
		3,
		'GTX 970',
		'Een tweedehands GPU.',
		200.00,
		'Online',
		NULL,
		'Rotterdam',
		'Nederland',
		1,
		'22 April 2018',
		'16:45:00',
		NULL,
		NULL,
		'HAXOR',
		'Zuckerborg',
		'23 May 2018',
		'09:00:00',
		'Ja',
		190.00
),
( 
		4,
		'Chipset',
		'Een tweedehands Chipset.',
		75.00,
		'Online',
		NULL,
		'Wijchen',
		'Nederland',
		23,
		'31 March 2018',
		'02:00:00',
		NULL,
		NULL,
		'Zuckerborg',
		'MalleMan',
		'24 May 2018',
		'11:20:00',
		'Ja',
		75.00
)
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

INSERT INTO Voorwerp_in_Rubriek
VALUES (
		1,
		1
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

INSERT INTO Bestand
VALUES (
		'AB12',
		1
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

INSERT INTO Bod
VALUES (
		1,
		26.50,
		'ZwoeleMan',
		'24 April 2018',
		'9:30:00'
),
(
		3,
		190.00,
		'Zuckerborg',
		'23 April 2018',
		'8:30:00'
),
(		4,
		75.00,
		'MalleMan',
		'21 April 2018',
		'20:00:00'
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

INSERT INTO Feedback
VALUES (
		1,
		'Gebruiker',
		'Positief',
		'24 April 2018',
		'16:30:00',
		'Dit is mijn commentaar!'
),
(
		3,
		'Gebruiker',
		'Positief',
		'24 April 2018',
		'15:30:00',
		'Prima!'
)

GO
/*
============================================================
*/