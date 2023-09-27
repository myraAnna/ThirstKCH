<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


<body>
<div class="container mt-4 pt-2">	
	<h2 class="row pt-5 section-title">All Products</h2>
	 
	  <div class="row col-md-12">
	    <div class="row">

		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
						    $stmt = $conn->prepare("SELECT * FROM products");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	if($row['avail']==1){
						    		$avail = 1;
						    	}
						    	else{
						    		$avail = 0;
						    	}
						    	$image = (!empty($row['image'])) ? 'images/'.$row['image'] : 'images/noimage.jpg';
						    	
	       						if($avail==0){
	       							echo "
	       							 <div class='card col-md-4 border-0'>
            							<div class='card-body wine_v_1 text-center pb-4'>
            							<div class='thumbnail d-block mb-4'><img src='".$image."' style='width:200px;height:200px;'></div> 
            							<span class='sold-out-overlay'>Sold Out</span>
                						<h5 class='card-title'><a href='product.php?product=".$row['id']."'>".$row['name']."</a></h5>
                						<h6 class='card-subtitle mb-2 text-muted'>RM ".number_format($row['price'], 2)."</h6>                					
	       								</div>
	       							</div>
	       							";
            					}
            					else{ 
	       						echo "
	       							 <div class='card col-md-4 border-0'>
            							<div class='card-body wine_v_1 text-center pb-4'>
            							<div class='thumbnail d-block mb-4'><img src='".$image."' style='width:200px;height:200px;'></div> 
                						<h5 class='card-title'><a href='product.php?product=".$row['id']."'>".$row['name']."</a></h5>
                						<h6 class='card-subtitle mb-2 text-muted'>RM ".number_format($row['price'], 2)."</h6>                					
	       								</div>
	       							</div>
	       							";
	       						}
						    }
						}
						
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	    </div>
	</div>
</div>
  
 <?php include 'includes/footer.php'; ?>


<?php include 'includes/scripts.php'; ?>
</body>
</html>