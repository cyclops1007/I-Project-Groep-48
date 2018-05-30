/*
RUBRIEK
*/

INSERT INTO EenmaalAndermaal.dbo.Rubriek
	SELECT CAST(ID AS numeric) AS rubriekNummer,
	LEFT (Name,100) AS rubriekNaam,
	CAST(Parent AS numeric) AS rubriek
FROM batch.dbo.Categorieen

--================================================
