<?php 
  require_once("config/db.php");
  require_once("config/globals.php");
  require_once("models/Entry.php");
  require_once("models/Message.php");
  require_once("dao/EntryDAO.php");

  $message = new Message($BASE_URL);

  $entryDAO = new EntryDAO($connection);

  $id = filter_input(INPUT_POST, "id");
  $fullname = filter_input(INPUT_POST, "fullname");
  $document = filter_input(INPUT_POST, "document");
  $observation = filter_input(INPUT_POST, "observation");
  
  $entry = new Entry();

  $entry->fullname = $fullname;
  $entry->document = $document;
  $entry->observation = $observation;
  $entry->id = $id;

  try {
    $entryDAO->update($entry);

    $message->setMessage("Entrada atualizada com sucesso", "sucess");
  } catch (PDOException $e) {
    $message->setMessage("Algo deu errado! $e", "error: $e", "back");
  }
    
?>