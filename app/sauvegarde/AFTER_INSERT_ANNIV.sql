DROP TRIGGER IF EXISTS telco_anniv.`AFTER_INSERT_ANNIV`;
DELIMITER |
CREATE DEFINER = `root` @`localhost` TRIGGER telco_anniv.`AFTER_INSERT_ANNIV`
   AFTER INSERT
   ON telco_anniv.anniversaires
   FOR EACH ROW
BEGIN
   DECLARE idcandidat_v   BIGINT;
   DECLARE dateanniv_v    DATE;
   DECLARE fin_v          TINYINT DEFAULT 0;

   /*Curseur de tous les candidats des anniversaires encours*/
   DECLARE
      candidat_cursor CURSOR FOR
         SELECT id
           FROM candidats
          WHERE mois_naiss = NEW.mois AND jour_naiss = NEW.jour;

   DECLARE CONTINUE HANDLER FOR NOT FOUND
   SET fin_v = 1;

   OPEN candidat_cursor;

  loop_candidat:
   LOOP
      FETCH candidat_cursor INTO idcandidat_v;

      IF fin_v = 1
      THEN
         LEAVE loop_candidat;
      END IF;

      INSERT INTO participes(id_candidat, id_anniversaire, annee, created_at)
           VALUES (idcandidat_v, NEW.id, YEAR(NEW.date_anniv),NOW());
   END LOOP loop_candidat;

   CLOSE candidat_cursor;
END |
DELIMITER ;