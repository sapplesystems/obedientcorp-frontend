<?php

include_once 'connection.php';
$query = "SELECT customer.* , due_list.total_amt ,due_list.due_date,due_list.tot_month,due_list.nxt_due FROM customer
JOIN project ON project.pro_id = customer.plan_type
JOIN due_list ON due_list.cust_id = customer.cid
WHERE agentCode != '' AND plan_no!= ''AND plan_type!= 31";
$data = mysqli_query($live, $query) or die(mysqli_error($live));
if (mysqli_num_rows($data) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($data)) {
        $query1 = "select pl_id, plot_no from plot where plot_no = '" . $row['plan_no'] . "' ";
        $plot = mysqli_query($live, $query1) or die(mysqli_error($live));
        $plot_no = mysqli_fetch_assoc($plot);
        if (!empty($plot_no) && !empty($plot_no['plot_no'])) {
            $plot_master_id = $plot_no['pl_id'];
            $query2 = "select id from users where old_username = '" . $row['agentCode'] . "' ";
            $agent_id = mysqli_query($stage, $query2) or die(mysqli_error($stage));
            $user_id = mysqli_fetch_assoc($agent_id);
            if (!empty($user_id) && !empty($user_id['id'])) {
                //customer plot booking details
                $plot_booking['customer_id'] = $row['cid'];
                $plot_booking['customer_username'] = $row['form_no'];
                $plot_booking['registration_number'] = $row['registration_no'];
                $plot_booking['project_master_id'] = $row['plan_type'];
                $plot_booking['sub_project_id'] = $row['cid'];
                $plot_booking['plot_master_id'] = $plot_master_id;
                $plot_booking['plot_area'] = $row['ara_sq_ft'];
                $plot_booking['reference'] = '';
                $plot_booking['unit_rate'] = $row['no_month'];
                $plot_booking['discount_rate'] = 0;
                $plot_booking['total_amount'] = $row['total_consid'];
                $plot_booking['received_booking_amount'] = $row['book_amt'];

                $generated_date = date('Y-m-d', trim($row['payment_date']));
                $plot_booking['date_of_payment'] = $generated_date;
                if ($row['ins_duraion'] == 2) {
                    $installment = 12;
                } else if ($row['ins_duraion'] == 3) {
                    $installment = 36;
                } else if ($row['ins_duraion'] == 4) {
                    $installment = 60;
                } else if ($row['ins_duraion'] == 7) {
                    $installment = 84;
                } else if ($row['ins_duraion'] == 8) {
                    $installment = 24;
                } else if ($row['ins_duraion'] == 10) {
                    $installment = 120;
                } else {
                    $installment = 1;
                }

                $plot_booking['installment'] = $installment;
                $plot_booking['created_by'] = $user_id['id'];
                $plot_booking['payment_master_id'] = 0;
                //echo '<pre>';print_r($plot_booking);echo '</pre>';
                $plot_booking_id = insertQuery($plot_booking, 'customer_plot_booking_details', $i);
            }
        }
        $i++;
    }
}

function insertQuery($input, $table, $i) {
    global $stage;
    $keys = '';
    $values = '';
    foreach ($input as $key => $value) {
        $keys .= $key . ',';
        $values .= "'" . $value . "',";
    }
    $keys = ' (' . substr($keys, 0, -1) . ') ';
    $values = ' values (' . substr($values, 0, -1) . ') ';
    echo $i . '--' . 'insert into ' . $table . $keys . $values . '<br/><br/><hr/>';
    mysqli_query($stage, 'insert into ' . $table . ' ' . $keys . ' ' . $values);
    return mysqli_insert_id($stage);
}
?>