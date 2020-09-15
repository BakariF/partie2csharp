<?php
// la classe est un modèle de données définissant la structure commune à tous les objets qui seront créés à partir d'elle.
// private: accessible uniquement dans la classe.
// protected: accessible dans la class et les enfants.
// public: disponible dans la classe, les enfants et dans les instances.
class search
{
    //donner une valeur pas défaut pour les champs optionnels
    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $birthDate = '0000-00-00';
    public $phoneNumber = '';
    public $mail = '';
    public $searchDomain = '';
    public $searchArea = '';
    public $siretNumber = '';
    private $password = '';
    private $db = NULL;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=fautquejelechange;charset=utf8', 'root', '');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    public function getUserProfil()
    {
        $getUserProfilQuery = $this->db->prepare(
            'SELECT lastname, firstname, mail, birthDate, phone
            FROM patients
            WHERE id = :id'
        );
        $getUserProfilQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getUserProfilQuery->execute();
        return $getUserProfilQuery->fetchAll(PDO::FETCH_OBJ);

        if (isset($_GET['id'])) {
            $patient = new search();
            $patient->id = $_GET['id'];
            $patientInfo = $patient->getUserProfil();
        }
    }
}
