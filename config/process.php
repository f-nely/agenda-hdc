<?php

session_start();

require_once 'connection.php';
require_once 'url.php';

$id;

if (!empty($_GET)) {
  $id = $_GET['id'];
}

// retorna o dado de um contato
if (!empty($id)) {

  $query = "SELECT * FROM contacts WHERE id = :id";

  $stmt = $conn->prepare($query);

  $stmt->bindParam(':id', $id);

  $stmt->execute();

  $contact = $stmt->fetch();

} else {

  // retorna todos os contatos
  $contacts = [];

  $query = "SELECT * FROM contacts";

  $stmt = $conn->prepare($query);

  $stmt->execute();

  $contacts = $stmt->fetchAll();

}

