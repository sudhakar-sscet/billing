	</div>
  </section>
  </div>
  <!-- footer -->
  <footer class="main-footer">
   <strong>Copyright &copy; 2017- <?php echo date("Y"); ?> <a href="https://greefitech.com">Greefi Technologies</a>.</strong> All rights
    reserved.
  </footer>
</div>
<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/app.min.js"></script>
<script src="../js/jquery.autocomplete.min.js"></script>
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		var products = [<?php if(!empty($autocomplete_data)){ echo $autocomplete_data;}else{echo '{value:"sample",data:"12"}';}  ?>];
		localStorage.setItem('products',JSON.stringify(products));
	});
</script>
<script src="../js/custom.js"></script>
<script type="text/javascript">
	$('#dynamic-alart').fadeIn('fast').delay(3000).fadeOut('fast');
   $(function () {
    $('#example1').DataTable()
  })
</script>
<style>
</style>
</body>
</html>