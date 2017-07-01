"use strict";

/**
 * Verify if element exists and execute callback
 * @param callback
 * @returns {$}
 */
$.fn.exists = function(callback) {
    let args = [].slice.call(arguments, 1);

    if (this.length) {
        callback.call(this, args);
    }

    return this;
};

/* Noty Generate with MoJS
========================== */
let mojsShow = function () {
    let n = this;
    let Timeline = new mojs.Timeline();
    let body = new mojs.Html({
        el: n.barDom,
        x: {500: 0, delay: 0, duration: 500, easing: 'elastic.out'},
        isForce3d: true,
        onComplete: function () {
            n.resume();
        }
    });

    let parent = new mojs.Shape({
        parent: n.barDom,
        width: 200,
        height: n.barDom.getBoundingClientRect().height,
        radius: 0,
        x: {[150]: -150},
        duration: 1.2 * 500,
        isShowStart: true
    });

    n.barDom.style['overflow'] = 'visible';
    parent.el.style['overflow'] = 'hidden';

    let burst = new mojs.Burst({
        parent: parent.el,
        count: 10,
        top: n.barDom.getBoundingClientRect().height + 75,
        degree: 90,
        radius: 75,
        angle: {[-90]: 40},
        children: {
            fill: '#EBD761',
            delay: 'stagger(500, -50)',
            radius: 'rand(8, 25)',
            direction: -1,
            isSwirl: true
        }
    });

    const fadeBurst = new mojs.Burst({
        parent: parent.el,
        count: 2,
        degree: 0,
        angle: 75,
        radius: {0: 100},
        top: '90%',
        children: {
            fill: '#EBD761',
            pathScale: [.65, 1],
            radius: 'rand(12, 15)',
            direction: [-1, 1],
            delay: .8 * 500,
            isSwirl: true
        }
    });

    Timeline.add(body, burst, fadeBurst, parent);
    Timeline.play();
};

let mojsClose = function () {
    let n = this;
    new mojs.Html({
        el: n.barDom,
        x: {0: 500, delay: 10, duration: 500, easing: 'cubic.out'},
        skewY: {0: 10, delay: 10, duration: 500, easing: 'cubic.out'},
        isForce3d: true,
        onComplete: function () {
            n.barDom.parentNode.removeChild(n.barDom);
        }
    }).play();
};

function notyGenerate(type, text, timeout = 5000, icon) {
    new Noty({
        type: type,
        layout: 'topRight',
        theme: 'metroui',
        text: '<div class="activity-item"><i class="fa pull-left '+icon+' text-'+type+'"></i> <div class="activity bold">'+text+'</div>',
        timeout: timeout,
        animation: {
            open: mojsShow,
            close: mojsClose
        }
    }).show();
}

function preloaderShow() {
    $('#preloader').exists(function () {
        this.fadeIn(80);
    });
}

function preloaderHide() {
    $('#preloader').exists(function () {
        this.fadeOut('slow');
    });
}

function maskAndDatepickerInit() {
    $('.datepicker').exists(function () {
        this.datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior',
            autoclose: true
        });
    });

    $('.datetimepicker').exists(function () {
        this.datetimepicker({
            locale:'pt-BR',
            useCurrent: true
        }).on('dp.hide', function () {
            let form = $(this).closest('form');

            if (form.hasClass('trigger-post-on-change')) {
                setTimeout(function () {
                    $.post(form.prop('action'), form.serialize());
                }, 10);
            }
        });
    });

    $('.datetime').exists(function () {
        this.inputmask("99/99/9999 99:99");
    });

    $('.only-date').exists(function () {
        this.inputmask("99/99/9999");
    });

    $('.cellphone').exists(function () {
        this.inputmask("(99) 9999[9]-9999");
    });

    $('.phone').exists(function () {
        this.inputmask("(99) 9999-9999");
    });

    $('.cpf').exists(function () {
        this.inputmask("999.999.999-99");
    });

    $('.cnpj').exists(function () {
        this.inputmask("99.999.999/9999-99");
    });

    $('.zipcode').exists(function () {
        this.inputmask("99999-999");
    });

    $('.percent').exists(function () {
        this.inputmask("[9][9]9.[9][9] %");
    });

    $('.money').exists(function () {
        this.maskMoney({prefix: 'R$ ', thousands:'.', decimal:','});
    });

    $('.tagEditor').exists(function () {
        this.tagEditor({
            placeholder: 'Pressione tab para separar',
            onChange: function (field) {
                field.trigger('change');
            }
        });
    });
}

function triggerPostDataFormOnChangeField() {
    $('.trigger-post-on-change .form-control').on('change', function() {
        let form = $(this).closest('form');

        setTimeout(function () {
            $.post(form.prop('action'), form.serialize());
        }, 10);
    });
}

function triggerSubmitFormOnChangeField() {
    $('.submit-on-change .form-control').on('change', function() {
        let form = $(this).closest('form');

        setTimeout(function () {
            form.trigger('submit');
        }, 10);
    });
}

function setDocumentMask() {
    let inputDocument = $(".set-document");

    inputDocument.on('click', function() {
        $(this).inputmask('99999999999[9][9][9]');
    }).on('change', function() {
        let document = $(this).val().replace(/[^0-9.]/g, "");

        setTimeout(function() {
            let maskDocument = (document.length < 14 ? '999.999.999-99' : '99.999.999/9999-99');
            inputDocument.inputmask(maskDocument);
        }, 100);
    });
}

