<?php session_start();
if (!isset($_SESSION['user_id'])) 
{
    $msg = "je bent nog niet ingelogt";
    header("Location: ../task/login.php?MSG=$msg");
    exit;   
}
?>

<!doctype html>
<!-- http://localhost/b3-team-b8/create.php -->
<!-- ^^^ link via localhost ^^^-->
<html lang="nl">

<head>
    <?php 
    require_once '../head.php'; 
?>
</head>

<body>
    <?php 
	   require_once '../header.php';
    ?>
    <main>
        <div class="form-wrapper">
            <div class="flex-container">
                <div class="form-update">
                <?php
                                require_once '../backend/conn.php';

                                $id = $_GET['id'];
                                $query = "SELECT * FROM taken WHERE id = :id";



                                $statement = $conn->prepare($query);



                                $statement->execute([   
                                ':id' => $id

                                ]);
                                $taken = $statement -> fetch(PDO::FETCH_ASSOC);
                                ?>
                    <form action="../backend/tasksController.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="action" value="update">
                        <h1>taken aanpassen</h1>
                       
                        <!-- titel van de taak -->
                        <div class="form-group">
                            <label for="titel">titel</label>
                           <input type="text" name = "titel" value = " <?php echo $taken['titel'];?>">
                        </div>
                      

                        <!-- dropdown menu -->
                        <div class="form-group">
                            <label for="afdeling"> afdeling </label>
                            <select name="afdeling" id="afdeling">
					          <option value="<?php echo $taken['afdeling'];?>"><?php echo $taken['afdeling'];?></option>
					          <option value="Personeel">Personeel</option>
					          <option value="horeca">horeca</option>
					          <option value="Inkoop">Inkoop</option>
					          <option value="klantenservice">klantenservice</option>
                              <option value="techniek">techniek</option>
                              <option value="groen">groen</option>
			        		</select>
                        </div>
                        

                        <!-- beschrijvings vak van de taak  -->
                        <div class="form-group">
                            <label for="beschrijving">beschrijving taak</label>
                            <textarea name="beschrijving" id="beschrijving" cols="30"
                                rows="10"><?php echo $taken['beschrijving']?></textarea>
                        </div>
                        <!-- deadline aanpassen -->
                        <div class="form-group">
                            <label for="status">Deadline:</label>
                            
                            <input type="date" name="deadline" value="<?php echo $taken['deadline'];?>">
                        </div>
                        <div class="form-group">
                            <label for="status">status:</label>
                            
                            <input type="text" name="status" value="<?php echo $taken['status'];?>">
                        </div>
                        <div class="form-group-submit">
                            <input type="submit" value="update">
                        </div>
                    </form>
                    
                    <form action="../backend/tasksController.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="submit" value="verwijderen">
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
