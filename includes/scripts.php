<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>


<!-- Custom Scripts -->
<script>
$(function(){

  getCart();

  $('#productForm').submit(function(e){
    e.preventDefault();
    var product = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'cart_add.php',
      data: product,
      dataType: 'json',
      success: function(response){
        $('#callout').show();
        $('.message').html(response.message);
        if(response.error){
          $('#callout').removeClass('alert-success').addClass('alert-danger');
        }
        else{
        $('#callout').removeClass('alert-danger').addClass('alert-success');
        getCart();
        }
      }
    });
  });

  $(document).on('click', '.close', function(){
    $('#callout').hide();
  });

});

function getCart(){
  $.ajax({
    type: 'POST',
    url: 'cart_fetch.php',
    dataType: 'json',
    success: function(response){
      $('.cart_count').html(response.count);
    }
  });
}
</script>