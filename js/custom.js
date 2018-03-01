$( document ).ready(function() {
    var retrievedObject = localStorage.getItem('products');
    var products = JSON.parse(retrievedObject);

    $('#product_name_comp_1').autocomplete({
      lookup: products,
      onSelect: function (suggestion) {
        $( "#price_1" ).attr('value', suggestion.data);
        var tax_val = suggestion.tax / 2;
        $( "#sgst_1" ).attr('value', tax_val);
        $( "#cgst_1" ).attr('value', tax_val);
      }
    });

    $('#est_product_name_comp_1').autocomplete({
      lookup: products,
      onSelect: function (suggestion) {
        $( "#est_price_1" ).attr('value', suggestion.data);
      }
    });

    $('#add_bill_list').click(function(e){
        if ($('input[name="product_name[]"]').length != 1) {
            i = $('input[name="product_name[]"]').length + 1;
        }
        else{
            i = 2 ;
        }

        e.preventDefault();
        var  tr_append = '<tr><td><input type="text" id="product_name_comp_'+i+'" name="product_name[]" class="form-control product_name_comp" autofocus required></td><td><input type="text" id="price_'+i+'" name="price[]" class="form-control" required></td><td><input type="number" id="qty_'+i+'" name="qty[]" class="form-control qty" autofocus required></td><td><input type="text" id="sgst_'+i+'" name="sgst[]" class="form-control" required></td><td><input type="text" id="cgst_'+i+'" name="cgst[]" class="form-control" required></td><td><input type="text" id="total_'+i+'" name="total[]" class="form-control" required></td><td><a class="btn btn-danger remove_tr" id="remove_tr_'+i+'"><i class="fa fa-close"></i></a></td></tr>';
        $('.table').append(tr_append);
        selector = '#product_name_comp_'+i;
        $(selector).autocomplete({
            lookup: products,
            onSelect: function (suggestion) {
                id = this.id;
                parse_id = id.split("_");
                price_sel = "#price_"+parse_id['3'];
                $(price_sel).attr('value', suggestion.data);
                var tax_val = suggestion.tax / 2;
                sgst_sel = "#sgst_"+parse_id['3'];
                $(sgst_sel).attr('value', tax_val);
                cgst_sel = "#cgst_"+parse_id['3'];
                $(cgst_sel).attr('value', tax_val);
            }
          });
        i++;
    });

    $('#add_est_list').click(function(e){
        if ($('input[name="product_name[]"]').length != 1) {
            i = $('input[name="product_name[]"]').length + 1;
        }
        else{
            i = 2 ;
        }

        e.preventDefault();
        var  tr_append = '<tr><td><input type="text" id="est_product_name_comp_'+i+'" name="product_name[]" class="form-control product_name_comp" autofocus required></td><td><input type="text" id="est_price_'+i+'" name="price[]" class="form-control" required></td><td><input type="number" id="est_qty_'+i+'" name="qty[]" class="form-control est_qty" autofocus required></td><td><input type="text" id="est_total_'+i+'" name="total[]" class="form-control" required></td><td><a class="btn btn-danger remove_tr" id="remove_tr_'+i+'"><i class="fa fa-close"></i></a></td></tr>';
        $('.table').append(tr_append);
        selector = '#est_product_name_comp_'+i;
        $(selector).autocomplete({
            lookup: products,
            onSelect: function (suggestion) {
                id = this.id;
                parse_id = id.split("_");
                price_sel = "#est_price_"+parse_id['4'];
                $(price_sel).attr('value', suggestion.data);
            }
          });
        i++;
    });

    $(document).on("click",".remove_tr",function() {
        // console.log(this.id)
        $(this).closest ('tr').remove ();
        calc_total();
        est_total();
    });


    $('#company_name').change(function(){
    	var id = this.value;
    	$.ajax({
            type: "POST",
            url: "../controller/get_details.php",
            data: {
                id : id
            },
            success: function(data) {
                result = JSON.parse(data);
                // console.log(result);
                $( "input[name='address']" ).attr('value', result['address']);
                $( "input[name='gst_number']" ).attr('value', result['gst_number']);
                $( "input[name='contact_person']" ).attr('value', result['contact_person']);
                $( "input[name='contact_number']" ).attr('value', result['contact_number']);
            }
        });
    });

    $(document).on("keyup",".est_qty",function() {
        id = this.id;
        parse_id = id.split("_");
        calculate_est([parse_id['2']]);
        est_total();
    });

    $(document).on("keyup",".qty",function() {
        id = this.id;
        parse_id = id.split("_");
        calculate_bill([parse_id['1']]);
        calc_total();
    });
    function calculate_bill(id) {
        qty_sel = "#qty_"+id;
        sgst_sel = "#sgst_"+id;
        cgst_sel = "#cgst_"+id;
        price_sel = "#price_"+id;

        qty = $(qty_sel).val();
        sgst = $(sgst_sel).val();
        cgst = $(cgst_sel).val();
        price = $(price_sel).val();

        // console.log("qty"+qty);
        tot = price * qty;
        // console.log('tot'+tot);
        percent = (Number(sgst)+Number(cgst)) / 100;
        // console.log('percent'+percent);
        total = tot + (tot * percent );
        // console.log(total);
        total_sel = "#total_"+id;
        price = $(total_sel).attr('value',total);
    }

    function calculate_est(id) {
        qty_sel = "#est_qty_"+id;
        price_sel = "#est_price_"+id;

        qty = $(qty_sel).val();
        price = $(price_sel).val();

        tot = price * qty;
        total_sel = "#est_total_"+id;
        price = $(total_sel).attr('value',tot);
    }

    function calc_total(argument) {
        grand_total = 0;
        for (var k = 1; k <= $('input[name="product_name[]"]').length; k++) {
            grand_total = Number(grand_total) + Number($('#total_'+k).val());
            $('#bill_total').attr('value', grand_total);
        }
    }

    function est_total(argument) {
        grand_total = 0;
        for (var k = 1; k <= $('input[name="product_name[]"]').length; k++) {
            grand_total = Number(grand_total) + Number($('#est_total_'+k).val());
            $('#est_bill_total').attr('value', grand_total);
        }
    }
});