<?php 
// Include the database config file 
include ("includes/session.php");
// Initialize shopping cart class 
include ("includes/header.php");
include 'includes/scripts.php';
$conn = $pdo->open();
?>
<body>
<div class="container pt-2">
    <h1 class="row pt-5">Menu</h1>
    
    <div class="mt-4 row col-lg-12">
    <button class="tablink row col py-2 btn text-white" onclick="openPage('Fruity Crush', this, '#075460')" id="defaultOpen">Fruity Crush</button>
    <button class="tablink row col py-2 btn text-white" onclick="openPage('Thirsty Milkshake', this, '#075460')" >Thirsty Milkshake</button>
    <button class="tablink row col py-2 btn text-white" onclick="openPage('Fairy Tale', this, '#075460')">Fairy Tale</button>
    <button class="tablink row col py-2 btn text-white" onclick="openPage('Thirsty Treat', this, '#075460')">Thirsty Treat</button>
    <button class="tablink row col py-2 btn text-white" onclick="openPage('Local Heroes', this, '#075460')">Local Heroes</button>
    </div>
    
    <!-- Product list -->
    <div id="Fruity Crush" class="tabcontent row col-lg-12">
        <div class="row">
        <?php 
        // Get products from database 
        $result = $conn->prepare("SELECT * FROM products WHERE category_id =1 ORDER BY id");
        $result->execute();
        if($result->rowCount() > 0){  
            while($row = $result->fetch()){ 
        ?>

        <div class="card col-md-4 border-0">
            <div class="card-body wine_v_1 text-center pb-4">
                <div class="thumbnail d-block mb-4"><img src="<?php echo 'images/'.$row["photo"];  ?>" style="width:200px;height:200px;"></div>  
                <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo 'RM'.$row["price"]; ?></h6>
                <p class="card-text"><?php echo $row["description"]; ?></p>
                
                <form class="form-inline" id="productForm">
                                <div class="form-group">
                                    <div class="input-group col-sm-5">
                                        
                                        <span class="input-group-btn">
                                            <button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
                                        </span>
                                        <input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
                                        <span class="input-group-btn">
                                            <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
                                            </button>
                                        </span>
                                        <input type="hidden" value="<?php echo $row['prodid']; ?>" name="id">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </form>
            </div>
        </div>

        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
        </div>
    </div>

</div>
<?php $pdo->close(); ?>
        <!-- Menu Taskbar END-->
<?php
      include ("includes/footer.php");
?>
</body>
</html>

<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "#40E0D0";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

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

