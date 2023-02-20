<?php
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

    public function addPatient()
    {

        $request = 'INSERT INTO `patients` (firstname, lastname, birthdate, phone, mail) VALUES
        (:lastname,:firstname,:birthdate,:phone,:mail)';

        $results = $this->connexion->prepare($request);

        $results->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $results->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $results->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
        $results->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
        $results->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);

        if ($results) {
            $results->execute();
            // renvoyer sur list si execute 
            header('location: /controllers/listPatientCtrl.php?register=ok');
            die;
        } else {
            echo 'erreur bindValue !';
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


    public function getPatient()
    {
        $request = 'SELECT * FROM patients WHERE id =' . $this->getId() . ' ;';
        $profilPatient = $this->queryRequest($request);
        $profilPatient = $profilPatient[0];
        return $profilPatient;
    }
    // FIN création class patient
}
