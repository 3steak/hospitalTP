<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../helpers/db.php');

class Patient extends Database
{
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;
    private int $id;

    /** Mehode magique permettant de créer mon patient
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    // ---- GETTER SETTER -----
    /**
     * setLastname
     *
     * @param  mixed $lastname
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * setfirstname
     *
     * @param  mixed $firstname
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }


    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * setBirthdate
     *
     * @param  mixed $birthdate
     * @return void
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * getbirthdate
     *
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * setPhone
     *
     * @param  mixed $phone
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * getPhone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * setMail
     *
     * @param  mixed $mail
     * @return void
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * getMail
     *
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }


    /**
     * getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



    /**
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }



    /**
     * addPatient
     *
     * @return void
     */
    public function addPatient()
    {

        $request = 'INSERT INTO `patients` (`firstname`, `lastname`, `birthdate`, `phone`, `mail`) VALUES
        (:lastname,:firstname,:birthdate,:phone,:mail)';

        $sth = Database::connect()->prepare($request);

        $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /**
     * listPatient
     *
     * @return array
     */
    public static function listPatient(): array
    {
        $request = 'SELECT * FROM `patients` ORDER BY `lastname`;';
        $database = new Database();
        $listPatients = $database->queryRequest($request);
        return $listPatients;
    }

    /**
     * getPatient
     *
     * @return object
     */
    public static function getPatient(int $id): object|bool
    {
        // protection contre injection sql grace à :id et prepare
        $request = 'SELECT * FROM `patients` WHERE `id` =:id ;';

        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $profilPatient = $sth->fetch();
        return $profilPatient;
    }

    /**
     * getAppointment
     *
     * @param  mixed $idPatient
     * @return object
     */
    public static function getAppointments($id)
    {
        $request = 'SELECT appointments.id, `idPatients`, `lastname`, `firstname`, `mail`,`dateHour`
                    FROM `appointments` JOIN `patients` 
                    ON appointments.idPatients = patients.id  WHERE appointments.idPatients =:id;';
        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $appointments = $sth->fetchAll();
        return $appointments;
    }

    /**
     * isMailExist
     *
     * @param  mixed $mail
     * @return bool
     */
    public static function isMailExist(string $mail)
    {
        $request = 'SELECT * FROM `patients` WHERE `mail` = ? ;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$mail]);
        $result = $sth->fetchAll();
        return !empty($result) ?? false;
    }


    //VERIF ID
    public static function isIdExist(int $id): bool|object
    {
        $request = 'SELECT * FROM `patients` WHERE `id` = ? ;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$id]);
        $result = $sth->fetch();
        return !empty($result) ?? false;
    }


    /**
     * updatePatient
     *
     * @return bool
     */
    public function updatePatient(): bool
    {
        $request = 'UPDATE `patients` 
                    SET `firstname`=:firstname, `lastname`=:lastname, `birthdate`=:birthdate, `phone`= :phone, `mail`= :mail
                    WHERE id = :id ;';
        $sth = Database::connect()->prepare($request);

        $sth->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }



    public static function deletePatient($id): bool
    {
        $request = 'DELETE FROM `patients` WHERE id = :id;';
        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }
    // FIN création class patient
}