function validateField(route, field, message) {
    $(field + ' + span').removeClass('glyphicon-ok glyphicon-remove').addClass('glyphicon-refresh fa-spin');

    $.get(route, function (data) {
        $(field + ' + span').removeClass('glyphicon-refresh fa-spin');

        if (parseInt(data) === 200) {
            $(field + ' + span + div').html('');
            $(field).parents('.has-feedback').removeClass('has-error').addClass('has-success');
            $(field + ' + span').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        } else {
            $(field).parents('.has-feedback').removeClass('has-success').addClass('has-error');
            $(field + ' + span').removeClass('glyphicon-ok').addClass('glyphicon-remove');
            $(field + ' + span + div').html('<ul class="list-unstyled"><li>'+message+'</li></ul>');
        }
    });
}

function setFieldError(fields, message) {
    $.each(fields, function(index, field) {
        $(field).parents('.has-feedback').removeClass('has-success').addClass('has-error');
        $(field + ' + span').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        $(field + ' + span + div').html('<ul class="list-unstyled"><li>' + message + '</li></ul>');
    });
}

function setFieldSuccess(fields) {
    $.each(fields, function(index, field) {
        $(field + ' + span + div').html('');
        $(field).parents('.has-feedback').removeClass('has-error').addClass('has-success');
        $(field + ' + span').removeClass('glyphicon-remove').addClass('glyphicon-ok');
    });
}

function setFieldClear(fields) {
    $.each(fields, function(index, field) {
        $(field + ' + span + div').html('');
        $(field).parents('.has-feedback').removeClass('has-error has-success');
        $(field + ' + span').removeClass('glyphicon-remove glyphicon-ok');
    });
}

function modalFormValidSubmit() {
    $('.modal').on('shown.bs.modal', function () {
        let form = $(this).find('form');
        form.validator('destroy').validator();

        form.validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                notyGenerate('warning', 'Por favor, preencha todos os campos obrigatórios', 5000, 'ion-alert-circled');
            } else {
                e.preventDefault(e);
                let self = $(this);
                let data = self.serialize();
                let url = self.prop('action');

                $.post(url, data, function (response) {
                    if (response.responseText !== undefined) {
                        notyGenerate('success', response.responseText, 5000, 'ion-ios-information-outline');
                    }

                    if (self.hasClass('form-clear')) {
                        self.find("input:not('input[name=_token]'), select, textarea").val(null);
                        self.find("select").trigger('change');
                        self.find(".tagEditor").next('.tag-editor').find('.tag-editor-delete').click();
                    }

                    self.closest('.modal').on('hidden.bs.modal', function () {
                        preloaderShow();

                        setTimeout(function () {
                            location.reload(true);
                        }, 100);
                    });
                });
            }
        })
    });
}

function clearFormOnCloseModal() {
    $('.modal-clear').on('hidden.bs.modal', function () {
        $(this).find("input:not('input[name=_token]'), select, textarea").val(null);
        $(this).find("select").trigger('change');
        $(this).find('.tagEditor').next('.tag-editor').find('.tag-editor-delete').click();
    });
}

function checkIfUnusedEmail(ignoreId = null) {
    $('[data-checker-url]').not('[data-checker-url=""]').on('change', function() {
        let self = $(this);
        let email = self.val();

        if (email.length) {
            let route = self.data('checker-url') + "/" + email + "/" + ignoreId;
            validateField(route, '#email', 'Email inválido ou já está em uso.');
        }
    });
}
/* ========================== */

$(function() {
    preloaderHide();

    $(document).ajaxStart(function() {
        Pace.restart();
    });

    maskAndDatepickerInit();

    $('select').exists(function () {
        this.select2();
    });

    $('.iCheck').each(function () {
        var self = $(this),
            label = self.next(),
            label_text = label.text();

        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    }).on('ifChanged', function () {
        $(this).trigger('change');
    });

    $(".delete-confirmation").exists(function () {
        this.on('click', function (e) {
            e.preventDefault();

            let link = $(this);

            swal({
                title: "Tem certeza?",
                text: "Você não poderá recuperar este item!!",
                cancelButtonText: "Cancelar",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, apagar!",
                closeOnConfirm: false,
                html: false
            }, function(confirmed){
                if(confirmed) {
                    swal("Apagado!", "O item foi apagado.", "success");
                    setTimeout(function () {
                        window.location = link.attr('href');
                    }, 1000);
                }
            });
        })
    });

    $('.a-get-modal').on('click', function (){
        let href = $(this).attr('href');

        setTimeout(function (){
            $.get(href, function( data ) {
                $('<div class="modal fade" tabindex="-1" role="dialog"></div>').appendTo('body').html(data).modal('show');
            });
        }, 200);

        return false;
    });

    $('#nature').on('change', function() {
        let nature = $(this).val();

        $('#nature-change').find('input').each(function () {
            $(this).prop('disabled', function (index, value) {
                (!value) ? $(this).closest('.col').addClass('hide') : $(this).closest('.col').removeClass('hide');
                return !value;
            });
        });
    });
});