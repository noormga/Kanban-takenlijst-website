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
    <title></title>
    <?php require_once 'head.php'; ?>
</head>

<body class="overflow">
    <?php require_once 'header.php' ?>
    <div class="container">
        <div class="center">
            <h1>Takenoverzicht</h1>
            <br><br>
            <h2>Toon en maak taken eenvoudig</h2>
            <div class="flexbox">
                <button class="createbtn" onclick="document.location='<?php echo $base_url ?>/task/create.php'">Create</button>
                <button class="viewbtn" onclick="document.location='<?php echo $base_url ?>/task/view.php'">View</button>
                
            </div>
        </div>
    </div>
    
    <?php require_once 'footer.php'; ?>
</body>

</html>
<!-- 
alle functionaliteiten onder 1 sub pagina bijv. meldingen
input validatie afdeling fixen
index == root homepage 
task/index.php == homepage van de webapp daar komt alles wat met takenoverzicht te maken heeft
 -->
