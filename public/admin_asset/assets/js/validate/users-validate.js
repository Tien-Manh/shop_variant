/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';

    var bootstrapForm = $('.needs-validation'),
        jqForm = $('#jquery-val-form'),
        picker = $('#dob'),
        select = $('.select2');

    // select2
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this
            .select2({
                placeholder: 'Select value',
                dropdownParent: $this.parent()
            })
            .change(function () {
                $(this).valid();
            });
    });

    // Picker
    if (picker.length) {
        picker.flatpickr({
            onReady: function (selectedDates, dateStr, instance) {
                if (instance.isMobile) {
                    $(instance.mobileInput).attr('step', null);
                }
            }
        });
    }
    // jQuery Validation
    // --------------------------------------------------------------------
    if (jqForm.length) {
        jqForm.validate({
            rules: {
                'username': {
                    required: true
                },
                'fullname': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true
                },
                'confirm-password': {
                    required: true,
                    equalTo: '#basic-default-password'
                },
                'select-country': {
                    required: true
                },
                dob: {
                    required: true
                },
                customFile: {
                    required: true
                },
                validationRadiojq: {
                    required: true
                },
                validationBiojq: {
                    required: true
                },
                validationCheck: {
                    required: true
                }
            }
        });
    }
});

