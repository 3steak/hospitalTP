<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../models/Patient.php');
class Appointment extends Patient
{
    private $id;
    private $dateHour;
    private $idPatient;


    public function __construct()
    {
        parent::__construct();
    }

    /**Recupere l'id du rdv
     * getId
     *
     * @return int
     */
    public function getId()
    {
        return  $this->id;
    }

    /**Enregistre l'id du rdv
     * setId
     *
     * @param  mixed $id
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Enregistre la valeur de l'id du patient
     *
     * @return  self
     */
    public function setIdPatient($idPatients)
    {
        $this->idPatient = $idPatients;

        return $this;
    }

    /** Retourne l'id du patient du rdv
     * getId
     *
     * @return int
     */
    public function getIdPatients()
    {
        return  $this->idPatient;
    }

    /**
     * Recupère la dateheure du rdv
     */
    public function getDateHour()
    {
        return $this->dateHour;
    }

    /**
     * Enregistre la date et l'heure du rdv
     *
     * @return  self
     */
    public function setDateHour($dateHour)
    {
        $this->dateHour = $dateHour;

        return $this;
    }
    // Fin class 
}
