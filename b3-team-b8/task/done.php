<?php session_start();
if (!isset($_SESSION['user_id'])) 
{
  $msg = "je bent nog niet ingelogt";
  header("Location: ../task/login.php?MSG=$msg");
  exit; 
}
?>

<!doctype html>
<html lang="nl">
<head>
    <title>ViewPage</title>
    <?php require_once '../head.php'; ?>
    <link rel="stylesheet" href="css/main.css">
</head>
	<body>
    <?php require_once '../header.php' ?>
    	<div class="container">
        <div class="table-container">
           <!-- <div class="filter">
              <select name="afdeling" id="">
                  <option value="">- kies een afdeling -</option>
                  <option value="Personeel">Personeel</option>
                  <option value="horeca">horeca</option>
                  <option value="Inkoop">Inkoop</option>
                  <option value="klantenservice">klantenservice</option>
              </select>
            </div> -->
  <div class="kanban">

    <?php 
      require_once "../backend/conn.php";
      $query ="SELECT * FROM taken WHERE status = 'done' ORDER BY deadline ";
      $statement = $conn -> prepare($query);
      $statement -> execute();
      $taken = $statement -> fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h3>- takenlijst - </h3>
	  <div class="todo">
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">todo / done </button>
        <div id="myDropdown" class="dropdown-content">
          <a href="view.php">todo</a>
          <a href="done.php">done</a>
          <a href="my.php">mijn taken</a>
      </div>
      <h4> - Done - </h4>
	    <table>
	      <tr>
	        <th>Titel</th>
	        <th>afdeling</th>
          <th>Deadline</th>
	        <th>Aanpassen</th>
          
				</tr>
	          <?php foreach($taken as $taak): ?>
	          <tr>
	          <!-- div class="done"> -->
			          	<tr>
                    <td>
                        <div class="taken">
                            <?php echo "<p>" . $taak['titel']. "</p>"?>
                        </div>
                    </td>
                    <td>
                        <div class="taken">
                            <?php echo "<p>" . $taak['afdeling']. "</p>"?>
                        </div>
                    </td>
                    <td>
                        <div class="taken">
                            <?php echo "<p>" . $taak['deadline']. "</p>"?>
                        </div>
                    </td>  
                    <td> 
                      <div class="taken">
                      <?php 
												echo "<a href='edit.php?id={$taak['id']}'>Aanpassen</a>";
                      ?>
                      </div>
	                  </td>
	                  
		              </tr>          
	              <?php endforeach;?>
	          <!-- </div> -->
	      </div>
	    </div>
	  </div>
<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
</script>
	</body>
</html>