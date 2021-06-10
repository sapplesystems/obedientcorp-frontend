<?php

$db = new PDO('mysql:host=myobedient.com;dbname=obedient_db', 'obedient_dbuser', '6tJSMedq*ie8');

require_once 'Classes/PHPExcel.php';
$excel = new PHPExcel();

$query = $db->query("select CONCAT(users.associate_name,' (',users.username, ')') as display_name, total_left_business, 
                total_right_business, total_self_business, remaining_left_business, remaining_right_business, matching_amount, commission, 
                sponsor, reward, offer, bde, income_fund, 
                tds, processing_fee, other_charges, payout_amount, week_no, DATE_FORMAT(DATE_ADD(payouts.from_date, INTERVAL 1 DAY), '%d-%b-%Y') as from_date, 
                DATE_FORMAT(payouts.to_date, '%d-%b-%Y') as to_date, DATE_FORMAT(Date(payouts.created_at), '%d-%b-%Y') as created_date,
                payee_name, IFNULL(bank_name,'') as bank_name, IFNULL(account_number,'') AS account_number, IFNULL(branch,'') AS branch, 
                IFNULL(ifsc_code,'') AS ifsc_code, IFNULL(adhar,'') AS adhar, IFNULL(pan_number,'') AS pan_number, 
                IFNULL(users.mobile_no,'') AS mobile_no, IFNULL(users.email,'') as email
                from payouts inner join users on users.id = payouts.user_id 
                INNER JOIN user_bank_details ON users.id = user_bank_details.user_id AND user_bank_details.deleted_at IS NULL
                INNER JOIN user_kyc_details ON users.id = user_kyc_details.user_id
                where payouts.week_no='111' and payouts.payout_amount > 0 order by payouts.created_at desc");
$row_count = $query->rowCount();
$row = $query->fetchAll(PDO::FETCH_OBJ);
$row_number = 1;


$styleThinBlackBorderOutline = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => 'FF000000'),
        ),
    ),
);


$excel->setActiveSheetIndex(0)
        ->setCellValue('A' . $row_number, 'Week No.')
        ->setCellValue('B' . $row_number, 'Date')
        ->setCellValue('C' . $row_number, 'Associate Name')
        ->setCellValue('D' . $row_number, 'Left BV')
        ->setCellValue('E' . $row_number, 'Right BV')
        ->setCellValue('F' . $row_number, 'Balance Left BV')
        ->setCellValue('G' . $row_number, 'Balance Right BV')
        ->setCellValue('H' . $row_number, 'Matching BV')
        ->setCellValue('I' . $row_number, 'Commission')
        ->setCellValue('J' . $row_number, 'BDE')
        ->setCellValue('K' . $row_number, 'Sponsor Income')
        ->setCellValue('L' . $row_number, 'Reward')
        ->setCellValue('M' . $row_number, 'Offer')
        ->setCellValue('N' . $row_number, 'Total Payout')
        ->setCellValue('O' . $row_number, 'TDS')
        ->setCellValue('P' . $row_number, 'Processing Fee')
        ->setCellValue('Q' . $row_number, 'Other Charges')
        ->setCellValue('R' . $row_number, 'Payout Amount')
        ->setCellValue('S' . $row_number, 'Account Holder Name')
        ->setCellValue('T' . $row_number, 'Bank Name')
        ->setCellValue('U' . $row_number, 'Account Number')
        ->setCellValue('V' . $row_number, 'Branch Name')
        ->setCellValue('W' . $row_number, 'IFSC Code')
        ->setCellValue('X' . $row_number, 'Aadhaar')
        ->setCellValue('Y' . $row_number, 'Pan Number')
        ->setCellValue('Z' . $row_number, 'Mobile')
        ->setCellValue('AA' . $row_number, 'Email');
