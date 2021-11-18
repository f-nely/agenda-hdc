<?php

session_start();

require_once 'connection.php';
require_once 'url.php';

$data = $_POST;

// modificações no banco
if (!empty($data)) {

  print_r($data); 

  // criando contato
  if ($data['type'] === 'create') {
    
    $name = $data['name'];
    $phone = $data['phone'];
    $observations = $data['observations'];

    $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':observations', $observations);

    try {
      $stmt->execute();
      $_SESSION['msg'] = 'Contato criado com sucesso!';
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  }

// redirect HOME
header('Location: ../index.php');

// seleção de dados
} else {

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

}

// fechar conexão
$conn = null;

