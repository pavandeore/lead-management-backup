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
.item-heading{
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

include 'config.php';


?>

<div class="container">
    <h2 class="text-center item-heading no-blur"><strong>Item Master</strong></h2>
    <div class="row">
        <div class="col-6 item-master-div">
            <div id="result" class='item-master-result'></div>
            <form class="form" action="uploadItem.php" method="post" id="uploadItemMaster">
                <div class="form-group">
                <input class="form-control" name="item_name" id="item_name" type="text" placeholder="Item Name" />
                </div>
                <div class="form-group">
                <input class="form-control" name="item_desc" type="text" placeholder="Item Description" />
                </div>
                <div class="form-group">
                <input class="form-control" name="item_rate" type="number" placeholder="Item Rate" />
                </div>
                <div class="form-group">
                <input class="form-control" name="item_gst" type="text" placeholder="Item GST %" />
                </div>
                <button class="btn btn-success" id="add-item-btn" type="button">Add Item</button>
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
        $("#add-item-btn").click(function() {
            var data = $("#uploadItemMaster :input").serializeArray();
            console.log(data);
            $.post($("#uploadItemMaster").attr("action"), data, function(info) {
                $("#result").html(info);
                $('#uploadItemMaster').trigger("reset");
                $('.alert-warning').delay('1000').fadeOut('2000');
                $('.alert').delay('1000').fadeOut('2000');
                $('.warning-msg').delay('1000').fadeOut('2000');
                $("#uploadItemMaster").addClass("blurdiv");
                setTimeout(()=>{
                    $("#uploadItemMaster").removeClass("blurdiv");
                },1500)
            });
        })

        $('#item_name').keyup(function() {
            var itemName = $(this).val();
            if (itemName != '') {
                $.ajax({
                    url: 'item-live-search.php',
                    method: 'post',
                    data: {
                        query: itemName
                    },
                    success: function(response) {
                        $("#show-list-item-list").html(response);
                    }
                })
            } else {
                $("#show-list-item-list").html('No Record! ');
            }
        })
        

        $("#uploadItemMaster").submit(function() {
            return false;
        })
</script>