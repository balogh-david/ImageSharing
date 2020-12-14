 <?php
   session_start();
   require_once("../../server.php");

   if (isset($_POST["image_id"])) {
      $id = $_POST["image_id"];

      $select_comments = "SELECT * FROM comments WHERE image_id = '$id'";
      $result_select_comments = $conn->query($select_comments);

      if ($result_select_comments->num_rows > 0) {
         while ($row = mysqli_fetch_array($result_select_comments)) {
            echo "<div><p class='mb-0 font-wight'><span class='text-uppercase'>" . $row['username'] . "</span> - <span class='font-wight'>" . $row['commented_on'] . "</span></p><p class='mb-0 pb-0'>" . $row['comment'] . "</p><hr class='mt-0 pt-0' /></div>";
         }
      } else {
         echo "<p class='text-center' id='no-comment'>Ehhez a fényképhez nem tartózik hozzászólás.</p>";
      }
   }
?>