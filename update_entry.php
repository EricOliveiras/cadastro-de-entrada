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
?>
  <div class="container">
    <h1 id="main-title">Nova entrada</h1>
    <form action="<?php echo $BASE_URL; ?>/update.php" id="create-form" method="POST">
      <input type="hidden" name="type" value="update">
      <input type="hidden" name="id" value="<?php echo $entry["id"]; ?>">
      <div class="form-group">
        <label for="fullname">Nome completo:</label>
        <input type="text" name="fullname" value="<?php echo $entry["fullname"]; ?>" required>
      </div>
      <div class="form-group">
        <label for="document">Documento:</label>
        <input type="text" name="document" value="<?php echo $entry["document"]; ?>" required>
      </div>
      <div class="form-group">
        <label for="observation">Observações:</label>
        <textarea class="form-control" id="observation" name="observation" rows="4"><?php echo $entry["observation"]; ?></textarea>
      </div>
      <input class="btn-enviar" type="submit" value="Atualizar">
    </form>
  </div>
<?php 
  require_once("templates/footer.php");
?>