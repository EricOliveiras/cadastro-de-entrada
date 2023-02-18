<?php 
  require_once("config/db.php");
  require_once("config/globals.php");
  require_once("models/Entry.php");
  require_once("models/Message.php");
  require_once("dao/EntryDAO.php");

  $message = new Message($BASE_URL);

  $entryDAO = new EntryDAO($connection);

  $id = filter_input(INPUT_POST, "id");

  try {
    $entryDAO->delete($id);
    $message->setMessage("Entrada deletada com sucesso", "sucess");
  } catch (PDOException $e) {
    $message->setMessage("Algo deu errado! $e", "error", "back");
  }
?>