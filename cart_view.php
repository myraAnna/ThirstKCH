<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	 
	  <div class="content-wrapper pt-5">
	    <div class="container py-5">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1 class="section-title">Your Cart</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th>Item</th>
		        				<th>Price</th>
		        				<th width="24%">Quantity</th>
		        				<th>Subtotal</th>
		        				<th></th>
		        			</thead>
		        			<tbody id="tbody">
		        			</tbody>
		        		</table>
	        			</div>
	        		</div>
	        		<?php

	        			$conn = $pdo->open();

	        			if(isset($_SESSION['user'])){
	        				$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user");
							$stmt->execute(['user'=>$user['id']]);
							$crow = $stmt->fetch();

							if($crow['numrows'] >0){
		        				echo "
		        					 <div class='col mb-2'>
						                <div class='row'>			                    
						                    <div class='col-sm-12 col-md-4'>
						                        
						                        <a href='checkout.php' class='btn btn-block btn-primary'>Pay at Counter</a>
						                        
						                    </div>
						                    <div class='col-sm-12 col-md-4'>
						                        
						                        <a href='stripe.php' class='btn btn-block btn-success' style='color:#fff'>Pay using Card</a>
						                        
						                    </div>
						                    <div class='col-sm-12  col-md-6 mt-3'>
						                        <a href='allcat.php' class='btn btn-block btn-info'>Continue Shopping</a>
						                    </div>
						                </div>
						            </div>
		        				";
	        				}

	        				else{
	        					echo "
		        					 <div class='col mb-2'>
						                <div class='row'>
						                    <div class='col-sm-12  col-md-6'>
						                        <a href='allcat.php' class='btn btn-block btn-info'>Continue Shopping</a>
						                    </div>
						                    
						                </div>
						            </div>
		        				";
	        				}
	        			}
	        			else{

	        				if(count($_SESSION['cart']) != 0){
	        				echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
	        				}
	        				else{
	        					echo "
	        					 <div class='col mb-2'>
					                <div class='row'>
					                    <div class='col-sm-12  col-md-6'>
					                        <a href='allcat.php' class='btn btn-block btn-info'>Continue Shopping</a>
					                    </div>
					                </div>
					            </div>
	        				";
	        				}
	        			}
	        		?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}

</script>
</body>
</html>