<?php
	include 'includes/session.php';

	$conn = $pdo->open();
	
	try{
		$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:id");
		$stmt->execute(['id'=>$user['id']]);
		echo"
            <script type='text/javascript'>
            window.alert('Order was cancelled successfully');
            window.location.href='index.php';
            </script>
        ";		
	}
	catch(PDOException $e){
		echo"
            <script type='text/javascript'>
            window.alert('Order was not cancelled successfully. Please try again.');
            window.location.href='index.php';
            </script>
        ";		
	}

?>