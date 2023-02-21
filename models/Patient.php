<?php
require_once(__DIR__ . '/../helpers/dd.php');
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
    public function getFirstname()
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
    public function getBirthdate()
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
    public function getPhone()
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
    public function getMail()
    {
        return   $this->mail;
    }


    /**
     * getId
     *
     * @return int
     */
    public function getId()
    {
        return  $this->id;
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

        try {
            $sth = Database::connect()->prepare($request);

            $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
            if ($sth) {
                $sth->execute();
                // renvoyer sur list si execute 
                header('location: /controllers/listPatientCtrl.php?register=ok');
                die;
            } else {
                echo 'erreur bindValue !';
            }
            // si erreur ! renvoyer vers 404 ou  message erreur
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }


    /**
     * listPatient
     *
     * @return array
     */
    public function listPatient()
    {
        $request = 'SELECT * FROM patients;';
        $listPatients = $this->queryRequest($request);
        return $listPatients;
    }


    /**
     * getPatient
     *
     * @return array
     */
    public function getPatient()
    {
        $request = 'SELECT * FROM `patients` WHERE `id` =' . $this->getId() . ' ;';
        $profilPatient = $this->queryRequest($request);
        $profilPatient = $profilPatient[0];
        return $profilPatient;
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
        try {
            $sth = Database::connect()->prepare($request);
            $sth->execute([$mail]);
            $result = $sth->fetchAll();
            return !empty($result) ?? false;
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }


    /**
     * updatePatient
     *
     * @return bool
     */
    public function updatePatient()
    {
        // $request = 'UPDATE `patients` 
        // SET `firstname`=:firstname, `lastname`=:lastname, `birthdate`=:birthdate, `phone`= :phone, `mail`= :mail
        // WHERE id =' . $this->getId() . ' AND `mail` <> (SELECT * FROM (SELECT `mail` FROM `patients` WHERE id=' . $this->getId() . ') as patient_mail);';

        $request = 'UPDATE `patients` 
                    SET `firstname`=:firstname, `lastname`=:lastname, `birthdate`=:birthdate, `phone`= :phone, `mail`= :mail
                    WHERE id =' . $this->getId() . ';';
        try {
            $sth = Database::connect()->prepare($request);

            $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
            $sth->execute();
            // renvoyer sur list si execute 
            header('location: /controllers/listPatientCtrl.php?register=update');
            die;

            // si erreur ! renvoyer vers 404 ou  message erreur
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }

    // FIN création class patient
}
