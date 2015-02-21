<? include "include/header.php"; ?>
	<? if(isset($_SESSION['uname']))
			include "profile.php";
		else
			include "login.php";
			?>
<? include "include/footer.php"; ?>