<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<div class="apply_job_form white-bg">
    <h4>Подать заявку на вакансию</h4>
    <form id="formApply" action="#" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="input_field">
                    <div class="error-message" data-for="name"></div>
                    <input type="text" name="name" placeholder="Ваше имя">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input_field">
                    <div class="error-message" data-for="email"></div>
                    <input type="text" name="email" placeholder="Электронная почта">
                </div>
            </div>
            <div class="col-md-12">
                <div class="error-message" data-for="file"></div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" id="inputGroupFileAddon03">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="custom-file">
                        <input
                                type="file"
                                name="file"
                                class="custom-file-input"
                                id="inputGroupFile03"
                                aria-describedby="inputGroupFileAddon03"
                        >
                        <label class="custom-file-label" for="inputGroupFile03">
                            Загрузить резюме
                        </label>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="input_field">
                    <div class="error-message" data-for="cover_letter"></div>
                    <textarea
                            name="cover_letter"
                            id="cover_letter"
                            cols="30"
                            rows="10"
                            placeholder="Сопроводительное письмо"
                    ></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="submit_btn">
                    <input class="boxed-btn3 w-100" type="submit" value="Отправить заявку">
                </div>
            </div>
        </div>
    </form>
</div>

<div id="jobApplyModal">
    <div class="modal-content">
        <div class="apply_job_success">
            <h4>Спасибо!</h4>
            <p>Ваша заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.</p>
            <button
                    type="button"
                    class="boxed-btn3"
                    id="closeSuccessBtn"
                    style="margin-top:20px;"
            >
                Закрыть
            </button>
        </div>
    </div>
</div>