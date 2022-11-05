   <!-- Deposit Modal -->
   <div class="modal fade" id="walletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Amount to deposit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--/col-3-->
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <!-- Form Starts -->
                                <form method="post" action="">
                                    <input type="hidden" name="_token" value=""> <!-- Input Field Starts -->
                                    <div class="form-group">
                                        <label for="serialNumber">Amount in USD</label>
                                        <input id="serialNumber" type="number" class="form-control " name="serialNumber" value="" required autocomplete="amount" autofocus>
                                    </div>
                                    <!-- Input Field Ends -->



                                    <!-- Submit Form Button Starts -->
                                    <div class="form-group">
                                        <input class="btn btn-primary" name="_s_up" type="submit" value="Deposit" style="width: 100%;">
                                    </div>
                                    <!-- Submit Form Button Ends -->
                                </form>
                                <!-- Form Ends -->
                            </div>
                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->
                </div>
                <form id="logout-form" action="../logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">
                </form>
            </div>
        </div>
    </div>
    <!-- Deposit Modal -->