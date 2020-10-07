<div class="contact-popup-form" id="contact-modal-lg">
    <div class="modal fade contact-modal-lg" tabindex="-1" role="dialog" aria-labelledby="contact-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-heading-text text-center mb-30">
                                <span></span>
                                <h2>Please get in touch</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <div class="container-fluid">
                        <form id="popupMail">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div id="popupMail_Msg" class="col-12 text-center alert alert-success" style="display:none">
                                    <strong>Success!</strong> successfully notified to our team.
                                </div>
                                <div class="col-12 text-center">
                                    <button id="btnContactPopup" type="submit" class="btn studio-btn mt-3">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>