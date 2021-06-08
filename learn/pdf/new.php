<?php
require('html2pdf.php');

if(isset($_POST['text']))
{
    $pdf=new PDF_HTML();
    $pdf->SetFont('Arial','',12);
    $pdf->AddPage();
    $pdf->WriteHTML($_POST['text']);
    $pdf->Output();
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>HTML2PDF</title>
<style type="text/css">
input, textarea {
    font-family: lucida console;
    font-size: 9pt;
    border: 1px solid #B0B0B0;
}
body {
    font-family: lucida console;
    font-size: 9pt;
    background-color: #F0F0F0;
}
</style>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
Content:<br>
<textarea name="text" cols="80" rows="15"></textarea><br><br>
<input type="submit" value="Generate PDF">
</form>
</body>
</html>