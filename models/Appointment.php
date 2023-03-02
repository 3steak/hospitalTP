<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../models/Patient.php');
class Appointment extends Patient
{
    private int $id;
    private string $dateHour;
    private int $idPatient;


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
    public function getIdPatient(): int
    {
        return  $this->idPatient;
    }

    /**
     * Recupère la dateheure du rdv
     */
    public function getDateHour(): string
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



    /**Permet d'ajouter un rdv
     * addAppointment
     *
     * @return bool
     */
    public function addAppointment(): bool
    {
        $request = "INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES
    (:dateHour, :idPatients);";

        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':dateHour', $this->getDatehour(), PDO::PARAM_STR);
        $sth->bindValue(':idPatients', $this->getIdPatient(), PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /**Permet de lister les rdv
     * listAppointment
     *
     * @return array
     */
    public static function listAppointment(): array
    {
        $request = 'SELECT appointments.id, `dateHour`, `idPatients`, `lastname`, `firstname`, `mail`
                    FROM `appointments` JOIN `patients` 
                    ON appointments.idPatients = patients.id;';
        $database = new Database();
        $listAppointments = $database->queryRequest($request);
        return $listAppointments;
    }

    /** Permet de récupérer un rdv selon un id
     * getAppointment
     *
     * @param  mixed $id
     * @return object
     */
    public static function getAppointment($id): object|bool
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

    /**Permet de supprimer un rendez-vous
     * deleteAppointment
     *
     * @param  mixed $id
     * @return void
     */
    public static function deleteAppointment($id)
    {
        $request = 'DELETE FROM `appointments` WHERE id = :id;';
        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    /** Permet de mettre à jour le rdv
     * updateAppointment
     *
     * @return bool
     */
    public function updateAppointment(): bool
    {
        $request = 'UPDATE `appointments` 
                    SET `dateHour`=:dateHour, `idPatients`=:idPatients
                    WHERE id = :id ;';
        $sth = Database::connect()->prepare($request);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':idPatients', $this->idPatient, PDO::PARAM_INT);
        $sth->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();
        return ($result > 0) ? true : false;
    }


    //  Verif id 
    /**
     * isIdRdvExist
     *
     * @param  mixed $id
     * @return bool
     */
    public static function isIdRdvExist(int $id): bool|object
    {
        $request = 'SELECT * FROM `appointments` WHERE `id` = ? ;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$id]);
        $result = $sth->fetch();
        return !empty($result) ?? false;
    }


    /** Retourne true ou false si la date existe en fonction de la dateHour
     * isAptExist
     *
     * @param  mixed $dateHour
     * @return bool
     */
    public static function isAptExist(string $dateHour): bool
    {
        $request = 'SELECT `dateHour`
        FROM `appointments` JOIN `patients` 
        ON appointments.idPatients = patients.id  WHERE appointments.dateHour =?;';
        $sth = Database::connect()->prepare($request);
        $sth->execute([$dateHour]);
        $result = $sth->fetchAll();
        return !empty($result) ?? false;
    }
    // Fin class 
}
