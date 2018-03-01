<?php
  include_once '../model/index.php';
  $id = $_GET['id'];
  $estimate = $wpdb->get_results("SELECT * FROM estimates WHERE id=$id",ARRAY_A)[0];
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="../css/print.css">
    <title>Billing Admin</title>
    <a href="generate_bill.php" class="btn btn-primary  btn-sm no-print" style="position:absolute;z-index:1;right:100px;top:5px;"><i class="fa fa-home"></i> Home</a>
    <a href="javascript:window.print();" target="" class="btn btn-primary  btn-sm no-print" style="position:absolute;z-index:1;right:30px;top:5px;"><i class="fa fa-print"></i> Print</a>
</head>

<body>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <section class="invoice">
                        <div class="col-md-12">
                            <div class="row invoice-info" style="border:1px solid #e2e2e2;border-bottom:none;">
                                <div class="col-xs-4" style="border-right:1px solid #e2e2e2;padding-top:2px;padding-bottom:2px;">
                                    <h5 style="font-weight:bold;text-transform:uppercase;margin:0px;">Dinesh xerox Shop</h5>
                                    <p style="margin:0px;">
                                        address
                                        <br>address1
                                        <br>
                                        <b style="font-weight:normal">GSTN : 78787878<br>
                                        Mobile : 1236547890&nbsp;,&nbsp;</b> Email : test@123.com
                                    </p>
                                </div>
                                <div class="col-xs-5" style="border-right:1px solid #e2e2e2;padding-top:2px;padding-bottom:2px;">
                                    <h5 style="margin:0px;font-weight:normal">Buyer Details</h5>
                                    <span><?php echo $estimate['company_name']; ?></span>
                                    <br>
                                    <p><span><?php echo $estimate['address']; ?></span></p>
                                    <span>GSTN  : <?php echo $estimate['gst_number']; ?></span>
                                    <br>
                                    <span>Mobile  : </span>
                                    <span> <?php echo $estimate['contact_number']; ?></span>
                                    <br>
                                </div>
                                <div class="col-xs-3" style="border-right:1px solid #e2e2e2;padding-top:2px;padding-bottom:2px;">
                                    <h5 style="text-align:center;margin:0px;font-weight:bold;border-bottom:1px solid #DDDDDD;padding:3px 10px; margin-bottom:2px;">TAX INVOICE</h5>
                                    <span>Date : <?php echo date('j F, Y'); ?></span></br>
                                    <span>Time : <?php echo date('g:i a'); ?></span>
                                    <br>
                                    <span>Bill no: <?php echo $estimate['estimate_no']; ?></span>
                                    <!--<b>Order ID:</b> 4F3S8J</b>-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped table-bordered" style="margin-bottom:0px;">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>SGST</th>
                                            <th>CGST</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $products = unserialize($estimate['estimate_list']);
                                            if (!empty($products)) {
                                                $i = 1;
                                                $total_qty = 0;
                                                foreach ($products as $key => $value) {
                                                    $total_qty = $total_qty + $value['qty'];
                                                    echo "<tr>
                                                        <td>".$value['sno']."</td>
                                                        <td>".$value['product_name']."</td>
                                                        <td>".$value['price']."</td>
                                                        <td>".$value['qty']."</td>
                                                        <td>".$value['total']."</td>
                                                    </tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="2"></th>
                                        <th>Total</th>
                                        <th><?php echo $total_qty; ?></th>
                                        <th colspan="2"></th>
                                        <th><?php echo $estimate['grand_total']; ?></th>
                                    </tfoot>
                                </table>
                                <!-- bottom bar -->
                                <div class=" invoice-info" style="border:1px solid #e2e2e2;border-top:none;">
                                    <div class="col-xs-12" style="border-top:none;border-bottom:none;padding:0px;">
                                        <table class="table table-bordered" style="margin-bottom:0px;border-bottom:none !important">
                                            <thead>
                                                <tr>
                                                    <th style="width:58.5%;padding-top:7px;padding-bottom:7px;font-weight:normal"> Rounding Off</th>
                                                    <th style="padding-top:7px;padding-bottom:7px;font-weight:normal"><?php echo round($estimate['grand_total']); ?></th>
                                                </tr>
                                                <tr>
                                                    <th style="width:58.5%;padding-top:7px;padding-bottom:7px;"> Grand Total</th>
                                                    <th style="padding-top:7px;padding-bottom:7px;"><?php echo round($estimate['grand_total']); ?></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-12" style="border-top:none;padding:0px;">
                                        <table class="table table-bordered" style="margin-bottom:0px;">
                                            <thead>
                                                <tr>
                                                    <th style="font-weight:normal;width:50.1%">Receiver's Signature </th>
                                                    <th style="font-weight:normal">For Dinesh Xerox Shop</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div id="mailmodal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius:2px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Set Mail</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <br>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">To :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter To ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Cc :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Cc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Bcc :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Bcc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Subject :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Message :</label>
                            <div class="col-sm-10">
                                <textarea class="ckeditor form-control has-feedback-left cw-table-list" id="fulldata" name="fulldata"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Attach PDF :</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <style>
    td,
    th {
        font-size: 12px;
    }

    @media print {

        @page {
            margin: 0;
        }

        .no-print {
            display: none;
            height: 0;
        }
    }
    </style>
</body>

</html>