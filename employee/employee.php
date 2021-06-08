<style>

.blurdiv{
    filter: blur(1.5px);    
}
.no-blur{
    filter: blur(0px);
}
.item-master-div{
  display: relative;
}
.item-master-result{
  position: absolute;
  height:20px;
  padding:10px;
  top: 25%;
  left: 23%;
  z-index: 10;
}
#absolute-div-item-list {
  position: absolute;
  padding: 2px;
  top: 228px;
  left: 30px;
}
.employee-heading{
    animation-name: rotate-animation;
    animation-duration: 1s;
    padding-top:10px;
    padding-bottom:10px;
}
@keyframes rotate-animation{
    from{transform: scale(0); opacity:0;}
    to{transform: scale(1);opacity:1;}
}

</style>
<?php

include './../config.php';

?>

<div class="container">
    <h2 class="employee-heading text-center no-blur"><strong>Employee's Portal</strong></h2>
    <div class="row">
        <div class="col-6 item-master-div">
            <div id="result" class='item-master-result'></div>
            <form class="form" action="employee/uploadEmployee.php" method="post" id="uploadEmployee">
                <div class="form-group">
                <input class="form-control" name="employee_name" id="employee_name" type="text" placeholder="Enter Name" />
                </div>
                <div class="form-group">
                <input class="form-control" name="employee_number" maxlength="10" type="text" placeholder="Enter Phone" />
                </div>
                <div class="form-group">
                    <select class="form-control" name="employee_role" id="employee-role">
                        <option selected disabled>Select Employee Role</option>
                        <option value="intern">Intern</option>
                        <option value="engineer">Engineer</option>
                        <option value="marketing head">Marketing Head</option>
                        <option value="business developer">Business Developer</option>
                    </select>
                </div>
                
                <button class="btn btn-success" id="add-employee-btn" type="button">Add Employee</button>
            </form>
        </div>
        <div class="item-preview-div col-6">

        </div>
        <div id="absolute-div-item-list">
            <div id="show-list-item-list">
                <!-- Dynamic list  -->
                
            </div>
        </div>
    </div>
</div>


<script>
        $("#add-employee-btn").click(function() {
            var data = $("#uploadEmployee :input").serializeArray();
            console.log(data);
            $.post($("#uploadEmployee").attr("action"), data, function(info) {
                $("#result").html(info);
                $('#uploadEmployee').trigger("reset");
                $('.alert-warning').delay('1000').fadeOut('2000');
                $('.alert').delay('1000').fadeOut('2000');
                $('.warning-msg').delay('1000').fadeOut('2000');
                $("#uploadEmployee").addClass("blurdiv");
                setTimeout(()=>{
                    $("#uploadEmployee").removeClass("blurdiv");
                },1500)
            });
        })

        // $('#item_name').keyup(function() {
        //     var itemName = $(this).val();
        //     if (itemName != '') {
        //         $.ajax({
        //             url: 'item-live-search.php',
        //             method: 'post',
        //             data: {
        //                 query: itemName
        //             },
        //             success: function(response) {
        //                 $("#show-list-item-list").html(response);
        //             }
        //         })
        //     } else {
        //         $("#show-list-item-list").html('No Record! ');
        //     }
        // })
        

        $("#uploadEmployee").submit(function() {
            return false;
        })
</script>