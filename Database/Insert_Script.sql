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
--===============================================
INSERT INTO Gebruikerstelefoon
VALUES ( 
		1,
		'MalleMan',
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