<?php 
  require_once("config/db.php");
  require_once("querys/createTable.php");
  require_once("templates/header.php");
  require_once("dao/EntryDAO.php");

  $entryDAO = new EntryDAO($connection);

  $entrys = $entryDAO->findAll();
?>

  <div class="container">
    <h1 id="main-title">Entradas</h1>
    <?php if (count($entrys) > 0): ?>
      <table class="table" id="entrys-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Data/Hora</th>
            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($entrys as $entry): ?>
            <tr>
              <td scope="row" class="col-id"><?php echo $entry["id"]; ?></td>
              <td scope="row" class="col-id"><?php echo date("d/m/Y H:i:s", strtotime($entry["createdat"])); ?></td>
              <td scope="row"><?php echo $entry["fullname"]; ?></td>
              <td scope="row"><?php echo $entry["document"]; ?></td>
              <td class="actions">
                <a href="<?php echo $BASE_URL ?>/show.php?id=<?php echo $entry["id"]; ?>"><i class="fas fa-eye check-icon"></i></a>
                <a href="<?php echo $BASE_URL ?>/update_entry.php?id=<?php echo $entry["id"]; ?>"><i class="far fa-edit edit-icon"></i></a>
                <form class="delete-form" action="<?php echo $BASE_URL ?>/delete.php" method="post">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?php echo $entry["id"]; ?>">
                  <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p id="empty-list-text">Ainda não há Entradas, <a href="<?php echo $BASE_URL ?>/new_entry.php">clique aqui para adicionar</a></p>
    <?php endif; ?>
  </div>

<?php 
  include_once("templates/footer.php"); 
?>