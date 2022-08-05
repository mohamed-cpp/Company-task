/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/js/datatables/admin/dashboard.js ***!
  \****************************************************/
 // Class Definition

var datatables = function () {
  var getCompanies = function getCompanies() {
    var editPath = $("#companies-edit").val();
    var deletePath = $("#companies-delete").val();
    $('#companies').DataTable({
      processing: true,
      deferRender: true,
      responsive: true,
      ajax: $("#companies-get").val(),
      columns: [{
        data: 'id',
        name: 'id'
      }, {
        data: 'name',
        name: 'name'
      }, {
        data: 'address',
        name: 'address'
      }, {
        data: function data(row) {
          return "<img src=\"".concat(row.logo, "\" height=\"50\" width=\"50\" alt=\"profile-img\">");
        },
        'searchable': false,
        sortable: false
      }, {
        data: function data(row) {
          var m = $("meta[name=csrf-token]").attr("content");
          return "\n                            <a href=\"".concat(editPath.replace("@replaceid@", row.id), "\">\n                                <button type=\"button\" id=\"save_companies\" class=\"btn btn-primary\">Edit</button>\n                            </a>\n                            <form action=\"").concat(deletePath.replace("@replaceid@", row.id), "\" method=\"post\">\n                                <input type=\"hidden\" name=\"_token\" value=\"").concat(m, "\">\n                                <input type=\"hidden\" name=\"_method\" value=\"DELETE\">\n                                <button type=\"submit\" class=\"btn btn-danger m-1\" > Delete</button>\n                            </form>\n                            ");
        },
        'searchable': false,
        sortable: false
      }],
      "order": [[0, 'desc']],
      "rowCallback": function rowCallback(row, data, index) {
        if (data['id'] === null) {
          $(row).hide();
        }
      }
    });
  };

  var getEmployees = function getEmployees() {
    var deletePath = $("#employees-delete").val();
    $('#employees').DataTable({
      processing: true,
      deferRender: true,
      responsive: true,
      ajax: $("#employees-get").val(),
      columns: [{
        data: 'id',
        name: 'id'
      }, {
        data: 'name',
        name: 'name'
      }, {
        data: 'company_name',
        name: 'company_name'
      }, {
        data: function data(row) {
          return "<img src=\"".concat(row.profile_image, "\" height=\"50\" width=\"50\" alt=\"profile-img\">");
        },
        'searchable': false,
        sortable: false
      }, {
        data: function data(row) {
          var m = $("meta[name=csrf-token]").attr("content");
          return "\n                            <form action=\"".concat(deletePath.replace("@replaceid@", row.id), "\" method=\"post\">\n                                <input type=\"hidden\" name=\"_token\" value=\"").concat(m, "\">\n                                <input type=\"hidden\" name=\"_method\" value=\"DELETE\">\n                                <button type=\"submit\" class=\"btn btn-danger m-1\" > Delete</button>\n                            </form>\n                            ");
        },
        'searchable': false,
        sortable: false
      }],
      "order": [[0, 'desc']],
      "rowCallback": function rowCallback(row, data, index) {
        if (data['id'] === null) {
          $(row).hide();
        }
      }
    });
  }; // Public Functions


  return {
    // public functions
    init: function init() {
      getCompanies();
      getEmployees();
    }
  };
}(); // Class Initialization


jQuery(document).ready(function () {
  datatables.init();
});
/******/ })()
;