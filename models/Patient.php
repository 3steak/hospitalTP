<?php

class Patient
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
    public function __construct(
        string $lastname,
        string $firstname,
        string $birthdate,
        string $phone,
        string $mail
    ) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->birthdate = $birthdate;
        $this->phone = $phone;
        $this->mail = $mail;
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
     * @return string
     */
    public function getId(): int
    {
        $this->id;
    }


    // FIN création character
}
