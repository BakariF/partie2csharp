<?php
// la classe est un modèle de données définissant la structure commune à tous les objets qui seront créés à partir d'elle.
// private: accessible uniquement dans la classe.
// protected: accessible dans la class et les enfants.
// public: disponible dans la classe, les enfants et dans les instances.
class user
{
    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $birthDate = '0000-00-00';
    public $phoneNumber = '';
    public $mail = '';
    private $table = 'm4i9k_users';
    //Secteur d'activité(primaire, secondaire, terciaire)
    //-public $ActivitySectors = '';
    //plus précisément
    //-public $Sectors = '';
    //reach = champ d'action: la zone
    //-public $reach = '';
    public $sirenNumber = '';
    public $siretNumber = '';
    public $password = '';
    private $db = NULL;
    public $id_m4i9k_FranceCard = 0;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=n\'vestor;charset=utf8', 'root', '');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    public function checkUserExist()
    {
        //je vérifie s'il n'y a pas un utilisateur avec les mêmes informations. Donc je prends le nom, prénom et adresse mail.
        $checkUserSameQuery = $this->db->prepare(
            'SELECT COUNT(`id`) AS `checkUserExist`
            FROM `m4i9k_users`
            WHERE `lastName` = :lastName AND `firstName` = :firstName AND `mail` = :mail'
        );
        //bindvalue: vérifie le type, pour que ça ne génère pas de faille de sécurité.
        $checkUserSameQuery->bindvalue(':lastName', $this->lastName, PDO::PARAM_STR);
        $checkUserSameQuery->bindvalue(':firstName', $this->firstName, PDO::PARAM_STR);
        $checkUserSameQuery->bindvalue(':mail', $this->mail, PDO::PARAM_STR);
        $checkUserSameQuery->execute();
        //on récupère les résultats de la requête exécuté: 'SELECT... blablabla');
        //fetch == va chercher !
        //FETCH_OBJ = on récupère...
        $data = $checkUserSameQuery->fetch(PDO::FETCH_OBJ);
        //return: termine la procédure.
        return $data->checkUserExist;
    }
    public function checkUserUnavailabilityByFieldName($field)
    {
        $whereArray = [];
        foreach ($field as $fieldName) {
            $whereArray[] = '`' . $fieldName . '` = :' . $fieldName;
        }
        $where = ' WHERE ' . implode(' AND ', $whereArray);
        $checkUserUnavailabilityByFieldName = $this->db->prepare('
                SELECT COUNT(`id`) AS `isUnavailable`
                FROM ' . $this->table
            . $where);
        foreach ($field as $fieldName) {
            $checkUserUnavailabilityByFieldName->bindValue(':' . $fieldName, $this->$fieldName, PDO::PARAM_STR);
        }
        $checkUserUnavailabilityByFieldName->execute();
        return $checkUserUnavailabilityByFieldName->fetch(PDO::FETCH_OBJ)->isUnavailable;
    }
    public function addUserInfo()
    {
        //on fait une requête préparée.
        $addUserInfo = $this->db->prepare(
            //Marqueur nominatif genre :birthDate
            //$this-> : permet d'acceder aux attributs de l'instance qui est en cours.
            'INSERT INTO `m4i9k_users` (`lastName`,`firstName`,`phoneNumber`,`mail`,`siretNumber`, `password`, `sirenNumber`,`id_m4i9k_FranceCard`)
    VALUES(:lastName, :firstName, :phoneNumber, :mail, :siretNumber, :password,  :sirenNumber, :id_m4i9k_FranceCard)'
        );
        //PDO::PARAM_STR : dans des termes très simplifiés, il permet de faire en sorte que les attributs soit inséré en string.
        $addUserInfo->bindvalue(':lastName', $this->lastName, PDO::PARAM_STR);
        $addUserInfo->bindvalue(':firstName', $this->firstName, PDO::PARAM_STR);
        $addUserInfo->bindvalue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $addUserInfo->bindvalue(':password', $this->password, PDO::PARAM_STR);
        $addUserInfo->bindvalue(':mail', $this->mail, PDO::PARAM_STR);
        $addUserInfo->bindvalue(':siretNumber', $this->siretNumber, PDO::PARAM_STR);
        $addUserInfo->bindvalue(':sirenNumber', $this->sirenNumber, PDO::PARAM_STR);
        $addUserInfo->bindvalue(':id_m4i9k_FranceCard', $this->id_m4i9k_FranceCard, PDO::PARAM_INT);
        // $addUserQuery->bindvalue(':ActivitySectors', $this->mail, PDO::PARAM_STR);
        //$addUserQuery->bindvalue(':Sectors', $this->mail, PDO::PARAM_STR);
        //$addUserQuery->bindvalue(':reach', $this->mail, PDO::PARAM_STR);
        //lance la requête
        var_dump($this);
        return $addUserInfo->execute();
    }
    public function getUserPasswordHash()
    {
        $getUserPasswordHash = $this->db->prepare(
            'SELECT `password` 
            FROM ' . $this->table
                . ' WHERE `mail` = :mail'
        );
        $getUserPasswordHash->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $getUserPasswordHash->execute();
        $response = $getUserPasswordHash->fetch(PDO::FETCH_OBJ);
        //is_object: permet de savoir si la variable est un objet.
        if (is_object($response)) {
            return $response->password;
        } else {
            return '';
        }
    }
    public function getUserProfile()
    {
        $getUserProfile = $this->db->prepare(
            'SELECT `id`, `username`
            FROM ' . $this->user
                . ' WHERE `mail` = :mail'
        );
        $getUserProfile->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $getUserProfile->execute();
        return $getUserProfile->fetch(PDO::FETCH_OBJ);
    }
    //j'ajoute les régions pour faire un foreach
    public function addFranceRegion()
    {
        $addFranceRegion = $this->db->prepare(
            'SELECT `departement_code` AS `departmentCode`, `departement_nom` AS `DepartmentName`
            FROM `m4i9k_francecard`
            '
        );
        $addFranceRegion->bindValue(`departmentCode`, $this->departmentCode, PDO::PARAM_STR);
        $addFranceRegion->bindValue(`departmentName`, $this->departmentName, PDO::PARAM_STR);
        $addFranceRegion->execute();
        return $addFranceRegion->fetchAll(PDO::FETCH_OBJ);
        //maintenant faut faire la jointure.
    }
}