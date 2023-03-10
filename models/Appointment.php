<?php
require_once(__DIR__ . '/../helpers/database.php');

class Appointment
{

    private int $id;
    private string $dateHour;
    private int $idPatients;

    private object $pdo;


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setDateHour(string $dateHour): void
    {
        $this->dateHour = $dateHour;
    }

    public function getDateHour(): string
    {
        return $this->dateHour;
    }

    public function setIdPatients(int $idPatients): void
    {
        $this->idPatients = $idPatients;
    }

    public function getIdPatients(): int
    {
        return $this->idPatients;
    }

    /**
     * Méthode magique qui permet d'hydrater notre objet 'patient' avec la connexion PDO
     * 
     * @return boolean
     */
    public function __construct()
    {
        // Hydratation de l'objet contenant la connexion à la BDD
        $this->pdo = Database::getInstance();
    }
    /**************************************************************************************************************/
    /**
     * Méthode qui permet de créer un rendez-vous
     * 
     * @return boolean
     */
    public function insert() {
        $sql = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) 
                VALUES (:dateHour, :idPatients)';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sth->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $sth->execute();
    }
    /**************************************************************************************************************/
    /**************************************************************************************************************/

    //Méthode qui permet de lister les rendez-vous

    public static function getListrdv(): array 
    {
        $sql = 'SELECT `appointments`.`id` AS `idAppointment`, `patients`.`lastname`, `patients`.`firstname`, 
                DATE_FORMAT(`dateHour`, \'%d/%m/%Y à %H:%i \'), `appointments`.`dateHour`, `appointments`.`idPatients` 
                FROM `appointments` 
                INNER JOIN `patients` 
                ON `patients`.`id` = `appointments`.`idPatients` 
                ORDER BY `dateHour`;';
        $sth = Database::getInstance()->prepare($sql);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        }
    }

    /**************************************************************************************************************/
    /**************************************************************************************************************/
    
    public static function isIdExists(int $idPatients): bool|object
    {

        $sql = 'SELECT `id` FROM `patients` WHERE `id` = :idPatients';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':idPatients', $idPatients, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetch();
    }

    /**************************************************************************************************************/
    /**************************************************************************************************************/

    // A vérifier plus tard 

    public function getPatientAppointments() {
        $sql = 'SELECT DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, `dateHour`,
        DATE_FORMAT(`dateHour`,\'%h:%i\') AS `hour` 
        FROM `appointments`
        WHERE `appointments`.`idPatients` = :idPatients';
        $sth = $this->pdo->prepare($sql);
        //bindValue vérifie l'authenticité des valeurs provenant du formulaire de modification avant l'éxecution de la requête.
        $sth->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        //Renvoie un TRUE ou un FALSE qui sera testé dans le contrôleur
        $sth->execute();
        //On utilise un fetchAll car un ou plusieurs rendez-vous peuvent être affichés.
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    /**************************************************************************************************************/
    /**************************************************************************************************************/

    //Méthode pour afficher les rendez-vous d'un même patient en dessous de son profil.
    public static function getAppointment($idAppointment): object|bool
    {   
        $sql = 'SELECT `appointments`.`id` AS `idAppointment`, `appointments`.`idPatients`,`appointments`.`dateHour`, `patients`.`lastname`, `patients`.`firstname` 
            FROM `appointments` 
            JOIN `patients` ON `appointments`.`idPatients`=`patients`.`id` 
            WHERE `appointments`.`id`= :idAppointment;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':idAppointment', $idAppointment, PDO::PARAM_INT);
        $sth->execute();
        $results = $sth->fetch(PDO::FETCH_OBJ);
        return $results;
    }
        
    //Modification d'un rendez-vous
    public function updateRdv($idAppointment): object | bool
    {
        $sql = 'UPDATE `appointments` 
                SET `dateHour`=:dateHour, `idPatients`=:idPatients 
                WHERE `appointments`.`id`= :idAppointment;';

        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sth->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $sth->bindValue(':idAppointment', $idAppointment, PDO::PARAM_INT);
        $sth->execute();
        $results = $sth->rowCount();
        return ($results > 0) ? true : false;
    }

    //Méthode de suppression d'un rendez-vous.
    public static function deleteAppointment($idAppointment)
    {
        $sql = 'DELETE FROM `appointments`
                WHERE `appointments`.`id` = :idAppointment ;';

        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':idAppointment', $idAppointment, PDO::PARAM_INT);
       
        $results =  $sth->execute();
        if ($results) {
            return ($sth->rowCount() > 0) ? true : false;
        }
        
        
    }
    /**************************************************************************************************************/
}