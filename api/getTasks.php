<?php
  $errors = "";
  // db
  $db = mysqli_connect('localhost', 'root', '', 'todo');

  if(isset($_POST['submit'])) {
    $task = $_POST['task'];
      if (empty($task)) {
        $errors = "Add to task";
      } else {
        
      mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
      header('location: index.php');
      }

  }
//delete
  if (isset($_GET['del_tasl'])){
    $id = $_GET['del_task'];
    mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
  }
  $tasks = mysqli_query($db, "SELECT * FROM tasks");


  $result = [];
  while($row = mysqli_fetch_array($tasks)) { 
    $result[] = $row;
}

sleep(1);
header('Content-Type: application/json');
echo json_encode( $result);