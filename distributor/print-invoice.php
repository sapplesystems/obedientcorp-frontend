<?php
include_once '../config.php';
?>

<!DOCTYPE html>
<head>
    <title>Tax Invoice</title>
</head>

<body>
    <div style="max-width:800px; margin:20px auto;">
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr><td width="20%"><img style="height:80px;" src="<?php echo $home_url; ?>assets/images/obedient-logo.png" /></td>
                <td width="60%" style="color:#000000; font-size:22px; font-family:arial; text-align:center; font-weight:bold;">TAX INVOICE</td>
                <td width="20%"></td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:30px;">
            <tr><td style="color:#b66dff; font-size:20px; font-family:arial; text-align:center; font-weight:bold;" id="firm_name"></td></tr>
            <tr><td style="color:#444444; font-size:14px; font-family:arial; text-align:center; font-weight:normal; padding-top:5px;" id="distributor_add_city_pin"></td></tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:10px;">
            <tr><td style="color:#000000; font-size:14px; font-family:arial; text-align:left; font-weight:bold;" width="50%">GSTIN No. <span style="font-weight:normal;" id="gstin_no"></span></td><td style="color:#000000; font-size:14px; font-family:arial; text-align:right; font-weight:bold;" width="50%">Distributor Code. <span style="font-weight:normal;" id="distributor_code"></span></td></tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:20px;border-collapse:collapse;">
            <tr>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;">Invoice No.</td>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial;" id="invoice_no"></td>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;">Invoice Date</td>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial;" id="invoice_date"></td>
            </tr>
            <tr>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;">Name</td>
                <td colspan="2" width="50%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial;" id="name"></td>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial;">Associate ID <span id="associate_id"></span></td>
            </tr>
            <tr>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;">Address</td>
                <td colspan="3" width="75%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial;" id="address"></td>
            </tr>
            <tr>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;">Mobile</td>
                <td colspan="3" width="75%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial;" id="mobile"></td>
            </tr>
            <tr>
                <td width="25%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;">GSTIN No.</td>
                <td colspan="3" width="75%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial;" id="gstin_no2"></td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top:20px;border-collapse:collapse;">
            <thead>
                <tr>
                    <th width="8%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed; text-align:center;">S.No.</th>
                    <th width="40%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed;">Item Name</th>
                    <th width="12%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed;">Item Code</th>
                    <th width="10%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed;">Rate</th>
                    <th width="8%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed;">Qty</th>
                    <th width="22%" style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed;">Amount</th>
                </tr>
            <tbody id="item_list"></tbody>
            </thead>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" WIDTH="30%" style="margin-top:20px;border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed; text-align:left;">Payment Details</th>
                    <th style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial;background-color:#ededed; text-align:left;"></th>
                </tr>
            <thead>
            <tbody id="payment_details"></tbody>
        </table>

        <h3 style="color:#b66dff; font-size:20px; font-family:arial; text-align:center; font-weight:bold; margin-bottom:0px; margin-top:100px;">Thank you for your Business</h3>
        <p style="color:#444444; font-size:14px; font-family:arial; text-align:center; font-weight:normal; padding-top:5px; margin-top:0px;margin-bottom: 0;">&copy; <?php echo date('Y'); ?> Obedient Marketing Universal Private Limited</p>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var base_url = "<?php echo $base_url; ?>";
        var url = base_url + 'distributor/sales-report-detail';
        var invoice_id = "<?php echo $_REQUEST['invoice_id'] ?>";
        $(document).ready(function () {
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    invoice_id: invoice_id
                },
                success: function (response) {
                    var html = '';
                    var coupon_html = '';
                    var cash_html = '';
                    if (response.status == 'success') {
                        var data = response.data;
                        $('#firm_name').html(data.firm_name);
                        $('#distributor_add_city_pin').html(data.distributor_address);
                        $('#gstin_no').html(data.gstin_no);
                        $('#distributor_code').html(data.distributor_id);
                        $('#invoice_no').html(data.invoice_no);
                        $('#invoice_date').html(data.created_at);
                        $('#name').html(data.customer_name);
                        $('#associate_id').html(data.associate_id);
                        $('#address').html(data.associate_address);
                        $('#mobile').html(data.customer_mobile);
                        $('#gstin_no2').html('');
                        var item_list = '';
                        var sr_no = 1;
                        $.each(data.item, function (key, value) {
                            item_list += '<tr>\n\
                                            <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + sr_no + '</td>\n\
                                            <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + value.name + '</td>\n\
                                            <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + value.code + '</td>\n\
                                            <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + value.price + '</td>\n\
                                            <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + value.quantity + '</td>\n\
                                            <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + value.total + '</td>\n\
                                        </tr>';
                            sr_no++;
                        });
                        item_list += '<tr>\n\
                                        <td style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:right;" colspan="5">Total</td>\n\
                                        <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + data.subtotal_amount + '</td>\n\
                                    </tr>\n\
                                    <tr>\n\
                                        <td style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:right;" colspan="5">Taxes</td>\n\
                                        <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + data.tax + '</td>\n\
                                    </tr>\n\
                                    <tr>\n\
                                        <td style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:right;" colspan="5">Grand Total</td>\n\
                                        <td style="border:1px solid #999999; color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:center;">' + data.total_amount + '</td>\n\
                                    </tr>';
                        $('#item_list').html(item_list);

                        var payment_details = '<tr>\n\
                                                    <td style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:left;">Via Cash</td>\n\
                                                    <td style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:right;" id="via_cash">'+data.cash_amount+'</td>\n\
                                                </tr>\n\
                                                <tr>\n\
                                                    <td style="color:#000000; font-size:12px; font-weight:bold; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:left;">Via Shopping Card</td>\n\
                                                    <td style="color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:right;" id="via_shopping_card">'+data.coupon_amount+'</td>\n\
                                                </tr>';

                        if (data.coupon.length > 0) {
                            $.each(data.coupon, function (key, value) {
                                payment_details += '<tr>\n\
                                                    <td style="color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:left;">'+value.code+'</td>\n\
                                                    <td style="color:#000000; font-size:12px; font-weight:normal; padding:5px; vertical-align:middle;font-family:arial; height:16px; text-align:right;">'+value.amount+'</td>\n\
                                                </tr>';
                            });
                        }
                        $('#payment_details').html(payment_details);
                        window.print();
                    }
                }
            });
        });
    </script>

</body>
</html>
