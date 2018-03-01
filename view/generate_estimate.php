<?php
	include_once '../model/index.php';
	include_once 'header.php';
	$bills = $wpdb->get_results("SELECT * FROM estimates ORDER BY id DESC",ARRAY_A);
 ?>
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Generate Estimate</h3>
            </div>
            <!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Date</th>
						<th>Bill No</th>
						<th>Company Name</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody> 
					<?php 
						if (!empty($bills)) {
							$i = 1;
							foreach ($bills as $key => $value) {
								echo "<tr>
								<td>".$i."</td>
								<td>".date("j F, Y, g:i a",strtotime($value['timestamp']))."</td>
								<td>".$value['estimate_no']."</td>
								<td>".$value['company_name']."</td>
								<td>".$value['grand_total']."</td>
								<td>
								<div class='form-group'>
									<a href='edit_estimate.php?id=".$value['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
								</div>
								<div class='form-group'>
									<a href='../controller/delete.php?id=".$value['id']."&slug=estimates' class='btn btn-danger'><i class='fa fa-close'></i></a>
								</div>
								<div class='form-group'>
									<a href='printestimate.php?id=".$value['id']."' class='btn btn-info'><i class='fa fa-print'></i></a>
								</div>
								</td>
								</tr>";
								$i++;
							}
						}
					 ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Date</th>
						<th>Bill No</th>
						<th>Company Name</th>
						<th>Total</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</tfoot>
				</table>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

<?php include_once 'footer.php'; ?>