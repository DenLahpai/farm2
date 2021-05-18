<?php
class Database {
    private $database;
    private $stm;

    //connect to database
    public function __construct(){
        try {
            $this->database = new PDO("mysql: host=locathost; port=3601; dbname=denlpmm_farmmart; charset=UTF8", "root", "");
            $this->database->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
            $this->database->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_OBJ);
        }
        catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function query($query) {
        $this->stm = $this->database->prepare($query);
    }

    public function bind($params, $value) {
        $this->stm->bindParam($params, $value);
    }

    public function execute() {
        return $this->stm->execute();
    }

    public function resultset() {
        $this->execute();
        return $this->stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function resultsetArray(){
        $this->execute();
        return $this->stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        $this->execute();
        return $this->stm->rowCount();
    }
}
?>
