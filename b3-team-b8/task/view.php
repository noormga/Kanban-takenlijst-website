<?php session_start();
if (!isset($_SESSION['user_id'])) 
{
    $msg = "je bent nog niet ingelogt";
    header("Location: task/login.php?MSG=$msg");
    exit;   
}
?>

<!doctype html>
<html lang="nl">

<head>
    <title>ViewPage</title>
    <?php require_once '../head.php' ?>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php require_once '../header.php' ?>
<div class="container">
        <div class="table-container">
            <div class="kanban">
                <h3>- Takenoverzicht - </h3>
                <div class="todo">
                    <?php 
                    require_once "../backend/conn.php";
                    if(isset($_GET['afdeling'])){
                        $query ="SELECT * FROM taken WHERE status != 'done' AND afdeling = :afdeling ORDER BY deadline";
                        $afdeling = $_GET['afdeling'];
                        $statement = $conn -> prepare($query);
                        $statement -> execute([
                            ':afdeling' => $afdeling
                        ]);
                    }
                    else{
                        $query ="SELECT * FROM taken WHERE status != 'done' ORDER BY deadline";
                        $statement = $conn -> prepare($query);
                        $statement -> execute([
                        ]);
                    }
                    $taken = $statement -> fetchAll(PDO::FETCH_ASSOC);            
                    ?>
                    
                    <div class="dropdown buttoncreate">
                      <button onclick="viewSelect()" class="dropbtn"><a href="<?php echo $base_url ?>/task/create.php" class="create-button">create</a></button>
                    </div>

                     <div class="dropdown">
                      <button onclick="viewSelect()" class="dropbtn">todo / done </button>
                      <div id="viewSelect" class="dropdown-content">
                        <a href="view.php">todo</a>
                        <a href="done.php">done</a>
                        <a href="my.php">mijn taken</a>
                      </div>
                    </div> 
                    <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn">afdelingen</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="http://localhost/b3-team-b8/task/view.php?afdeling=personeel">Personeel</a>
                        <a href="http://localhost/b3-team-b8/task/view.php?afdeling=horeca">Horeca</a>
                        <a href="http://localhost/b3-team-b8/task/view.php?afdeling=inkoop">Inkoop</a>
                        <a href="http://localhost/b3-team-b8/task/view.php?afdeling=techniek">Techniek</a>
                        <a href="http://localhost/b3-team-b8/task/view.php?afdeling=klantenservice">Klantenservice</a>
                        <a href="http://localhost/b3-team-b8/task/view.php?afdeling=groen">Groen</a>
                      </div>
                    </div> 
                    <h4> - todo - </h4>
                    <table>
                        <tr>
                            <th>Titel</th>
                            <th>afdeling</th>
                            <th>status</th>
                            <th>Deadline</th>
                            <th>Aanpassen</th>
                        </tr>

                        <?Php foreach($taken as $taak):?>
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
                                <div class="taken" id="status">
                                    <?php echo "<p>" . $taak['status']. "</p>"?>
                                </div>
                                <td>
                                <div class="taken" id="status">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require_once '../footer.php' ?>
<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function viewSelect() {
  document.getElementById("viewSelect").classList.toggle("show");
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

    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function afdelingSelect() {
  document.getElementById("afdelingSelect").classList.toggle("show");
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
<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction(showafdeling) {
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
