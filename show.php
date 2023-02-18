<?php
  require_once("templates/header.php");
  require_once("config/db.php");
  require_once("dao/EntryDAO.php");

  $id;

  if(!empty($_GET)) {
    $id = $_GET["id"];
  }

  $entryDAO = new EntryDAO($connection);

  $entry = $entryDAO->find($id);

  $formatedDate = date("d/m/Y H:i:s", strtotime($entry["createdat"]));
?>
  <div class="container" id="view-entry-container">
    <h2 id="main-title-show">Informaçõoes sobre a entrada #<?php echo $entry["id"];?></h2>
    <p class="bold">Nome:</p>
    <p><?php echo $entry["fullname"]; ?></p>
    <p class="bold">Documento:</p>
    <p><?php echo $entry["document"]; ?></p>
    <p class="bold">Observações:</p>
    <p><?php echo $entry["observation"]; ?></p>
    <p class="bold">Data/Hora de entrada:</p>
    <p><?php echo $formatedDate; ?></p>
  </div>
<?php 
  require_once("templates/footer.php");
?>