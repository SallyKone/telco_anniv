DROP PROCEDURE IF EXISTS telco_anniv.`SP_CANDIDAT_COMPETITION`;

CREATE DEFINER = `root` @`localhost`
PROCEDURE telco_anniv.`SP_CANDIDAT_COMPETITION` ()
   LANGUAGE SQL
   DETERMINISTIC
   CONTAINS SQL
   SQL SECURITY DEFINER
BEGIN
/**/
	SELECT c.id as "candidat", login FROM candidats c JOIN participes p ON c.id = p.id_candidat JOIN anniversaires a ON a.id = p.id_anniversaire
	 WHERE a.anniv_cloture = 0 AND codecandidat LIKE "tempo%";
END;