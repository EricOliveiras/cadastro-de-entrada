<?php 
  require_once("templates/header.php");
?>
  <div class="container">
    <h1 id="main-title">Nova entrada</h1>
    <form action="<?php echo $BASE_URL; ?>/create.php" id="create-form" method="POST">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="fullname">Nome completo:</label>
        <input type="text" name="fullname" required>
      </div>
      <div class="form-group">
        <label for="document">Documento:</label>
        <input type="text" name="document" required>
      </div>
      <div class="form-group">
        <label for="observation">Observações:</label>
        <textarea class="form-control" id="observation" name="observation" rows="4"></textarea>
      </div>
      <input class="btn-enviar" type="submit" value="Enviar">
    </form>
  </div>
<?php 
  require_once("templates/footer.php");
?>