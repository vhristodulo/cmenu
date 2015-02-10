CREATE TABLE IF NOT EXISTS Kategorija (

	IdKategorija		INT(11)									NOT NULL		AUTO_INCREMENT,
	IdNadKategorija		INT(11)									DEFAULT NULL,
	Naziv				VARCHAR(50) COLLATE utf8_unicode_ci		NOT NULL,

	PRIMARY KEY							(IdKategorija),
	FOREIGN KEY		IdNadKategorija		(IdNadKategorija)		REFERENCES Kategorija(IdKategorija),
	UNIQUE KEY		Naziv				(Naziv)

) ENGINE=InnoDB		DEFAULT CHARSET=utf8	COLLATE=utf8_unicode_ci		AUTO_INCREMENT=1;
