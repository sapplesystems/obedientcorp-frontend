<?php

include_once 'connection.php';
$query = "select * from plot order by pl_id";
$data = mysqli_query($live, $query);
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
        $plot['id'] = $row['pl_id'];
        $plot['project_master_id'] = $row['pro_id'];
        $plot['sub_project_id'] = 0;
        $plot['name'] = $row['plot_no'];
        $plot['area'] = $row['plot_area'];
        $plot['unit'] = "Square Meter";
        if ($row['status'] == 1) {
            $plot['availability'] = "Booked";
        } else if ($row['status'] == 3) {
            $plot['availability'] = "Alloted";
        } else if ($row['status'] == 4) {
            $plot['availability'] = "Registry";
        } else if ($row['status'] == 5) {
            $plot['availability'] = "Hold";
        } else {
            $plot['availability'] = "Free";
        }
        $plot['description'] = '';
        $plot['photo'] = '';
        $plot['map'] = '';

        //insert here
        insertQuery($plot, 'plot_masters');
    }
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
    // echo 'insert into ' . $table . $keys . $values . '<br/><br/>';
    mysqli_query($stage, 'insert into ' . $table . ' ' . $keys . ' ' . $values);
}

?> 