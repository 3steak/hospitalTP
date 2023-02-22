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
    public function setIdPatient($idPatient)
    {
        $this->idPatient = $idPatient;
        return $this;
    }

    /** Retourne l'id du patient du rdv
     * getId
     *
     * @return int
     */
    public function getIdPatient()
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
    public function addAppointment()
    {
        $request = "INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES
    (:dateHour, :idPatients);";

        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':dateHour', $this->getDatehour(), PDO::PARAM_STR);
        $sth->bindValue(':idPatients', $this->getIdPatient(), PDO::PARAM_INT);
        if ($sth) {
            $sth->execute();
            // renvoyer sur list si execute 
            header('location: /ListAppointments?register=rdvOk');
            die;
        } else {
            echo 'erreur bindValue !';
        }
    }

    public static function listAppointment(): array
    {
        $request = 'SELECT * FROM appointments JOIN patients ON appointments.idPatients = patients.id;';
        $database = new Database();
        $listAppointments = $database->queryRequest($request);
        return $listAppointments;
    }

    // Fin class 
}
