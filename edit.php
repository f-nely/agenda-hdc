<?php
require_once 'templates/header.php';
?>
  <div class="container">
    <?php require_once 'templates/backbtn.html'; ?>
    <h1 id="main-title">Editar contato</h1>
    <form id="create-form" action="config/process.php" method="POST">
      <input type="hidden" name="type" value="edit">
      <input type="hidden" name="id" value="<?= $contact['id'] ?>">
      <div class="form-group">
        <label for="name">Nome do contato:</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome" name="id" value="<?= $contact['name'] ?>" required>
      </div>
      <div class="form-group">
        <label for="phone">Telefone do contato:</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite o telefone" name="id" value="<?= $contact['phone'] ?>" required>
      </div>
      <div class="form-group">
        <label for="observations">Observações:</label>
        <textarea type="text" class="form-control" name="observations" id="observations" placeholder="Insira as observações" name="id"  rows="3"><?= $contact['observations'] ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </div>
<?php
require_once 'templates/footer.php';
?>
