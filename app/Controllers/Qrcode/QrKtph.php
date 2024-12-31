<?php

namespace App\Controllers\Qrcode;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use TCPDF;

class QrKtph extends BaseController
{
    public function index($seg1)
    {
        $tph = explode("_",$seg1);

        // create new PDF document
        //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A5', true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Fajar Kurniawan');
        $pdf->SetTitle('Kartu TPH');
        $pdf->SetSubject('Harvee');
        $pdf->SetKeywords('Harvee, QR, QrCode, Kartu TPH');

        $pdf->SetHeaderData('', 0,'','',array(0,0,0),array(255,255,255));
        $pdf->SetFooterData(array(0,0,0),array(255,255,255));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
        
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        // add a page
        $pdf->AddPage();

        // set style for barcode
        $style = array(
            'border' =>true,
            'vpadding' => 2,
            'hpadding' => 2,
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' =>1 // height of a single module in points
        );

        $jml = count($tph);
        $ctr = 0;
        
        while ($ctr <= $jml - 1){
            $pdf->SetFillColor(255,255,255);
            $pdf->SetTextColor(0,0,0);
            $pdf->Image('images/USTP.png', 2, 11, 23, 23, 'PNG', '', '', true, 100, '', false, false, 0, false, false, false);
            $pdf->SetFont('pdfahelveticab', '', 34);
            //$pdf->MultiCell(124, 0, SITE_NAME2, 0, 'L', 0, 0, 25, 17, true);
            $pdf->MultiCell(124, 0, 'Sumber Mahardhika ', 0, 'L', 0, 0, 25, 13, true);
            $pdf->MultiCell(124, 0, 'Graha', 0, 'L', 0, 0, 57, 23, true);
            $pdf->SetFont('pdfahelveticab', '', 10);
            $pdf->MultiCell(124, 0, '© USTP-'.date("Y") , 0, 'L', 0, 0, 121, 188, true);
            $pdf->SetFont('pdfahelveticab', '', 40);
            //$pdf->MultiCell(144, 0, 'o', 0, 'C', 0, 0, 2, 1, true);
            //$pdf->MultiCell(144, 0, 'o', 0, 'C', 0, 0, 2, 189, true);
            $pdf->SetFont('pdfahelveticab', '', 66);
            

            $x= $tph[$ctr];
            $z = strlen($x) - 4;
            $dthnt = substr($x,$z,4);
            $dtph = substr($x,0,$z);
            
            $pdf->SetFillColor(0, 0, 0);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->MultiCell(144, 42, $dtph, 1, 'C', 1, 1, 2, 36, true);
            $pdf->MultiCell(144, 96, ' ', 1, 'C', 0, 0, 2, 69, true);
            // QRCODE,L : QR-CODE Low error correction
            $pdf->write2DBarcode($dtph.' ', 'QRCODE,L', 38, 85, 70, 70, $style, 'N');
            //$pdf->Text(21, 3, "T P H");
            //$pdf->Text(9, 110, $dtph);
            $pdf->SetFont('pdfahelveticab', '', 56);
            $pdf->MultiCell(144, 0, 'T T. '.$dthnt, 1, 'C', 1, 1, 2, 163, true);
            
            $pdf->RoundedRect(72, 8, 4, 4, 2, '1111', 'DF',null,array(0,128,0));
            $pdf->RoundedRect(72, 197, 4, 4, 2, '1111', 'DF',null,array(0,128,0));
            
            if ($jml -1 > $ctr){ $pdf->AddPage(); }
            
            $ctr++;
        }
        // ---------------------------------------------------------
        
        //Close and output PDF document
        $pdf->Output('tph.pdf', 'I');
        exit();

    }
}
