<?php

class UserWeapons
{
    // connection
    private $conn;

    // table
    private $db_table = "user_weapons";

    // columns
    public $id;
    public $uuid;
    public $displayName;
    public $displayIcon;
    public $chromas;
    public $levels;

    // DB connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get all user weapons
    public function getAllWeapons()
    {
        $query = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Insert weapons
    public function insertWeapon()
    {
        $query = "INSERT INTO
                " . $this->db_table . "
                SET
                    uuid = :uuid,
                    displayName = :displayName,
                    displayIcon = :displayIcon,
                    chromas = :chromas,
                    levels = :levels";

        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->uuid = htmlspecialchars(strip_tags($this->uuid));
        $this->displayName = htmlspecialchars(strip_tags($this->displayName));
        $this->displayIcon = htmlspecialchars(strip_tags($this->displayIcon));
        $this->chromas = var_dump($this->chromas);
        $this->levels = var_dump($this->levels);

        // bind data
        $stmt->bindParam(":uuid", $this->uuid);
        $stmt->bindParam(":displayName", $this->displayName);
        $stmt->bindParam(":displayIcon", $this->displayIcon);
        $stmt->bindParam(":chromas", $this->chromas);
        $stmt->bindParam(":levels", $this->levels);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get 1 weapon
    public function getWeapon()
    {
        $query = "SELECT * FROM " . $this->db_table . " WHERE uuid = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->uuid);
        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->displayName = $dataRow['displayName'];
        $this->displayIcon = $dataRow['displayIcon'];
        $this->chromas = $dataRow['chromas'];
        $this->levels = $dataRow['levels'];
    }

    function deleteUserWeapons(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE uuid = ?";
        $stmt = $this->conn->prepare($sqlQuery);
    
        $this->uuid=htmlspecialchars(strip_tags($this->uuid));
    
        $stmt->bindParam(1, $this->uuid);
    
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
