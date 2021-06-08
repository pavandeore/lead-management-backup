<head>
    <link rel="stylesheet" href="entry.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>
<?PHP
$con = new mysqli("localhost", "root", "", "lead_management");
if (isset($_POST['id']) && isset($_POST['cust_id'])) {
    @$specific_id = $_POST['id'];
    @$cust_id = $_POST['cust_id'];
    // to update from DRAFT to OPEN 

    $sqll = "UPDATE `tbl_leaddata` SET `status`='open' WHERE `tbl_leaddata`.id='$specific_id' and `tbl_leaddata`.status ='draft'";
    $con->query($sqll);


    setcookie('viewid', $specific_id); // perticular lead_id
    // setcookie('custid', $cust_id);

    $sql = "SELECT * from `customer_data`, `tbl_leaddata` WHERE `customer_data`.cust_id = `tbl_leaddata`.cust_id and `tbl_leaddata`.id ='$specific_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $customer_name = $row['customer_name'];
            $customer_address = $row['cutomer_address'];

?>

            <div class="view-div container-fluid py-2">
                <table class="view-table">
                    <tbody>
                        <tr>
                            <td class="pt-2"><b>Name: &nbsp;</b> <?php echo $row['customer_name']; ?> </td>
                            <td class="pt-2"><b>Email: &nbsp;</b> <?php echo $row['customer_email']; ?></td>
                            <td class="pt-2"><b>Contact No: &nbsp;</b> <?php echo $row["customer_number"]; ?></td>
                        </tr>
                        <tr>
                            <td class="pt-3"><b>Lead Details: &nbsp;</b> <?php echo $row['lead_type']; ?> </td>
                            <td class="pt-3"><b>Last Status: &nbsp;</b><?php echo $row["status"]; ?></td>
                            <td class="pt-3"><b>Priority: &nbsp;</b> <?php echo $row['priority']; ?></td>
                        </tr>

                    </tbody>
                </table>

                <div class="specific-status-div pt-4">
                    <div><b>Requirements: &nbsp;</b> <?php echo $row['requirement']; ?></div>
                </div><br />

                <div class="log- d-flex justify-content-between">
                    <div class="qut-log-div">
                        <div><b>Qutation Log: </b></div>
                        <div class="dynamic-qut-log">
                            <p>qut log 1</p>
                            <p>qut log 2</p>
                            <p>qut log 3</p>
                        </div>
                    </div>
                    <div class="call-log-div">
                        
                    </div>
                </div>

            </div>



            <div class="lead-action-div py-3">
                <div class="lead-action-div-upper"></div>
                <div class="lead-action-div-lower d-flex justify-content-between">
                    <div><button class="btn btn-warning " data-toggle="modal" data-target="#QutationModalCenter">Quotation. <i class="fa fa-envelope"></i></button></div>
                    <div><a href="tel:<?php echo $row['customer_number'] ?>"><button data-toggle="modal" data-target="#callModalCenter" class="btn btn-primary">Call <i class="fa fa-phone text-white"></i> </button></a></div>
                    <div>
                        <select id="manual-status" class="p-1">
                            <option disabled selected>Change Status</option>
                            <option value="draft">Draft</option>
                            <option value="open">Open</option>
                            <option value="need to send qut">Need to send Qut.</option>
                            <option value="contacted">Contacted</option>
                            <option value="quoted">Quoted</option>
                            <option value="requoted">Re Quoted</option>
                            <option value="deal done">Deal Done</option>
                            <option value="cancel">Cancel</option>
                        </select>
                        <div class="result-status-change">

                        </div>
                    </div>
                </div>
            </div>


            </div>

            <!--Quatation Modal -->

            <?php
            include 'quotationModal.php';
            ?>

            <!-- Call Modal -->

            <?php
            include 'callModal.php';
            ?>




<?php

        }
    }
}

?>

<script>

    $('#manual-status').change(function() {
        var status = $(this).val();
        $.ajax({
            url: 'manualstatusChange.php',
            type: 'POST',
            data: {
                status: status
            },
            success: function(response) {
                $('.result-status-change').html(response);
            }
        });
    });

    $(document).ready(function(){
        var t_id = Cookies.get('call_cust_id')
        
        $.ajax({
            url: 'callLog.php',
            type: 'POST',
            data: {
                id: t_id
            },
            success: function(response) {
                $('.call-log-div').html(response);
            }
        });
    })
    

    $("#upload_call_submit").click(function() {
        var data = $("#uploadCall :input").serializeArray();
        console.log(data);
        $.post($("#uploadCall").attr("action"), data, function(info) {
            $("#uploadCallResult").html(info);
            $('.alert-warning').delay('1000').fadeOut('2000');
            $('.warning-msg').delay('1000').fadeOut('2000');
        });
    })

    $("#uploadCall").submit(function() {
        return false;
    })


    

</script>