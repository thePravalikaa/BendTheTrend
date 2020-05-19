<?php
	
	if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
	{
		echo 'Your e-mail (' . $_POST['email'] . ') has been added to our mailing list!';
		echo '<a href="index.php"> Go to Home Page</a>';
	}
	else
	{
		echo 'There was a problem with your e-mail (' . $_POST['email'] . ')';
		
	}

?>