<head>
    <style>
        .time-display:hover {
            cursor: pointer;
        }
    </style>
</head>
<?php
include 'config.php';

if(isset($_POST['id'])){
$t_id = $_POST['id'];
$result = $con->query("SELECT * FROM `call_log` WHERE cust_id = '$t_id' ");
echo "<div><b>Call Log: </b></div>";
if($result->num_rows > 0){
    

    while ($row = $result->fetch_assoc()){
        echo "<a  onclick='return idfromcalllog(".$row['id'].")' data-toggle='modal' class='time-display' data-target='#callMsgModalCenter'><u>" . $row['call_time'] . "</u></a><br/>";
        
?>
        <!-- Modal -->
        <div class="modal fade" id="callMsgModalCenter" tabindex="-1" role="dialog" aria-labelledby="callMsgModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="callMsgModalCenterTitle">Call Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body call-log-msg-body">
                        
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}
}

?>

<script>
    function idfromcalllog(id){
        $.ajax({
            url: "callLogMessage.php",
            type: 'POST',
            data: {
                'id': id,
            },
            success: function(data) {
                $(".call-log-msg-body").html(data);
            }
        });
    }
</script>