$row_number++;
for ($i = 0; $i < $row_count; $i++) {
    $excel->getActiveSheet()->setCellValue('A' . $row_number, $row[$i]->week_no)
            ->setCellValue('B' . $row_number, $row[$i]->from_date . ' To ' . $row[$i]->to_date)
            ->setCellValue('C' . $row_number, $row[$i]->display_name)
            ->setCellValue('D' . $row_number, $row[$i]->total_left_business)
            ->setCellValue('E' . $row_number, $row[$i]->total_right_business)
            ->setCellValue('F' . $row_number, $row[$i]->remaining_left_business)
            ->setCellValue('G' . $row_number, $row[$i]->remaining_right_business)
            ->setCellValue('H' . $row_number, $row[$i]->matching_amount)
            ->setCellValue('I' . $row_number, $row[$i]->commission)
            ->setCellValue('J' . $row_number, $row[$i]->bde)
            ->setCellValue('K' . $row_number, $row[$i]->sponsor)
            ->setCellValue('L' . $row_number, $row[$i]->reward)
            ->setCellValue('M' . $row_number, $row[$i]->offer)
            ->setCellValue('N' . $row_number, $row[$i]->income_fund)
            ->setCellValue('O' . $row_number, $row[$i]->tds)
            ->setCellValue('P' . $row_number, $row[$i]->processing_fee)
            ->setCellValue('Q' . $row_number, $row[$i]->other_charges)
            ->setCellValue('R' . $row_number, $row[$i]->payout_amount)
            ->setCellValue('S' . $row_number, $row[$i]->payee_name)
            ->setCellValue('T' . $row_number, $row[$i]->bank_name)
            ->setCellValue('U' . $row_number, $row[$i]->account_number)
            ->setCellValue('V' . $row_number, $row[$i]->branch)
            ->setCellValue('W' . $row_number, $row[$i]->ifsc_code)
            ->setCellValue('X' . $row_number, $row[$i]->adhar)
            ->setCellValue('Y' . $row_number, $row[$i]->pan_number)
            ->setCellValue('Z' . $row_number, $row[$i]->mobile_no)
            ->setCellValue('AA' . $row_number, $row[$i]->email);

    $excel->getActiveSheet()->getStyle('U' . $row_number)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
    $excel->getActiveSheet()->getStyle('X' . $row_number)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
    $excel->getActiveSheet()->getStyle('Z' . $row_number)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);

    $row_number++;
}


/* $borderindex = sprintf('A1:K%d', $i);
  echo date('H:i:s') . " Set thin black border outline around column\n";
  $styleThinBlackBorderOutline = array(
  'borders' => array(
  'outline' => array(
  'style' => PHPExcel_Style_Border::BORDER_THIN,
  'color' => array('argb' => 'FF000000'),
  ),
  ),
  );
  $excel->getActiveSheet()->getStyle($borderindex)->applyFromArray($styleThinBlackBorderOutline); */


$excel->getActiveSheet()->getStyle('A1:AA1')->getFont()->setBold(true);
$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
//$excel->getActiveSheet()->getStyle('A1:AA1')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('A1:AA' . $row_number)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
//$excel->getActiveSheet()->getStyle('A1:AA' . $row_number)->applyFromArray($styleThinBlackBorderOutline);

$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$file_name = 'Payout-History-' . time() . '.xlsx';
$file->save($file_name);
exit;

// Set column widths
echo date('H:i:s') . " Set column widths\n";
$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(true);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(true);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(true);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(true);

// Merge cells
echo date('H:i:s') . " Merge cells\n";
$excel->getActiveSheet()->mergeCells('D1:E1');


// Set fonts
echo date('H:i:s') . " Set fonts\n";
$excel->getActiveSheet()->getStyle('D1')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(20);
$excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('D1')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('D1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('D2')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('D2')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('D2')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('D2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('D3')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('D3')->getFont()->setSize(10);
$excel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('D3')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('D3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('B4')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('B4')->getFont()->setSize(10);
$excel->getActiveSheet()->getStyle('B4')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('B4')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('B4')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('A7')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A7')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('A7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('C7')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('C7')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('C7')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('C7')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('C7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('E7')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('E7')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('E7')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('E7')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('E7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('G7')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('G7')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('G7')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('G7')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('G7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('I7')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('I7')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('I7')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('I7')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('I7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$excel->getActiveSheet()->getStyle('K7')->getFont()->setName('Arial');
$excel->getActiveSheet()->getStyle('K7')->getFont()->setSize(12);
$excel->getActiveSheet()->getStyle('K7')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('K7')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$excel->getActiveSheet()->getStyle('K7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);


// Set thin black border outline around column
$borderindex = sprintf('A1:K%d', $i);
echo date('H:i:s') . " Set thin black border outline around column\n";
$styleThinBlackBorderOutline = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => 'FF000000'),
        ),
    ),
);
$excel->getActiveSheet()->getStyle($borderindex)->applyFromArray($styleThinBlackBorderOutline);

// Set alignments
echo date('H:i:s') . " Set alignments\n";

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'HTML');
$objWriter->setSheetIndex(0);

$objWriter->save(str_replace('.php', '.htm', __FILE__));
// Echo memory peak usage
echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
echo date('H:i:s') . " Done writing files.\r\n";
?>