DROP PROCEDURE IF EXISTS telco_anniv.`SP_ADD_ANNIVERSAIRE`;

CREATE DEFINER = `root` @`localhost`
PROCEDURE telco_anniv.`SP_ADD_ANNIVERSAIRE` ()
   LANGUAGE SQL
   DETERMINISTIC
   CONTAINS SQL
   SQL SECURITY DEFINER
BEGIN
   /*Déclaration des variables*/
   DECLARE annivexist         BOOLEAN DEFAULT 0;
   DECLARE dateanniv          DATE;
   DECLARE dateanniversaire   DATE;
   DECLARE datecloture        DATETIME;
   DECLARE libelle_           VARCHAR(255);
   DECLARE jour_             INT;
   DECLARE mois_             INT;
   DECLARE annee_             INT;
   DECLARE compt              SMALLINT DEFAULT 0;
   
   DECLARE CONTINUE HANDLER FOR 1062
   SET @erreur = "Tente de creer un anniversaire existant";

   SET dateanniv = NOW();
   SET annivexist = FX_TEXT_ANNIVERSAIRE(dateanniv);

   /*On teste l'existance s'un anniversaire à la date actuelle*/
   IF annivexist = 0 THEN
      /*S'il n'existe pas on en crée 5 pour date le jour actuel, le jour suivant, jusqu'au 5 jours*/
      WHILE compt < 5
      DO
         SET dateanniversaire = DATE_ADD(dateanniv, INTERVAL compt DAY);
         SET jour_ = DAY(dateanniversaire);
		 SET mois_ = MONTH(dateanniversaire);
		 SET annee_ = YEAR(dateanniversaire);
         SET datecloture = DATE_ADD(dateanniversaire, INTERVAL 1439 MINUTE);
         SET libelle_ = CONCAT("ANNIVERSAIRE DU ", DATE_FORMAT(dateanniversaire, "%d/%m/%Y"));

         INSERT INTO anniversaires(libelle, date_anniv, jour, mois, annee, date_cloture)
              VALUES (libelle_, dateanniversaire, jour_, mois_, annee_, datecloture);

         SET compt = compt + 1;
      END WHILE;
   ELSE
      /*S'il existe on crée un anniversaire avec une date anniversaire de 4 jours d'avance*/
      SET dateanniversaire = DATE_ADD(dateanniv, INTERVAL 4 DAY);
	  SET jour_ = DAY(dateanniversaire);
	  SET mois_ = MONTH(dateanniversaire);
      SET annee_ = YEAR(dateanniversaire);
      SET datecloture = DATE_ADD(dateanniversaire, INTERVAL 1439 MINUTE);
      SET libelle_ = CONCAT("ANNIVERSAIRE DU ", DATE_FORMAT(dateanniversaire, "%d/%m/%Y"));

      INSERT INTO anniversaires(libelle, date_anniv, jour, mois, annee, date_cloture)
              VALUES (libelle_, dateanniversaire, jour_, mois_, annee_, datecloture);

      UPDATE anniversaires
         SET anniv_cloture = 1
       WHERE     date_anniv < dateanniv
             AND date_anniv > DATE_ADD(dateanniv, INTERVAL -30 DAY);
   END IF;
END;