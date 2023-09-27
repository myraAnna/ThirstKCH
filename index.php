<?php include 'includes/session.php'; ?>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/header.php'; ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap pt-4">

     <div id="myCarousel" class="carousel slide bg-inverse resp ml-auto mr-auto mt-4 pt-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/img1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/img2.jpg" alt="Second slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
    
    <div class="site-section">
      <div class="container">

        <div class="row mb-2">
          <div class="col-12 section-title text-center mb-1">
            <h2 class="d-block">Thirst Menu</h2>
            <p>Thirst offers premium and healthy fruit-based milkshakes and smoothies. What is special about Thirst is that all our drinks are made only with the freshest ingredients. The secret behind the refreshing taste of Thirst’s milkshakes and smoothies is the use of fruit puree and syrup.</p>
            <p><a href="allcat.php">View All Products <span class="icon-long-arrow-right"></span></a></p>
          </div>
        </div>
        <div class="row">
          
          <div class="col-lg-4 col-md-6">

            <div class="wine_v_1 text-center pb-4">           
              <a href="allcat.php" class="thumbnail d-block mb-1"><img src="images/thirstMenu/fairyTale/Mermaid.jpg" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="#">Mermaid</a></h3>
                <span class="price">RM 9.50</span>
              </div>
              

              <div class="wine-actions">        
                  
                <h3 class="heading-2"><a href="#">Mermaid</a></h3>
                <span class="price d-block">RM 9.50</span>
                
                <a href="product.php?product=11" class="btn add"><span class="icon-shopping-bag mr-3"></span> Order Now</a>
              </div>
            </div>

          </div>

          <div class="col-lg-4 col-md-6">              
            <div class="wine_v_1 text-center pb-4">
              <a href="allcat.php" class="thumbnail d-block mb-1"><img src="images/thirstMenu/localHeroes/Milo Godzilla.jpg" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="#">Milo Godzilla</a></h3>
                <span class="price">RM 10.50</span>
              </div>
              

              <div class="wine-actions">
                  
                <h3 class="heading-2"><a href="#">Milo Godzilla</a></h3>
                <span class="price d-block">RM 10.50</span>
                
                <a href="product.php?product=25" class="btn add"><span class="icon-shopping-bag mr-3"></span> Order Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="wine_v_1 text-center pb-4">       
              <a href="allcat.php" class="thumbnail d-block mb-1"><img src="images/thirstMenu/thirstyTreats/Choco Loco.jpg" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="#">Choco Loco</a></h3>
                <span class="price">RM 10.50</span>
              </div>
              

              <div class="wine-actions">
                  
                <h3 class="heading-2"><a href="#">Choco Loco</a></h3>
                <span class="price d-block">RM 10.50</span>
                
                <a href="product.php?product=19" class="btn add"><span class="icon-shopping-bag mr-3"></span> Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <?php
      include ("includes/footer.php");
?>
  <!-- .site-wrap -->
</body>

<script>
var total = 0;
$(function(){

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

</html>

