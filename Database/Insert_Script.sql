--USE EenmaalAndermaal
USE iproject48
/*
INSERT SCRIPT
*/

--==========================================================
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

--==========================================================

--==========================================================
INSERT INTO Gebruiker
VALUES ( 
		 1,
		 'MalleMan',
		 'Jan',
		 'Jansen',
		 'Groenewoud 11',
		 NULL,
		 '5043AG',
		 'Nijmegen',
		 'NLD',
		 '8 August 1990',
		 'MalleMan@hotmail.com',
		 'testwachtwoord',
		  1,
		 '4 February 1960',
		  1,
		  1,
		  NULL
),
(		
		 2,
		 'ZwoeleMan',
		 'Mark',
		 'Wahlberg',
		 'Tweekamp 11',
		 NULL,
		 '2012PF',
		 'Arnhem',
		 'NLD',
		 '22 January 1985',
		 'ZwoeleMan@hotmail.com',
		 'testwachtwoord',
		  2,
		 'Rufus',
		 0,
		 1,
		 NULL
),
(		 
		 3,
		 'Zuckerborg',
		 'Mark',
		 'Zuckerberg',
		 'Acaciastraat 10',
		 NULL,
		 '1204 TQ',
		 'Wijchen',
		 'NLD',
		 '6 May 1983',
		 'W4TCH1NGY0U@Botmail.com',
		 'TestWachtwoord',
		  5,
		 'Facebook',
		 1,
		 1,
		 NULL
),
(		 
		 4,
		 'HAXOR',
		 'Max',
		 'Smit',
		 'Oebranilaan 12',
		  NULL,
		 '9043 TY',
		 'Rotterdam',
		 'NLD',
		 '29 November 1994',
		 'Pegasister@gmail.com',
		 'TestWachtwoord',
		  2,
		 'Rex',
		 1,
		 1,
		 NULL

),
(		 
		 5,
		 'Piertje12',
		 'Roos',
		 'Malenboom',
		 'Veluwelaan 265',
		  NULL,
		 '5053CE',
		 'Otterlo',
		 'NLD',
		 '11 March 2001',
		 'Piertje12@gmail.com',
		 'TestWachtwoord',
		 4,
		 'Pannekoeken',
		 0,
		 1,
		 NULL
)



GO
--===============================================
INSERT INTO Gebruikerstelefoon
VALUES ( 
		1,
		1,
		310653424234
		 
)

GO
--===============================================
INSERT INTO Rubriek
VALUES (
		1,
		'Speelgoed',
		1,
		1
)
GO
--===============================================
INSERT INTO Verkoper
VALUES (
		1,
		'Rabobank',
		'1234567',
		'Reader',
		'AB123CD456EF789'
),
(
		4,
		'Rabobank',
		'694946',
		'Reader',
		'B345E410G500'
),
(		3,
		'ABN Ambro',
		'6924234',
		'Reader',
		'OP869CYKA5032'

)


GO
--================================================
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
		1,
		NULL,
		'24 April 2018',
		'12:00:00',
		1,
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
		4,
		NULL,
		'8 May 2018',
		'09:00:00',
		0,
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
		4,
		3,
		'23 May 2018',
		'09:00:00',
		1,
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
		3,
		1,
		'24 May 2018',
		'11:20:00',
		1,
		75.00
)
--===========================================
INSERT INTO Voorwerp_in_Rubriek
VALUES (
		1,
		1
)
GO
--===========================================
INSERT INTO Bestand
VALUES (
		'AB12',
		1
)
GO
--===========================================

INSERT INTO Bod
VALUES (
		1,
		26.50,
		2,
		'24 April 2018',
		'9:30:00'
),
(
		3,
		190.00,
		3,
		'23 April 2018',
		'8:30:00'
),
(		4,
		75.00,
		1,
		'21 April 2018',
		'20:00:00'
)
GO
--============================================
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