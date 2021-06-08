<html>

<head>
    <link rel="stylesheet" href="entry.css" />
</head>

<div class="insert-div text-white">
    <div class="row">
        <div class="left-div col-6">
            <span class="text-center" id="lead-result"></span>
            <div class="lead-entry-div curve-box">
                <div class="text-center alert text-dark mt-2">
                        <div class="blank-div"><b>Lead Entry</b></div>
                </div>    
                <form action="leadEntry.php" method="post" id="uploadLeadDataForm" class="mx-4 ">
                    <div class="form-group d-flex text-dark align-items-center">
                        <input type="text" autocomplete="off" name="search customer-name" id="search" class="form-control border-info col-10 " placeholder="Customer Name" />
                        <button class="plus-sign col-2 add-btn btn btn-transparent " class="btn form-control" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="form-group">
                        <input type="text" class="text-input form-control " name="source" placeholder="Lead Source" />
                    </div>
                    <div class="d-flex text-dark ">
                        <div class="w-25 pt-2">Followup Date &nbsp;&nbsp;&nbsp;&nbsp;</div><input type="date" class="date-input form-control w-75 " name="followup-date" placeholder="Followup date" />
                    </div>
                    <div class="form-group d-flex">
                        <select class="form-control" name="assign_to">
                            <option disabled selected>Assign Lead to</option>
                            <?php include 'assignto.php'  ?>
                        </select>
                    
                        <select class="form-control" name="priority">
                            <option disabled selected>Select Priority</option>
                            <option value="low">Low</option>
                            <option value="normal">Normal</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="type">
                            <option disabled selected>Select Lead Type</option>
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
                    <div class="form-group">
                        <textarea class="form-control" rows="2" id="problem-description" value="" name="requirement" placeholder="Requirements"></textarea>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="button" onclick="" class="lead-data-submit-btn btn btn-success px-4 my-2 mb-3 ">Submit</button>
                    </div>
                </form>
            </div>
            <div id="absolute-div">
                <div id="show-list">
                    <!-- Dynamic list  -->
                </div>
            </div>
            
            <div id="customer-form-updated">
                <!-- Modal Customer Form-->
                <?php include('./customer/customerModalForm.php')    ?>
            </div>
        </div>
        <div class="right-div col-6">
            <!-- this is right div -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // leadata submit form

        $(".lead-data-submit-btn").click(function() {
            var data = $("#uploadLeadDataForm :input").serializeArray();
            console.log(data);
            $.post($("#uploadLeadDataForm").attr("action"), data, function(info) {
                $("#lead-result").html(info);
                $('#uploadLeadDataForm').trigger("reset");
                $('.alert-success').delay('1000').fadeOut('2000');
                $('.warning-msg').delay('1000').fadeOut('2000');
                $('.alert-warning').delay('1000').fadeOut('2000');
                $('.warning-msg').delay('1000').fadeOut('2000');
                $(".lead-entry-div").addClass("blurdiv");
                setTimeout(()=>{
                    $(".lead-entry-div").removeClass("blurdiv");
                },1500)
            });
            
        })

        $("#uploadLeadDataForm").submit(function() {
            return false;
        })

        // submit logic for modal customer form 

        $("#cutomer_form_submit").click(function() {
            var data = $("#uploadCustomerForm :input").serializeArray();
            console.log(data);
            $.post($("#uploadCustomerForm").attr("action"), data, function(info) {
                $("#result").html(info);
                $('#uploadCustomerForm').trigger("reset");
                $('.alert-warning').delay('1000').fadeOut('2000');
                $('.warning-msg').delay('1000').fadeOut('2000');
            });
        })

        $("#uploadCustomerForm").submit(function() {
            return false;
        })

        // search logic by name

        $('#search').keyup(function() {
            var searchText = $(this).val();
            if (searchText != '') {
                $.ajax({
                    url: 'action-live-search.php',
                    method: 'post',
                    data: {
                        query: searchText
                    },
                    success: function(response) {
                        $("#show-list").html(response);
                    }
                })
            } else {
                $("#show-list").html('No Record! ');
            }
        })

        $(document).on('click', 'a', function() {
            $("#search").val($(this).text());
            $("#show-list").html('');
        })

        $('.alert-success').delay('1000').fadeOut('2000');
        $('.alert-danger').delay('1000').fadeOut('2000');
        $('.alert-warning').delay('1000').fadeOut('2000');
        $('.warning-msg').delay('1000').fadeOut('2000');
    })
</script>

<script src="validate.js"> </script>

</html>