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
    public function insert(): bool
    {
        $sql = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) 
                    VALUES (:dateHour, :idPatients);';
        $sth = $this->pdo->prepare($sql);

        $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR);
        $sth->bindValue(':idPatients', $this->getIdPatients(), PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
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

    // Méthode qui permet de récupérer les rendez-vous de chaque patient

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

    public static function get($idAppointment): object | bool
    {
        $sql = 'SELECT `appointments`.`id` AS `idAppointment`, `appointments`.`idPatients`,`appointments`.`dateHour`, `patients`.`id`, `patients`.`lastname`, `patients`.`firstname`, `patients`.`phone`, `patients`.`mail`, `patients`.`birthdate`  
        FROM `appointments` 
        JOIN `patients` ON `appointments`.`idPatients`=`patients`.`id` 
        WHERE `appointments`.`id`=:idAppointment;';
        $sth = Database::getInstance()->prepare($sql);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        }
    }
    
    /**************************************************************************************************************/
}