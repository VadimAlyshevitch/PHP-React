<?php
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
  $id = $_GET['del_tasl'];
  mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
}

echo 'ok';