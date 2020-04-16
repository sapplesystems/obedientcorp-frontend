<?php

include_once 'connection.php';
$query = "select * from project order by pro_id";
$data = mysqli_query($live, $query);
if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
        $project['id'] = $row['pro_id'];
        $project['name'] = $row['pro_name'];
        $project['parent_id'] = 0;
        $project['unit_price'] = $row['uprice'];
        $project['description'] = $row['desc'];
        $project['photo'] = $row['pro_img'];
        $project['map'] = $row['pro_map'];

        //insert here
        insertQuery($project, 'project_masters');
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
    echo 'insert into ' . $table . $keys . $values . '<br/><br/>';
    mysqli_query($stage, 'insert into ' . $table . ' ' . $keys . ' ' . $values);
}

?> 