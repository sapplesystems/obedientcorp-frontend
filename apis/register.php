<?php

include_once 'connection.php';

$query = "select * from agent_registration order by id";
$data = mysqli_query($live, $query);
while ($row = mysqli_fetch_assoc($data)) {
    $introducer_q = "select * from users where username = '" . $row['refCode'] . "'";
    $introducer_d = mysqli_query($stage, $introducer_q);
    $introducer_r = mysqli_fetch_assoc($introducer_d);
    $introducer_id = '1';
    $introducer_username = 'OA0001';
    if (!empty($introducer_r) && count($introducer_r)) {
        $introducer_id = $introducer_r['id'];
        $introducer_username = $introducer_r['username'];
    }

    $orientation_q = "select `left`,`right` from agent_registration where `left` = '" . $row['agentCode'] . "' or `right` = '" . $row['agentCode'] . "'";
    $orientation_d = mysqli_query($live, $orientation_q);
    $orientation_r = mysqli_fetch_assoc($orientation_d);
    $orientation = 'Right';
    if (!empty($orientation_r) && count($orientation_r)) {
        $left = $orientation_r['left'];
        $right = $orientation_r['right'];
        if (!empty($left) && $left == $row['agentCode']) {
            $orientation = 'Left';
        } else if (!empty($right) && $right == $row['agentCode']) {
            $orientation = 'Right';
        }
    }


    $parent_ids_q = "select id,username from 
                    (select * from users order by parent_id, users.id) users, (select @pv := '$introducer_id') 
                    initialisation where find_in_set(parent_id, @pv) > 0 and users.deleted_at IS NULL 
                    and users.orientation = '" . $orientation . "' and @pv := concat(@pv, ',', users.id) order by id desc";
    $parent_ids_d = mysqli_query($stage, $parent_ids_q);
    $parent_ids_r = mysqli_fetch_assoc($parent_ids_d);

    $pid = $introducer_id;
    $pnode = $introducer_username;
    if (!empty($parent_ids_r) && count($parent_ids_r)) {
        $pid = $parent_ids_r['id'];
        $pnode = $parent_ids_r['username'];
    }

    $users['username'] = $row['agentCode'];
    $users['introducer_code'] = $row['refCode'];
    $users['parent_node'] = $pnode;
    $users['left_node'] = $row['left'];
    $users['right_node'] = $row['right'];
    $users['orientation'] = $orientation;
    $users['designation_id'] = $row['rank'];
    $users['referral_id'] = $row[''];
    $users['parent_id'] = $pid;
    $users['left_node_id'] = $row[''];
    $users['right_node_id'] = $row[''];
    $users['associate_name'] = $row['name'];
    $users['icard_no'] = $row[''];
    $users['icard_issued_on'] = $row[''];
    $users['icard_valid_till'] = $row[''];
    $users['gender'] = (!empty($row['sex'])) ? ucfirst(strtolower($row['sex'])) : 'Male';
    $users['dob'] = (!empty($row['ag_join_date'])) ? date('Y-m-d', $row['ag_join_date']) : date('Y-m-d');
    $users['father_or_husband_name'] = $row['father'];
    $users['mothers_name'] = $row['mother'];
    $users['email'] = $row['email'];
    $users['mobile_no'] = $row['mobile'];
    $users['secondary_mobile_no'] = $row[''];
    $users['marital_status'] = $row[''];
    $users['occupation'] = $row[''];
    $users['house_no'] = $row['house_no'];
    $users['block'] = $row['block'];
    $users['sector'] = $row['sector'];
    $users['street_no'] = $row['street'];
    $users['village_colony'] = $row['colony'];
    $users['post_office_or_sub_city'] = $row['postoffice'];
    //$users['state'] = $row[''];
    //$users['city'] = $row[''];
    $users['pin_code'] = $row['pincode'];
    $users['land_line_phone'] = $row['landline'];
    $users['pan'] = $row[''];
    $users['address'] = $row[''];
    //$users['rank'] = $row[''];
    $users['signature'] = $row[''];
    $users['photo'] = $row[''];
    $users['email_verified_at'] = $row[''];
    //$users['password'] = $row[''];
    //$users['transaction_password'] = $row[''];
    $users['org_password'] = $row['login_pass'];
    //$users['org_transaction_password'] = $row[''];
    $users['user_type'] = 'AGENT';
    $users['is_activated'] = '1';

    //insert here
    $user_id = insertQuery($users, 'users');

    $user_business['user_id'] = $user_id;
    insertQuery($user_business, 'user_businesses');

    $user_bank_detail['user_id'] = $user_id;
    $user_bank_detail['payee_name'] = $row['name'];
    $user_bank_detail['bank_name'] = $row['bank_name'];
    $user_bank_detail['account_number'] = $row['account_number'];
    $user_bank_detail['branch'] = $row['branch'];
    $user_bank_detail['ifsc_code'] = $row['ifscCode'];
    insertQuery($user_bank_detail, 'user_bank_details');

    $user_nominee_detail['user_id'] = $user_id;
    insertQuery($user_nominee_detail, 'user_nominee_details');

    $user_kyc_detail['user_id'] = $user_id;
    $user_kyc_detail['dob'] = (!empty($row['dob'])) ? date('Y-m-d', strtotime($row['dob'])) : null;
    $user_kyc_detail['nationality'] = 'Indian';
    $user_kyc_detail['occupation'] = $row['occupation'];
    $user_kyc_detail['qualification'] = $row['quali'];
    //$user_kyc_detail['adhar'] = $row['occupation'];
    $user_kyc_detail['pan_number'] = $row['pan_no'];
    $user_kyc_detail['passport_number'] = $row['passport'];
    $user_kyc_detail['driving_licence_number'] = $row['drive_li_no'];
    $user_kyc_detail['proposed_area_of_work'] = $row['area_work'];
    $user_kyc_detail['voter_id'] = $row['voter'];
    $user_kyc_detail['join_date'] = (!empty($row['ag_join_date'])) ? date('Y-m-d', $row['ag_join_date']) : date('Y-m-d');
    insertQuery($user_kyc_detail, ' user_kyc_details');

    $user_ewallet['user_id'] = $user_id;
    insertQuery($user_ewallet, 'e_wallets');

    $user_income_fund['user_id'] = $user_id;
    insertQuery($user_income_fund, 'income_funds');

    echo $row['id'] . ' - ' . $row['refCode'] . ' - ' . $user_id . '<hr/><hr/><hr/>';
}

function insertQuery($input, $table) {
    global $stage;
    $keys = '';
    $values = '';
    foreach ($input as $key => $value) {
        $keys .= $key . ',';
        $values .= "'" . $value . "',";
    }
    $keys = ' (' . substr($keys, 0, -1) . ') ';
    $values = ' values (' . substr($values, 0, -1) . ') ';
    echo 'insert into ' . $table . $keys . $values . '<br/><br/>';
    mysqli_query($stage, 'insert into ' . $table . ' ' . $keys . ' ' . $values);
    return mysqli_insert_id($stage);
}

?>
