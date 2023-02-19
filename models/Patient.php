<?php
class Patient extends Database
{
    private $lastname;
    private $firstname;
    private $birthdate;
    private $phone;
    private $mail;
    private $id;

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
    public function getLastname(): string
    {
        $this->lastname;
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
        $this->firstname;
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
        $this->birthdate;
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
        $this->phone;
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
        $this->mail;
    }


    /**
     * getId
     *
     * @return int
     */
    public function getId()
    {
        $this->id;
    }



    /**
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function addPatient()
    {

        $request = 'INSERT INTO `patients` (firstname, lastname, birthdate, phone, mail) VALUES
        (:lastname,:firstname,:birthdate,:phone,:mail)';

        $results = $this->connexion->$this->executeRequest($request);
        $results->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $results->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $results->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
        $results->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
        $results->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);

        // renvoyer sur list si execute 
    }

    // FIN création character
}
