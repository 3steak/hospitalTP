<?php
require_once(__DIR__ . '/../config/constant.php');
class Database
{
    private static $host = DB_HOST;
    private static $user = DB_USER;
    private static $password = DB_PASS;
    private static $dbname = DB_NAME;
    protected static $connexion;


    // Je crée un constructeur pour le dsn et la connexion a la db
    // A la création de ma class le construct se fera
    public function __construct()
    {
        $this->connect();
    }

    public static function connect()
    {
        $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname;
        self::$connexion = new PDO($dsn, self::$user, self::$password);
        self::$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return self::$connexion;
    }

    /** je crée une fonction pour preparer et executer ma requette sql 
     * executeRequest
     *
     * @param  mixed $request
     * @return array
     */
    public function executeRequest($request): array
    {
        $stm = self::$connexion->prepare($request);
        $stm->execute();
        $stm->fetchAll();
        return $stm;
    }
    /** fonction pour preparer et executer ma requette sql et retourn en FETCH!
     * executeRequest
     *
     * @param  mixed $request
     * @return stdClass
     */
    public function executeFetch($request): stdClass
    {
        $stm = self::$connexion->prepare($request);
        $stm->execute();
        // je retourne directement le fetch du statement
        //  qui sera stocké dans une variable
        $result = $stm->fetch();
        return $result;
    }



    /** Prepare et execute la requete SQL
     * queryRequest
     *
     * @param  mixed $request
     * @return array
     */
    public function queryRequest($request): array
    {
        $stm = self::$connexion->query($request);
        // je retourne directement le fetch du statement
        //  qui sera stocké dans une variable
        return $stm->fetchAll();
    }


    // FIN CLASS
}
