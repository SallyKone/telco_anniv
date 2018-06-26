DROP FUNCTION IF EXISTS telco_anniv.`FX_TEST_PARTICIPANT`;

CREATE DEFINER = `root` @`localhost`
FUNCTION telco_anniv.`FX_TEST_PARTICIPANT`(idcandidat_    bigint(20),
                                           annee_         int(10))
   RETURNS tinyint(1)
   LANGUAGE SQL
   DETERMINISTIC
   CONTAINS SQL
   SQL SECURITY DEFINER
BEGIN
   SET @existant =
          (SELECT COUNT(*)
             FROM participes
            WHERE annee = annee_ AND id_candidat = idcandidat_);

   IF @existant = 0
   THEN
      RETURN 0;
   ELSE
      RETURN 1;
   END IF;
END;