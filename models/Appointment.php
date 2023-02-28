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
    
    public static function getAll(): array 
    {
        $sql = 'SELECT * FROM `appointments`;';
        $sth = Database::getInstance()->prepare($sql);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

}
