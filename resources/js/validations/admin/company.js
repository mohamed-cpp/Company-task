"use strict";

// Class Definition
let forms = function () {

    let company = function () {

        let btn = $("#save_companies");
        let form = $("#form_save_companies");

        form.validate({
            ignore: [],
            rules: {
                name: {
                    required: true,
                    englishOnly: true,
                    minlength: 3,
                    maxlength: 100
                },
                address: {
                    required: true,
                    englishOnly: true,
                    minlength: 3,
                    maxlength: 100
                },

                logo: {
                    required: !(!!$("#is-logo").val()),
                    extension: "jpeg|png|jpg",
                    filesize: 7010289,
                },

            },
            messages: {

            },
            errorElement : 'div',
            errorClass: 'text-danger',
            highlight: function(element) {
                $(element).addClass('is-invalid');
                $(element).removeClass('is-valid');

            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
        });



        $.validator.addMethod("englishOnly", function(value, element) {
            return /^[a-zA-Z ]+$/i.test(value);
        }, function(){
            return "English Letters Only";
        });
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, function(){
            return "File size must be less than 7MB";
        });



        $("#form_save_companies input").on("change", function () {
            form.validate().element(this);
        });



        btn.click(function (e) {
            if (!form.valid()) {
                e.preventDefault();
            }

        });


    };

    // Public Functions
    return {
        // public functions
        init: function () {
            company();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    forms.init();

});
