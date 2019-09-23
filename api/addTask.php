<?php
$db = mysqli_connect('localhost', 'root', '', 'todo');

// if(isset($_POST['submit'])) {
//   $task = $_POST['task'];
//     if (empty($task)) {
//       $errors = "Add to task";
//     } else {
      
//     mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
//     header('location: index.php');
//     }

// }


sleep(2);
if (isset($_GET['addTask'])){
  $text = $_GET['addTask'];
  mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$text')");
}

echo 'ok';