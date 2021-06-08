<div class="preview-div text-white">
<div class="result-status-absolute text-center alert ml-4"><span class="text-center ml-4 text-dark" id="result-status"></span></div>
    <span class="edit-icon-click"><span class="badge px-2 mx-3 bg-success edit-icon">edit&nbsp;</span></span>
    <form action='updateCustomer.php' class="mt-2 mb-4 p-4" method='post'  id='updateCustomerForm' name='customerRegistration'>
        <div class='my-2'>
            <input type='hidden' required class='form-control' autocomplete='off' id='id' name='id' value="<?php echo $row['cust_id']; ?>" >
        </div>
        <div class='my-2'>
            <input type='text' placeholder="Name" required class='form-control' autocomplete='off' id='fullName' name='fullName' value="<?php echo $row['customer_name'];  ?>" >
        </div>
        <div class='my-2'>
            <input type='text' placeholder="Number" required class='form-control' id='contact' maxlength='10' name='contact' value="<?php echo $row['customer_number'];  ?>" maxlength='10' />
        </div>
        <div class='my-2'>
            <input type='text' placeholder="Alternative Number"  class='form-control' id='contact' maxlength='10' name='alternative_contact' value="<?php echo $row['customer_alternative_number'];  ?>" maxlength='10' />
        </div>
        <div class='my-2'>
            <input type='email' placeholder="Email" required class='form-control' id='email' name='email' value="<?php echo $row['customer_email'];  ?>" />
        </div>
        <div class='my-2'>
            <textarea type='text' placeholder="Address" required class='form-control' rows='2' id='address'  name='address'><?php echo $row['cutomer_address'];  ?></textarea>
        </div>
        <div class='my-2'>
            <input type='text' placeholder="Company Name" required class='form-control' id='company' name='company' value="<?php echo $row['company_name'];  ?>" />
        </div>
        <div class='my-2'>
            <input type='text' placeholder="GST No" required class='form-control' id='gst' name='gst' value="<?php echo $row['gstno'];  ?>" />
        </div>

        <div class="d-flex justify-content-center">
            <button id="cutomer_form_update" class="btn btn-success mt-2 mx-3 " >Update</button>
        </div>
    </form>
</div>

<script>
    $('.alert-success').delay('1000').fadeOut('2000');
</script>