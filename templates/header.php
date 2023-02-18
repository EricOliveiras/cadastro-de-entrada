<?php 
  require_once("config/globals.php");
  require_once("models/Message.php");

  $message = new Message($BASE_URL);
  $flassMessage = $message->getMessage();

  if(!empty($flassMessage["msg"])) {
    $message->clearMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/css/style.css">

  <title>Entradas</title>
</head>
<body>
  <header>
    <nav class="navbar">
      <a id="nav-title" class="nav-link bold" href="<?php echo $BASE_URL; ?>">ENTRADAS</a>
      <a class="nav-link" href="<?php echo $BASE_URL; ?>/new_entry.php">Nova entrada</a>
    </nav>
  </header>
  <?php if(!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
      <p class="msg <?php echo $flassMessage["type"]; ?>"><?php echo $flassMessage["msg"]; ?></p>
    </div>
  <?php endif; ?>