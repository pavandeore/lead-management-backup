<?php

require_once 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('style.css');
$html = "
<div class='modal-body'>
    <div class='heading-div'>
        <div class='mini-heading'>
            <h1><b>Quotation</b></h1>
        </div>
        <img src='./assets/dark-logo.png' class='logo-img' />
    </div>
    <div class='row border m-1 border-dark'>
        <div class='col-6'>
            <h6><b>Betel Digitech Pvt Ltd</b></h6>
            <p>
                B7, Tanishq Building, Opp Gulmohar Orchid, Kharadi- Pune14.
            </p>
            <p>
                <a href='www.betelitservices.com'>www.betelitservices.com</a><br />
                <a href='mailto:machindra@betelitservices.com'>machindra@betelitservices.com</a>
            <p><b>GSTIN:</b> 27AAICB0598B1ZS</p>
            </p>
        </div>
        <div class='col-6 border-left border-dark'>
            <p><b>Date:</b> <?php echo date('Y/m/d'); ?></p>
            <p><b>Qut No:</b> ABCDEFGHIJKL</p><br /><br /><br />
            <h3 class='text-center'><b>Call - 8282898484</b></h3>
        </div>
    </div>
    <div class='row border m-1 border-dark'>
        <p class='col-12'>
            To<br />
            <b><?php echo customer_name; ?></b><br />
            <?php echo customer_address; ?>
        </p>
    </div>
    <div class='row border m-1 border-dark'>
        <table class='table' id='first-row'>
            <thead>
                <tr>
                    <th>Sr.No.</th>
                    <th>Item & Description</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Total</th>
                    <th>GST</th>
                    <th>Tax Amount</th>
                    <th>Final Amount</th>
                </tr>
            </thead>
            <tbody>
            <div id='row-data'>
                <div >
                    <tr >
                        <td>1</td>
                        <td>
                            <div class='row'>
                                <div class='col-6'>Item Name</div>
                                <div class='col-6'>Item Description</div>
                            </div>
                        </td>
                        <td>2</td>
                        <td>250.00</td>
                        <td>500.00</td>
                        <td>18%</td>
                        <td>90</td>
                        <td>590.00</td>
                    </tr>
                    <tr>
                        <td colspan='6'></td>
                        <td><b>Total</b></td>
                        <td>590.00</td>
                    </tr>
                </div> 
            </div>
            </tbody>
        </table>
    </div>
    <div class='row'>
        <div class='col-6 mb-2'>
            <p><b>Note:</b><br />
                All price including GST<br />
                All price are with installation<br />
                Payment Advance<br /></p>
            <b>Quotation valid for 7 Days only</b>
        </div>
        <div class='col-6 d-flex justify-content-center align-items-center'>
            <p class=''>
                <b>For Betel Digitech Pvt Ltd<br /><br /><br />
                    Stamp & Signature
                </b>
            </p>
        </div>
    </div>

</div>
";
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->output('rr.pdf');

?>