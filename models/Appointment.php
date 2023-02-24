<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../models/Patient.php');
class Appointment extends Patient
{
    private int $id;
    private string $dateHour;
    private string $idPatient;


    public function __construct()
    {
        parent::__construct();
    }

    /**Recupere l'id du rdv
     * getId
     *
     * @return int
     */
    public function getRdvId(): int
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
    public function setIdPatient(int $idPatient)
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
    public function setDateHour(string $dateHour)
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
        $sth->execute();
        if ($sth->rowCount() > 0) {
            // renvoyer sur list si ligne affectée 
            header('location: /ListAppointments?register=rdvOk');
            die;
        } else {
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }

    public static function listAppointment(): array
    {
        $request = 'SELECT appointments.id, `dateHour`, `idPatients`, `lastname`, `firstname`, `mail`
                    FROM `appointments` JOIN `patients` 
                    ON appointments.idPatients = patients.id;';
        $database = new Database();
        $listAppointments = $database->queryRequest($request);
        return $listAppointments;
    }

    /**
     * getAppointment
     *
     * @param  mixed $idPatient
     * @return object
     */
    public static function getAppointment($id)
    {
        $request = 'SELECT appointments.id, `idPatients`, `lastname`, `firstname`, `mail`,`dateHour`
                    FROM `appointments` JOIN `patients` 
                    ON appointments.idPatients = patients.id  WHERE appointments.id =:id;';
        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $appointment = $sth->fetch();
        return $appointment;
    }

    public function updateAppointment()
    {
        $request = 'UPDATE `appointment` 
                    SET `dateHour`=:dateHour, `idPatients`=:idPatients,
                    WHERE id = :id ;';
        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR);
        $sth->bindValue(':dateHour', $this->getIdPatient(), PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() > 0) {
            // renvoyer sur list si execute 
            header('location: /ListAppointment?register=update');
            die;
        } else {
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }

    //  Verif id 

    //VERIF ID
    public static function isIdRdvExist(int $id)
    {
        $request = 'SELECT * FROM `appointments` WHERE `id` = ? ;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$id]);
        $result = $sth->fetch();
        return !empty($result) ?? false;
    }
    // Fin class 
}
