<style>
#quantity-inp{
  width: 60px;
}
</style>
<div class="modal fade" id="QutationModalCenter" tabindex="-1" role="dialog" aria-labelledby="QutationModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <form class="form insert-form" action="quotationModalUpload.php" method="POST" id="isert_form">
                                <div class="form-group">
                                    <div class="row d-flex  align-items-center border m-1 border-dark">
                                        <div class="col-6">
                                            <h2><b>Quotation</b></h2>
                                        </div>
                                        <div class="col-6"><img src='./assets/dark-logo.png' class='w-100'></div>
                                    </div>
                                    <div class="row border m-1 border-dark">
                                        <div class="col-6">
                                            <h6><b>Betel Digitech Pvt Ltd</b></h6>
                                            <p>
                                                B7, Tanishq Building, Opp Gulmohar Orchid, Kharadi- Pune14.
                                            </p>
                                            <p>
                                                <a href="www.betelitservices.com">www.betelitservices.com</a><br />
                                                <a href="mailto:machindra@betelitservices.com">machindra@betelitservices.com</a>
                                            <p><b>GSTIN:</b> 27AAICB0598B1ZS</p>
                                            </p>
                                        </div>
                                        <div class="col-6 border-left border-dark">
                                            <p><b>Date:</b> <?php echo date("Y/m/d"); ?></p>
                                            <p><b>Qut No:</b> ABCDEFGHIJKL</p><br /><br /><br />
                                            <h3 class="text-center"><b>Call - 8282898484</b></h3>
                                        </div>
                                    </div>
                                    <div class="row border m-1 border-dark">
                                        <p class="col-12">
                                            To<br />
                                            <b><?php echo $customer_name; ?></b><br />
                                            <?php echo $customer_address; ?>
                                        </p>
                                    </div>
                                    <div class="row border m-1 border-dark">
                                    <table class="table" id="table_field">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                            </tr>
                                            
                                            <tr>
                                                <td><input class="form-control" type="text" name="txtFullname[]" /></td>
                                                <td><input class="form-control" type="text" name="txtEmail[]" /></td>
                                                <td><input class="form-control" type="text" name="txtPhone[]" /></td>
                                                <td><input class="form-control" type="text" name="txtAddress[]" /></td>
                                                <td><input class="form-control btn btn-danger" type="button" value=" - " id="remove" name="remove" /></td>
                                            </tr>
                                    </table>  
                                        <div id="add-btn-div" class='m-3'>
                                                <tr>
                                                    <td colspan='2'><button type="button" id="add" name="add" class='btn btn-success '><i class='fa fa-plus'></i> Add More</button></td>
                                                </tr>
                                        </div> 
                                    </div>
                                    <div class="row border m-1 border-dark">
                                        <div class="col-6 mb-2">
                                            <p><b>Note:</b><br />
                                                All price including GST<br />
                                                All price are with installation<br />
                                                Payment Advance<br /></p>
                                            <b>Quotation valid for 7 Days only</b>
                                        </div>
                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <p class="">
                                                <b>For Betel Digitech Pvt Ltd<br /><br /><br />
                                                    Stamp & Signature
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-div">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input class="btn btn-primary" type="submit" id="save" name="save" value="Send Mail" />
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>

<script>

<?php

// Fetch item master
include 'config.php';
?>

    $(document).ready(function(){
        var html = ' <tr><td><input class="form-control" type="text" name="txtFullname[]" /></td><td><input class="form-control" type="text" name="txtEmail[]" /></td><td><input class="form-control" type="text" name="txtPhone[]" /></td><td><input class="form-control" type="text" name="txtAddress[]" /></td><td><input class="form-control btn btn-danger" type="button"  value=" - " id="remove" name="remove"  /></td></tr>';

        var x = 1;
        $("#add").click(function(){
            $("#table_field").append(html);
        })
        $("#table_field").on('click','#remove',function(){
            $(this).closest('tr').remove();
        })


        // $("#save").click(function() {
        //     var data = $("#isert_form :input").serializeArray();
        //     console.log(data);
        //     $.post($("#isert_form").attr("action"), data, function(info) {
        //         console.log(info)
        //     });
            
        // })

        

    })

    
    function itemIdSend(id)
    {
        var itemIdSelect = id.value;
        $.ajax({
                url: 'quotationModalItemSelect.php',
                type: 'POST',
                data: {
                    itemIdSelect: itemIdSelect
                },
                success: function(response) {
                    $('#rr').html(response);
                }
        });
    }
    
    
</script>


