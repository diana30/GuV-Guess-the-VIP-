<?php
require_once "core/database/connection.php";
include "core/users.php";


$conn->query( "DROP TABLE `generate`" );
$conn->query("CREATE TABLE `generate` ( user_id INT, username VARCHAR(255), score INT )");
$result = $conn->query("select id,username, score from `twusers` WHERE usertype != 'admin' order by score desc LIMIT 0,10");
while ($row = $result->fetch_assoc()) {
	$query = "INSERT INTO `generate` VALUES( " . $row["id"] . ", '" . $row["username"] . "'," . $row["score"]. ")";
	$conn->query($query);
}
$result = $conn->query("SELECT * FROM `generate`");
echo '<pre>';
$results_post = [];
if($result){ // daca query-ul nu contine erori
	while($row = $result->fetch_assoc()){ // atat timp cat exista randuri in tabela, le salvez ca un array in $row
		$results_post[] = $row;
	}
}
ob_start();
require_once 'fpdf.php';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',10);
$pdf->Cell(25,7,"User id");
$pdf->Cell(30,7,"Username");
$pdf->Cell(40,7,"Score");
$pdf->Ln();
$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
foreach ($results_post as $pdf_row) {
	

	$id = $pdf_row["user_id"];
	$username =  $pdf_row["username"];
	$desc =  $pdf_row["score"];
	$desc .= " points";
	$pdf->Cell(25,7,$id);
	$pdf->Cell(30,7,$username);
	$pdf->Cell(40,7,$desc);
	$pdf->Ln();
}
$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Output('F','filename.pdf');
ob_end_flush();



$fp = fopen('results.json', 'w');
$csv = fopen('results.csv', 'w');
fwrite($fp, json_encode($results_post));
foreach ($results_post as $fields) {
	$res_array = (array) $fields;
	fputcsv($csv, $res_array);

}
fgets($csv, 4096);
fclose($csv);
fclose($fp);

$fh = fopen('output.html', 'w') or die("can't open file");
fwrite($fh, '<html><body>');
fwrite($fh, '<table><tr><th>User id</th><th>Username</th><th>Total</th></tr>');
foreach ($results_post as $row_html){
	fwrite($fh, "<tr><td>".$row_html["user_id"]."</td><td>".$row_html["username"]."</td><td>".$row_html["score"]."</td><td></tr>");
}
fwrite($fh, "</table>");
fwrite($fh, '</body></html>');
fclose($fh);
?>
<script type="text/javascript">
	window.location.href = 'adminInsert.php';
</script>