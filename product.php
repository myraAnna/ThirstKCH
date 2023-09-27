<?php include 'includes/session.php'; ?>
<?php include 'includes/scripts.php'; ?>
<?php
	$conn = $pdo->open();

	$prodid = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.cat_id WHERE products.id = :prodid");
	    $stmt->execute(['prodid' => $prodid]);
	    $product = $stmt->fetch();
	    $avail = $product['avail'];
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

?>
<?php include 'includes/header.php'; ?>
<body>
	 
	  <div class="content-wrapper pt-5">
	    <div class="container pt-5">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none;">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?php echo (!empty($product['image'])) ? 'images/'.$product['image'] : 'images/noimage.jpg'; ?>" style="width:300px;height:280px;">
		            		<?php if($avail==0){
		            			echo "
		            			<span class='sold-out-overlay'>Sold Out</span>
		            			";
		            		}?>
		            		<br><br>
		            		<?php if($avail==0){
		            			echo "
		            			<div class='col-sm-12'>
		            			<h6 class='unavailable'>Product is currently unavailable.</h6>
		            			</div>
		            			";
		            		}?>
		            		<form class='form-inline' id='productForm'>
		            			<div class='form-group'>
			            			<div class='input-group col-sm-5'>
			            				
			            				<span class='input-group-btn'>
			            					<button type='button' <?php if ($avail == 0){ ?> disabled <?php } ?> id='minus' class='btn btn-default btn-flat btn-lg'><i class='fa fa-minus'></i></button>
			            				</span>
							          	<input type='text' <?php if ($avail == 0){ ?> disabled <?php } ?> name='quantity' id='quantity' class='form-control input-lg' value='1'>
							            <span class='input-group-btn'>
							                <button type='button' <?php if ($avail == 0){ ?> disabled <?php } ?> id='add' class='btn btn-default btn-flat btn-lg'><i class='fa fa-plus'></i>
							                </button>
							            </span>
							            <input type='hidden' value="<?php echo $product['prodid']; ?>" name='id'>
							        </div>
			            			<button type='submit' <?php if ($avail == 0){ ?> disabled <?php } ?> class='btn btn-primary btn-lg btn-flat'><i class='fa fa-shopping-cart'></i> Add to Cart</button>
			            		</div>
		            		</form>

		            	</div>
		            	<div class="col-sm-6">
		            		<h3 class="page-header"><?php echo $product['prodname']; ?></h3>
		            		<h4><b>RM <?php echo number_format($product['price'], 2); ?></b></h4>
		            		<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_id']; ?>"><?php echo $product['catname']; ?></a></p>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
		            	</div>
		            </div>
		            <br>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>

<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
</body>
</html>