$(document).ready(function() {

    initAjaxForm();

});

window.initButtonClickHandler = function() {

    $('.ajax-form button[type="submit"]').on('click', function() {
        $('.ajax-form button[type="submit"]').removeAttr('clicked');
        $(this).attr('clicked', 'true');
    });

}

window.initAjaxForm = function() {

    $.each($('.ajax-form'), function (idx, ajaxForm) {

        var formIdentifier = $(ajaxForm).attr('data-identifier');
        var presetName = $(ajaxForm).attr('data-preset-name');
        var dimension = $(ajaxForm).attr('data-dimension');

        var formAjaxUrl = location.protocol + '//' + location.host + '/form/'  + ( dimension != '' ? dimension + '/' : '' ) + presetName + '/' + formIdentifier;

        $(ajaxForm).off('submit').on('submit', 'form', function (e) {

            var formObj = $(this);
            var formURL = formObj.attr('action');
            var formData = new FormData(this);

            var trigger = $(this).find('button[clicked="true"]');

            formData.append($(trigger).attr('name'), $(trigger).attr('value'));

            $.ajax({

                url: formURL,
                type: 'POST',
                data: formData,
                mimeType: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

                    $(ajaxForm).find('.ajax-content').replaceWith('<i class=" ajax-content fa fa-spinner fa-pulse"></i>');

                },
                success: function (data) {

                    $(ajaxForm).find('.ajax-content').replaceWith(data);

                    initButtonClickHandler();

                    if ($(ajaxForm).find('.g-recaptcha').length) {
                      var captcha = $(ajaxForm).find('.g-recaptcha');
                      var sitekey = captcha.data('sitekey');
                      grecaptcha.render(captcha[0], {"sitekey": sitekey});
                    }

                }

            });

            e.preventDefault();

        });

        $(ajaxForm).load(formAjaxUrl + ' .ajax-content', function () {

            initButtonClickHandler();

            $(this).css("min-height", $(this).css("height"));

            if ($(this).find('.g-recaptcha').length) {
              var captcha = $(this).find('.g-recaptcha');
              var sitekey = captcha.data('sitekey');
              grecaptcha.render(captcha[0], {"sitekey": sitekey});
            }

        });

    });

}
