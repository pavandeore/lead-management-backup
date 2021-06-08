<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLongTitle">Customer Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body customer-form">
                <div class="text-center alert"><span class="text-center" id="result">Status</span></div>
                <form action="customer/customerEntry.php" method="post"  id="uploadCustomerForm">
                    <div class="form-group">
                        <input type="text" class="form-control" autocomplete="off" id="fullName" name="fullName" placeholder=" Enter Name">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number" maxlength="10" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="contact" name="alternative_contact" placeholder="Enter Alternative Contact Number" maxlength="10" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" />
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" rows="2" id="Address"  name="address" placeholder="Enter Address" ></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Company" name="company" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GST no" />
                    </div>

                    <div class="d-flex justify-content-center">
                        <button id="cutomer_form_submit" class="btn btn-success mx-3" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $('.alert-success').delay('1000').fadeOut('2000');
    $('.alert-danger').delay('1000').fadeOut('2000');
</script>