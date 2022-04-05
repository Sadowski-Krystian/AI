 <?php


require('./lib/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, "B5", true, 'UTF-8', false);



$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sadowski Krystian');
$pdf->setTitle('PDF_Generator');
$pdf->setSubject('PDF_Generator');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');
$pdf->setFontSubsetting(true);
$pdf->setFont('dejavusans', '', 14, '', true);
TCPDF_FONTS::addTTFfont('fonts/Lato-Regular.ttf');
$pdf->setFont('Lato-Regular', 'B', 16);
$pdf->AddPage();
$pdf->Image('src/zse.png', '', 20, 58, 58, '', '', '', false, 300, '', false, false, false, false, false, false);
$headerhtml = "<b><p style='font-size: 20px;'>Zespół Szkół Elektrycznych</p></b>";
$pdf->writeHTMLCell(0, 0, 75, '', $headerhtml, 0, 1, 0, true, '', true);
$htmlunderheader = "<p>3PT4 Sadowski Krystian</p>";
$pdf->writeHTMLCell(0, 0, 82, 30, $htmlunderheader, 0, 1, 0, true, '', true);
$htmllist = '<p style="text-decoration: underline; font-size: 10px"><b>Znane mi technologie Web:</b></p>
<ul style="font-size: 10px">
    <li>HTML5, CSS3, ES6</li>
    <li>Joomla, WordPress, PrestaShop</li>
    <li>Node.js i React</li>
    <li><a href="https://www.google.com">Więcej</a></li>
</ul>';
$pdf->writeHTMLCell(0, 0, 55, 80, $htmllist, 0, 1, 0, true, '', true);

$pdf->Output('mojpdf', 'I');

