<?php

include("../config/database.php");

$id = $_GET["id"];

if(delete($id) > 0){
  echo "<script>
          alert('data berhasil di hapus');
          document.location.href = '../index.php'
        </script>
  ";
} else {
  echo "<script>
          alert('data gagal di hapus');
          document.location.href = '../index.php'
        </script>
  ";
}

function delete($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM users WHERE user_id = $id");

  return mysqli_affected_rows($conn);
}

?>