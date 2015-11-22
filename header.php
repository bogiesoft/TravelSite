<!--
Author: Mark Wilson
File: header.php
SAIT OOSD Spring Track 2015

File created for Assignment #8 - combining header and menu in one file
-->
<div class="menu">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<li role="presentation"><a href="index.php">Home</a></li>
		<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<li><a href="customerLogin.php"><span class="glyphicon glyphicon-log-in"></span> Customer Login</a></li>
		<!--Assignment #11 added AgentLogin-->
        <li><a href="agentLogin.php"><span class="glyphicon glyphicon-log-in"></span> Agent Login</a></li>
		<!--<li role="presentation"><a href="vacations.php">Vacation</a></li>-->
		<li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Links <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<?php
					//Get values from associative array in external php file
					include("variables.php");
	
					//Alternate method is to use a for loop and the array_keys and array_values methods
					$keys = array_keys($url_array);
					$value = array_values($url_array);
					foreach ($keys as $item)
					{
					echo("<li><a href = $item>$url_array[$item]</a><li>");
					}
					?>
				</ul>
		</li>
		<li role="presentation"><a href="contact.php">Contact</a></li>
      </ul>
	</div>
    </div>
</nav>
		<!--Display UserName if logged in-->
		<p id="displayUserName"><?php print($_SESSION['Firstname']); ?></p>
		<!--Logout button is displayed if user is logged in-->
		<?php
			if(isset($_SESSION["isloggedIn"])){
			//show logout button
		?>
			<a class='logout' href='logout.php'>Click here to log out</a>
		<?php
			}
		?>
</div>