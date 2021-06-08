<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "lead_management";

session_start();

$con = mysqli_connect($host, $username, $password, $dbname);

$result = $con->query("SELECT * FROM `customer_data` JOIN `tbl_leaddata` ON `customer_data`.cust_id = `tbl_leaddata`.cust_id ORDER BY `followup_date`");
if ($result->num_rows > 0) {
?>
    <div class="search-filter-div d-flex justify-content-between align-items-center curve-box text-white">
        <div class="search-div">
            <input type="text" autocomplete="off" id="search" name="search customer-name" class="search" class="border-info col-10 " placeholder="Customer Name" style="width: 350px;" />
        </div>
        <div></div>
        <div class="filter-div d-flex">
            <div class="filter-by-lead">
                <select id="lead-type">

                    <option value="select all" selected>Lead Type</option>
                    <option value="repair">Repair</option>
                    <option value="rental">Rental</option>
                    <option value="New Desktop">New Desktop</option>
                    <option value="New Laptop">New Laptop</option>
                    <option value="New Projector">New Projector</option>
                    <option value="Old Desktop">Old Desktop</option>
                    <option value="Old Laptop">Old Laptop</option>
                    <option value="Old Projector">Old Projector</option>
                    <option value="Networking">Networking</option>
                    <option value="CCTV">CCTV</option>
                    <option value="Data Recovery">Data Recovery</option>
                    <option value="Software">Software</option>
                </select>
            </div>
            <div class="filter-by-status ml-1">
                <select id="status">
                    <option value="select all" selected> Status</option>
                    <option value="draft">Draft</option>
                    <option value="open">Open</option>
                    <option value="need to send qut">Need to send Qut.</option>
                    <option value="contacted">Contacted</option>
                    <option value="quoted">Quoted</option>
                    <option value="requoted">Re Quoted</option>
                    <option value="deal done">Deal Done</option>
                    <option value="cancel">Cancel</option>
                </select>
            </div>
        </div>
    </div>
    <div class="maindash-table-div text-dark">



    </div>
<?php
}
?>

<script>
    $(document).ready(function(){
        $('.maindash-table-div').load('maindash-data.php');
    })

    $('#search').keyup(function() {
        var searchText = $(this).val();
        
        if (searchText != '') {
            $.ajax({
                url: 'maindash-specific-data.php',
                type: 'POST',
                data: {
                    query: searchText
                },
                success: function(response) {
                    console.log(response);
                    $('.maindash-table-div').html(response);
                }
            });
        }else{
            $('.maindash-table-div').load('maindash-data.php');
        } 
    })

    $('#lead-type').change(function() {
        var leadType = $(this).val();
        $.ajax({
                url: 'lead-type.php',
                type: 'POST',
                data: {
                    leadType: leadType
                },
                success: function(response) {
                    $('.maindash-table-div').html(response);
                }
        });
    });

    $('#status').change(function() {
        var status = $(this).val();
        $.ajax({
                url: 'maindash-bystatus.php',
                type: 'POST',
                data: {
                    status: status
                },
                success: function(response) {
                    $('.maindash-table-div').html(response);
                }
        });
    });



    function getrecord(id,cust_id) {
        Cookies.set('call_cust_id', cust_id);
        $('.maindash-table-div').css("overflow-y","hidden");
        $('.search-filter-div').remove();
        $.ajax({
            url: "view.php",
            type: 'POST',
            data: {
                'id': id,
                'cust_id':cust_id
            },
            success: function(data) {
                $(".maindash-table-div").html(data);
            }
        });
    }
</script>