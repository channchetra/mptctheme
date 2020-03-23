<div id="servay" class="servay container p-0" data='{"type":"post", "id":168, "auth": "c4ca4238a0b923820dcc509a6f75849b"}'>
    <div id="servay-useful" class="useful">
        <ul >
            <li>
                Is this page useful?
            </li>
            <li>
                <a onclick="servay.useful(1)" href="javascript:void(0);">Yes</a>
            </li>
            <li>
                <a onclick="servay.useful(0)" href="javascript:void(0);">No</a>
            </li>  
        </ul>
    </div>

    <div id="servay-submit" class="submit p-3">
        <form>
            <label for="servay-feedback">Tell us what we can do to improve the article</label>
            <textarea class="form-control mb-3 rounded-0" id="servay-feedback" placeholder=""></textarea>
            <button onclick="servay.submit(this.previousElementSibling.value)" type="button" class="btn btn-light rounded-0">Submit</button>
        </form>
    </div>

    <div id="servay-thank" class="thank">
        <div class="alert fade show m-0" role="alert">
            <strong>Thanks!</strong> Your feedback will help us improve the support experience.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<div class="feedback d-none d-sm-block">
    <div class="dialog-action">
        <button class="btn btn-sm btn-primary rounded-0" data-toggle="modal" data-target="#feedback-modal-center">Site Feedback</button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="feedback-modal-center" tabindex="-1" role="dialog" aria-labelledby="feedback-modal-center-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="./assets/images/fav-32.png" class="mr-2" alt="">
                    <h5 class="modal-title" id="feedback-modal-center-title">ក្រសួងប្រៃសណីយ៍
                        និងទូរគមនាគមន៍</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body feedback-body">
                    <form id="feedback-form" action="" method="GET">
                        <div class="">
                            <article id="article-1" class="active">
                                <h5>How satisfied are you with the Cambodia Support website?</h5>
                                <input type="range" step="1" value="0" name="star-rating" id="star-rating" />
                                <div class="star text-center" data-reference="star-rating" data-star="5" data-font="&#9733;"></div>
                                <div class="d-flex justify-content-around mb-4" for="feedback-range"><small>Very Dissatisfied</small><small>Very Satisfied</small></div>
                                <div class="text-center mb-3">
                                    <a onClick="feedback.tabCheckStar(this)" href="javascript:void(0)" data-current="article-1" data-next="article-2" class="btn btn-primary px-3">OK</a>
                                    <div class="invalid-feedback">Please provide a valid star.</div>
                                </div>
                                <small>Step 1 of 3</small>
                            </article>
                            <article id="article-2" class="hide">
                                <h5>Is there anything we can do to improve? Let us know!</h5>
                                <textarea name="textarea" class="form-control mb-4" id="exampleFormControlTextarea1" rows="3" maxlength="1000" placeholder="Type your feedback here (1000 chars max)"></textarea>
                                <div class="text-center mb-3">
                                    <a onClick="feedback.tabUncheck(this)" href="javascript:void(0)" data-current="article-2" data-next="article-3" class="btn btn-primary px-3">OK</a>
                                </div>
                                <small>Step 2 of 3</small>
                            </article>
                            <article id="article-3" class="hide">
                                <h5>Did you find the information you were looking for?</h5>
                                <div class="d-flex justify-content-around mb-4 w-50 mx-auto">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="information_radio_stacked-1" name="information_radio_stacked">
                                        <label class="custom-control-label" for="information_radio_stacked-1">YES</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="information_radio_stacked-2" name="information_radio_stacked">
                                        <label class="custom-control-label" for="information_radio_stacked-2">NO</label>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <button onClick="feedback.submit(this)" href="javascript:void(0)" data-validation='{"type":"require","input_name":"information_radio_stacked"}' data-current="article-3" data-next="article-4" type="button" class="btn btn-primary px-3">SUBMIT</button>
                                    <div class="invalid-feedback">Please provide a valid information.</div>
                                </div>
                                <small>Step 3 of 3</small>
                            </article>
                            <article id="article-4" class="hide">
                                <span class="text-center d-block mb-3">
                                    Thanks for taking this survey. Your participation is helpful to us and we take your feedback seriously.
                                </span>
                                <div class="text-center mb-3">
                                    <button data-dismiss="modal" type="button" class="btn btn-secondary px-3">close</button>
                                </div>
                            </article>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>