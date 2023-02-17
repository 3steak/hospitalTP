<?php
require_once(__DIR__ . '/../config/constant.php');
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;
    private $connexion;


    // Je crée un constructeur pour le dsn et la connexion a la db
    // A la création de ma class le construct se fera
    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $this->connexion = new PDO($dsn, $this->user, $this->password);
        $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }



    /** je crée une fonction pour preparer et executer ma requette sql 
     * executeRequest
     *
     * @param  mixed $request
     * @return array
     */
    public function executeRequest($request): array
    {
        // j'essaie
        //  a mettre dans le ctrl 
        try {
            $stm = $this->connexion->prepare($request);
            $stm->execute();
            // je retourne directement le fetch du statement
            //  qui sera stocké dans une variable
            return $stm->fetchAll();

            // si erreur ! renvoyer vers 404 ou  message erreur
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }



    /** Prepare et execute la requete SQL
     * queryRequest
     *
     * @param  mixed $request
     * @return array
     */
    public function queryRequest($request): array
    {
        // j'essaie
        try {
            $stm = $this->connexion->query($request);
            // je retourne directement le fetch du statement
            //  qui sera stocké dans une variable
            return $stm->fetchAll();

            // si erreur ! renvoyer vers 404 ou  message erreur
        } catch (\Throwable $th) {
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }


    // FIN CLASS
}
