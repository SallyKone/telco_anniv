DROP TRIGGER IF EXISTS telco_anniv.`AFTER_INSERT_CANDIDAT`;
DELIMITER |
CREATE DEFINER = `root` @`localhost` TRIGGER telco_anniv.`AFTER_INSERT_CANDIDAT`
   AFTER INSERT
   ON telco_anniv.candidats
   FOR EACH ROW
BEGIN
   DECLARE idanniv_v     BIGINT;
   DECLARE dateanniv_v   DATE;
   DECLARE fin_v         TINYINT DEFAULT 0;

   /*Curseur de tous les candidats d'une meme date d'anniversaire*/
   DECLARE
      anniv_cursor CURSOR FOR
         SELECT id, date_anniv
           FROM anniversaires
          WHERE anniv_cloture = 0 AND date_anniv LIKE CONCAT("%", @debutdate);

   DECLARE CONTINUE HANDLER FOR NOT FOUND
   SET fin_v = 1;
   SET @debutdate = CONCAT(NEW.mois_naiss, '-', NEW.jour_naiss);

   OPEN anniv_cursor;

  loop_candidat:
   LOOP
      FETCH anniv_cursor INTO idanniv_v, dateanniv_v;

      IF fin_v = 1
      THEN
         LEAVE loop_candidat;
      END IF;

      INSERT INTO participes(id_candidat, id_anniversaire, annee, created_at)
           VALUES (NEW.id, idanniv_v, YEAR(dateanniv_v), NOW());
   END LOOP loop_candidat;

   CLOSE anniv_cursor;
END |
DELIMITER ;