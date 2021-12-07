<header>	
	<div class="nav-bar">	
	<div class="logo">
    <a href="<?php echo $base_url ?>/index.php"><img src="<?php echo $base_url ?>../img/logo-big-v3.png" alt="logo developerland"></a>
    </div>
		<nav>	
			<a href="<?php echo $base_url ?>/index.php">Takenoverzicht</a>
			<div>
            <?php 
            if($_SESSION == true): 
            ?>
                <p class="log"><a href="<?php echo $base_url; ?>/task/logout.php">Uitloggen</a></p>
            <?php else: ?>
                <p class="log"><a href="<?php echo $base_url; ?>/task/login.php">Inloggen</a></p>
            <?php endif; ?>
        </div>
		</nav>	
	</div>	
</header>	