DROP FUNCTION IF EXISTS telco_anniv.`FX_TEXT_ANNIVERSAIRE`;

CREATE DEFINER = `root` @`localhost`
FUNCTION telco_anniv.`FX_TEXT_ANNIVERSAIRE`(dateanniversaire date)
   RETURNS tinyint(1)
   LANGUAGE SQL
   DETERMINISTIC
   CONTAINS SQL
   SQL SECURITY DEFINER
BEGIN
   SET @existant =
          (SELECT COUNT(id)
             FROM anniversaires
            WHERE date_anniv = dateanniversaire);

   IF @existant = 0
   THEN
      RETURN 0;
   ELSE
      RETURN 1;
   END IF;
END;