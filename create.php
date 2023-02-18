<?php 
  require_once("config/db.php");
  require_once("config/globals.php");
  require_once("models/Entry.php");
  require_once("models/Message.php");
  require_once("dao/EntryDAO.php");

  $message = new Message($BASE_URL);

  $entryDAO = new EntryDAO($connection);

  try {
    $fullname = filter_input(INPUT_POST, "fullname");
    $document = filter_input(INPUT_POST, "document");
    $observation = filter_input(INPUT_POST, "observation");
    
    if ($fullname && $document) {
      $entry = new Entry();

      $entry->fullname = $fullname;
      $entry->document = $document;
      $entry->observation = $observation;

      $entryDAO->create($entry);

      $message->setMessage("Entrada cadastrada com sucesso", "sucess");
    
    }

  } catch (PDOException $e) {
    $message->setMessage("Algo deu errado! $e", "error", "back");
  }

?>