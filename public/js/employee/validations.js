/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/js/validations/employee/register.js ***!
  \*******************************************************/
 // Class Definition

var register = function () {
  var registerValidation = function registerValidation() {
    var btn = $("#register_employee_submit");
    var form = $("#register_employee");
    form.validate({
      ignore: [],
      rules: {
        name: {
          required: true,
          englishOnly: true,
          minlength: 3,
          maxlength: 15
        },
        email: {
          required: true,
          email: true,
          remote: {
            url: "/api/taken/email",
            type: "post",
            dataType: 'json',
            data: {
              email: function email() {
                return $('#email').val();
              }
            }
          }
        },
        company_id: {
          required: true
        },
        password: {
          required: true,
          minlength: 8,
          digitcheck: true,
          lowercheck: true,
          uppercheck: true
        },
        password_confirmation: {
          required: true,
          equalTo: "#password"
        },
        profile_image: {
          required: true,
          extension: "jpeg|png|jpg",
          filesize: 7010289
        }
      },
      messages: {
        email: {
          remote: jQuery.validator.format("{0} is already taken.")
        },
        agree: {
          required: ''
        }
      },
      errorElement: 'div',
      errorClass: 'text-danger',
      highlight: function highlight(element) {
        $(element).addClass('is-invalid');
        $(element).removeClass('is-valid');
      },
      unhighlight: function unhighlight(element) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
      }
    });
    /* Start Password Check */

    $.validator.addMethod("digitcheck", function (value) {
      return /^[A-Za-z0-9\d=!\-@._*#$%^&~?+()]*$/.test(value) // consists of only these
      && /\d/.test(value); // has a digit
    }, function () {
      return "Your Password Should Includes digit 0-9.";
    });
    $.validator.addMethod("lowercheck", function (value) {
      return /^[A-Za-z0-9\d=!\-@._*#$%^&~?+()]*$/.test(value) // consists of only these
      && /[a-z]/.test(value); // has a lowercase letter
    }, function () {
      return "Your Password Should Includes Lowercase Letter a-z.";
    });
    $.validator.addMethod("uppercheck", function (value) {
      return /^[A-Za-z0-9\d=!\-@._*#$%^&~?+()]*$/.test(value) // consists of only these
      && /[A-Z]/.test(value); // has a uppercase letter
    }, function () {
      return "Your Password Should Includes Uppercase Letter A-Z.";
    });
    /* End Password Check */

    $.validator.addMethod("englishOnly", function (value, element) {
      return /^[a-zA-Z ]+$/i.test(value);
    }, function () {
      return "English Letters Only";
    });
    $.validator.addMethod('filesize', function (value, element, param) {
      return this.optional(element) || element.files[0].size <= param;
    }, function () {
      return "File size must be less than 7MB";
    });
    $("#register_employee input").on("change", function () {
      form.validate().element(this);
    });
    btn.click(function (e) {
      if (!form.valid()) {
        e.preventDefault();
      }
    });
  }; // Public Functions


  return {
    // public functions
    init: function init() {
      registerValidation();
    }
  };
}(); // Class Initialization


jQuery(document).ready(function () {
  register.init();
});
/******/ })()
;