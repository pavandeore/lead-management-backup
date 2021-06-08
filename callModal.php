<div class="modal fade" id="callModalCenter" tabindex="-1" role="dialog" aria-labelledby="callModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="callModalCenterTitle">Call Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center" id="uploadCallResult"></div>
                            <form action="uploadCall.php" method="post" id="uploadCall">
                                <input type="hidden" name="call_cust_id" value="<?php echo $cust_id; ?>" />
                                <div class="form-group">
                                    <p>You are Speaking with: &nbsp;<?php echo $customer_name;  ?></p>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" rows="3" id="message" name="call_message" placeholder="Enter Message"></textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button id="upload_call_submit" class="btn btn-success mx-3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>