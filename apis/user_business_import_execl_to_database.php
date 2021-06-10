<?php 
include_once 'connection.php';
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');

$fileupload = 'payout_details.xlsx';
$Reader = new SpreadsheetReader($fileupload);

    $totalSheet = count($Reader->sheets());
	$count = 1;
    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){
      $Reader->ChangeSheet($i);
      foreach ($Reader as $Row)
      {
		   if ($count > 1) 
		   {
				$memid = isset($Row[0]) ? $Row[0] : '';
				$totalleft = isset($Row[2]) ? $Row[2] : ''; 
				$totalright = isset($Row[3]) ? $Row[3] : '';
				$matchingAmount = isset($Row[4]) ? $Row[4] : '';
				$balanceleft = isset($Row[5]) ? $Row[5] : '';
				$balanceright = isset($Row[6]) ? $Row[6] : '';
				$commision = isset($Row[7]) ? $Row[7] : '';
				$query = "insert into payout_cal(memid,ljoinAmt,rjoinAmt,lbonus,rbonus,totleft,totright,matchAmt,balleft,balright,comm,caldate) 
				values('".$memid."','','','','','".$totalleft."','".$totalright."','".$matchingAmount."','".$balanceleft."','".$balanceright."','".$commision."','')";
				echo $count .'--'.$query.'<hr/><hr/>';
				mysqli_query($live, $query) or die(mysqli_error($live));
		   }
       
			$count++;
		
        //$mysqli->query($query);
		
       }
	}

?>