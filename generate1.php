<?php
require_once "core/database/connection.php";
include "core/users.php";


$conn->query( "DROP TABLE `generate`" );
$conn->query("CREATE TABLE `generate` ( photo_id INT, res INT )");
$result = $conn->query("select photo_id, ROUND(AVG(errors)) AS res FROM (select * from `wrong` ORDER by photo_id) AS sort GROUP BY photo_id ORDER BY 2 LIMIT 0,5 ");
while ($row = $result->fetch_assoc()) {
    $query = "INSERT INTO `generate` VALUES( " . $row["photo_id"] . ", " . $row["res"] . ")";
    $conn->query($query);
}
$result = $conn->query("select photo_id, ROUND(AVG(errors)) AS res FROM (select * from `wrong` ORDER by photo_id ) AS sort GROUP BY photo_id ORDER BY 2 DESC LIMIT 0,5 ");
while ($row = $result->fetch_assoc()) {
    $query = "INSERT INTO `generate` VALUES( " . $row["photo_id"] . ", " . $row["res"] . ")";
    $conn->query($query);
}
$result = $conn->query("SELECT * FROM `generate`");
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
$pdf->Cell(25,7,"Photo id");
$pdf->Cell(30,7,"Wrong");
$pdf->Ln();
$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
for ($i=0 ; $i<10;$i++) {
    if ($i==5) {
        $pdf->Cell(450, 7, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
        $pdf->Ln();
    }
    $id = $results_post[$i]["photo_id"];
    $res =  $results_post[$i]["res"];
    $pdf->Cell(25,7,$id);
    $pdf->Cell(30,7,$res);
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
fwrite($fh, '<table><tr><th>Photo id</th><th>Wrong</th></tr>');
foreach ($results_post as $row_html){
    fwrite($fh, "<tr><td>".$row_html["photo_id"]."</td><td>".$row_html["res"]."</td><td></tr>");
}
fwrite($fh, "</table>");
fwrite($fh, '</body></html>');
fclose($fh);
?>
<script type="text/javascript">
    window.location.href = 'adminInsert.php';
</script>