<?php
require_once(__DIR__ . '/../helpers/database.php');

class Patient
{

    private int $id;
    private string $firstname;
    private string $lastname;
    private string $birthdate;
    private string $phone;
    private string $mail;

    private object $pdo;

    /**
     * Méthode appelée automatiquement lors de l'instanciation de la classe
     */
    public function __construct()
    {
        // hydratation de l'attribut $pdo grâce à la méthode statique "getInstance" et contenant notre objet PDO
        $this->pdo = Database::getInstance();
    }

    /**
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $firstname
     * 
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $lastname
     * 
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $birthdate
     * 
     * @return void
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * @param string $phone
     * 
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $mail
     * 
     * @return void
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * 
     * Méthode permettant de vérifier si un email est présent en bdd
     * 
     * @param string $mail
     * 
     * @return bool
     */
    public static function isMailExists(string $mail): bool|object
    {

        $sql = 'SELECT * FROM `patients` WHERE `mail` = :mail';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sth->execute();

        return $sth->fetch();
    }

    /**
     * Méthode qui permet de créer un patient
     * 
     * @return boolean
     */
    public function insert(): bool
    {

        // On créé la requête avec des marqueurs nominatifs
        $sql = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) 
                VALUES (:lastname, :firstname, :birthdate, :phone, :mail);';

        // On prépare la requête
        $sth = $this->pdo->prepare($sql);

        //Affectation des valeurs aux marqueurs nominatifs
        $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
        // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
        return $sth->execute();
    }

    /**
     * Méthode statique qui permet de lister tous les patients existants
     * 
     * @return array
     */
    public static function getAll(): array // Méthode statique car il est inutile d'instancier, car pas d'hydratation
    {

        // On créé la requête
        $sql = 'SELECT * FROM `patients`;';

        // On prépare la requête
        $sth = Database::getInstance()->prepare($sql);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }


    /**
     * 
     * Méthode permettant de récupérer toutes les données du patient
     * @param int $id
     * 
     * @return mixed
     * Retourne un objet issu de la class Patient ou false
     */
    public static function get(int $id): object|bool
    {
        // On stocke une instance de la classe PDO dans une variable
        $pdo = Database::getInstance();

        // On créé la requête
        $sql = 'SELECT * FROM patients WHERE `id` = :id';

        // On prépare la requête
        $sth = $pdo->prepare($sql);

        // On affecte chaque valeur à chaque marqueur nominatif
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return $sth->fetch();  
        }
    }

    /**
     * Méthode qui permet de mettre à jour un patient
     * 
     * @param int $id
     * 
     * @return boolean
     */

    public function update(int $id): bool
    {
        $sql = 'UPDATE `patients` SET 
                        `lastname` = :lastname, 
                        `firstname` = :firstname, 
                        `birthdate` = :birthdate, 
                        `phone` = :phone, 
                        `mail` = :mail
                WHERE `id` = :id;';

        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':birthdate', $this->getBirthdate());
        $sth->bindValue(':phone', $this->getPhone());
        $sth->bindValue(':mail', $this->getMail());
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
    // Méthode pour afficher les informations de chaque patient
    public static function getPatient($idPatient) 
    {
        $sql = 'SELECT `id` , `lastname` , `firstname` , 
                    DATE_FORMAT(`birthdate`,\'%d.%m.%Y\'), `birthdate`, `phone` , `mail` 
                    FROM `patients`
                    WHERE `id` = :idPatient ;';
        //Dès qu'un marqueur nominatif est présent: on utilise un prepare et non un query
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':idPatient', $idPatient);
        $sth->execute();
        $results = $sth->fetch(PDO::FETCH_OBJ);
        return $results;
    }

    //Méthode de suppression de Patient avec ses rendez-vous
    public static function delete($id)
    {
        $sql = 'DELETE FROM `patients` 
                WHERE `patients`.`id` = :id ;';
        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        
        $results = $sth->execute();
        if ($results) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

}
