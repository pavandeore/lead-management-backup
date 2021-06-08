<div class="preview-item-div text-white">
<div class="result-status-absolute text-center alert ml-4"><span class="text-center ml-4 text-dark" id="result-item-status"></span></div>
    <span class="edit-icon-click"><span class="badge px-2 mx-3 bg-success edit-icon">edit&nbsp;</span></span>
    <form action='updateItem.php' class="mt-2 mb-4 p-4" method='post'  id='updateItemForm' name='ItemRegistration'>
        <!-- <div class='my-2'>
            <input type='hidden' required class='form-control' autocomplete='off' id='id' name='id' value="<?php echo $row['cust_id']; ?>" >
        </div> -->
        <div class='my-2'>
            <input type='text' placeholder="Item Name" required class='form-control' autocomplete='off' id='fullName' name='fullName' value="<?php echo $row['item_name'];  ?>" >
        </div>
        <div class='my-2'>
            <input type='text' placeholder="Number" required class='form-control' id='contact' maxlength='10' name='contact' value="<?php echo $row['item_desc'];  ?>" maxlength='10' />
        </div>
        <div class="d-flex justify-content-center">
            <button id="cutomer_form_update" class="btn btn-success mt-2 mx-3 " >Update</button>
        </div>
    </form>
</div>

<script>
    $('.alert-success').delay('1000').fadeOut('2000');
</script>