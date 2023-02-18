<?php 
  require_once("models/Entry.php");

  class EntryDAO implements EntryDAOInterface {
    private $conn;

    public function __construct(PDO $conn) {
      $this->conn = $conn;
    }

    public function create(Entry $entry) {
      $query = "INSERT INTO entrys (
        fullname,
        document,
        observation
      ) VALUES (
        :fullname,
        :document,
        :observation
      )";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(":fullname", $entry->fullname);
      $stmt->bindParam(":document", $entry->document);
      $stmt->bindParam(":observation", $entry->observation);

      $stmt->execute();
    }

    public function findAll() {
      $entrys = [];

      $query = "SELECT * FROM entrys";

      $stmt = $this->conn->prepare($query);

      $stmt->execute();

      $entrys = $stmt->fetchAll();

      return $entrys;
    }

    public function find($id) {
      $sql = "SELECT * FROM entrys WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(":id", $id);

      $stmt->execute();

      $entry = $stmt->fetch();

      return $entry;
    }

    public function update(Entry $entry) {
      $sql = "UPDATE entrys SET 
        fullname = :fullname, 
        document = :document,
        observation = :observation 
        WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(":fullname", $entry->fullname);
      $stmt->bindParam(":document", $entry->document);
      $stmt->bindParam(":observation", $entry->observation);
      $stmt->bindParam(":id", $entry->id);

      $stmt->execute();
    }

    public function delete($id) {
      $sql = "DELETE FROM entrys
      WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(":id", $id);

      $stmt->execute();
    }
  }
?>