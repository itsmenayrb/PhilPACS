<?php
    ob_start();
    require 'fpdf.php';
    require '../models/Config.php';
    $config = new Config();

    if (isset($_POST['printFiles'])) {


    $hash = $config->checkInput($_POST['pdfID']);
    $firstname = $config->checkInput($_POST['firstname']);
    $lastname = $config->checkInput($_POST['lastname']);
    // $hash = '1c435f753b779b209128ae3fff9837d2';
    // $firstname = 'Jamille Ann';
    // $lastname = 'Agbuya';

    class myPDF extends FPDF{
      function header(){
        $this->Image('Logo.png', 75,6, 20,20);
        $this->SetFont('Arial','B', 14);
        $this->Cell(276, 5,'B2BPRICENOW.COM, INC. dba PHILPaCS', 0, 0,'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(276, 10, 'Time-in/Payroll for',0 ,0, 'C');
        $this->Ln(20);
      }
      function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
      }
      function headerName($firstname, $lastname){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(35, 8, $firstname ,0 ,0, 'R');
        $this->Cell(150, 8, $lastname,0 ,0, 'L');
        $this->SetFont('Times', 'I', 12);
        $this->Cell(200, 8, 'Employee#:' ,0 ,0, 'L');
        $this->Ln();
        $this->SetFont('Times', 'I', 12);
        $this->Cell(35, 8, 'TIN#:' ,0 ,0, 'C');
        $this->Cell(150, 8, '',0 ,0, 'L');
        $this->SetFont('Times', 'I', 12);
        $this->Cell(200, 8, 'Position:' ,0 ,0, 'L');
        $this->Ln(15);
      }
      function headerTable($firstname, $lastname){
        $this->SetFont('Times', '', 12);
        $this->Cell(40,8,'',0,0,'R');
        $this->Cell(60,8,'AM',1,0,'C');
        $this->Cell(60,8,'PM',1,0,'C');
        $this->Cell(60,8,'OVERTIME',1,0,'C');
        $this->Cell(40,8,'TOTAL',1,0,'C');
        $this->Ln();
        $this->SetFont('Times', 'B', 12);
        $this->Cell(40,8,'DATE',1,0,'C');
        $this->Cell(30,8,'TIME IN',1,0,'C');
        $this->Cell(30,8,'TIME OUT',1,0,'C');
        $this->Cell(30,8,'TIME IN',1,0,'C');
        $this->Cell(30,8,'TIME OUT',1,0,'C');
        $this->Cell(30,8,'FROM',1,0,'C');
        $this->Cell(30,8,'TO',1,0,'C');
        $this->Cell(40,8,'',1,0,'C');
        $this->Ln();
      }
      function viewTable($firstname,$lastname,$hash){
        $this->SetFont('Times', '', 12);
        $config = new Config();
        $stmt = $config->runQuery("SELECT * FROM attendancetbl WHERE firstName=:firstName AND lastName=:lastName AND hashedFile =:hash ORDER BY Edate");
        $stmt->bindparam(":firstName", $firstname);
        $stmt->bindparam(":lastName", $lastname);
        $stmt->bindparam(":hash", $hash);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $date = strtotime($row['Edate']);
                $date = date('F j, Y', $date);
                $this->Cell(40,10,$date,1,0,'C');
                $this->Cell(30,10,$row['EMTimein'],1,0,'C');
                $this->Cell(30,10,$row['EMTimeout'],1,0,'C');
                $this->Cell(30,10,$row['EATimein'],1,0,'C');
                $this->Cell(30,10,$row['EATimeout'],1,0,'C');
                $this->Cell(30,10,'',1,0,'C');
                $this->Cell(30,10,'',1,0,'C');
                $this->Cell(40,10,'',1,0,'C');
                $this->Ln();
        }
      }
    }
    $last = $lastname . '_' . $firstname ;
}

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerName($firstname,$lastname);
    $pdf->headerTable($firstname, $lastname);
    $pdf->viewTable($firstname,$lastname,$hash);
    ob_end_clean();
    $pdf->Output($last .'_DTR.pdf', 'D');
?>
