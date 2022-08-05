"use strict";

// Class Definition
let datatables = function () {

    let getCompanies = function () {
        let editPath = $("#companies-edit").val();
        let deletePath = $("#companies-delete").val();

        $('#companies').DataTable({
            processing: true,
            deferRender: true,
            responsive: true,
            ajax: $("#companies-get").val(),
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'address', name: 'address'},

                {data: function (row){
                        return `<img src="${row.logo}" height="50" width="50" alt="profile-img">`;
                    },'searchable': false ,sortable: false},
                {
                    data: function (row) {
                        let m = $("meta[name=csrf-token]").attr("content");

                        return `
                            <a href="${editPath.replace("@replaceid@", row.id)}">
                                <button type="button" id="save_companies" class="btn btn-primary">Edit</button>
                            </a>
                            <form action="${deletePath.replace("@replaceid@", row.id)}" method="post">
                                <input type="hidden" name="_token" value="${m}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger m-1" > Delete</button>
                            </form>
                            `;
                    }, 'searchable': false, sortable: false
                },
            ],
            "order": [[ 0, 'desc' ]],
            "rowCallback": function( row, data, index ) {
                if (data['id'] === null) {
                    $(row).hide();
                }
            }

        });

    };

    let getEmployees = function () {
        let deletePath = $("#employees-delete").val();
        $('#employees').DataTable({
            processing: true,
            deferRender: true,
            responsive: true,
            ajax: $("#employees-get").val(),
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'company_name', name: 'company_name'},

                {data: function (row){
                        return `<img src="${row.profile_image}" height="50" width="50" alt="profile-img">`;
                    },'searchable': false ,sortable: false},
                {
                    data: function (row) {
                        let m = $("meta[name=csrf-token]").attr("content");

                        return `
                            <form action="${deletePath.replace("@replaceid@", row.id)}" method="post">
                                <input type="hidden" name="_token" value="${m}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger m-1" > Delete</button>
                            </form>
                            `;
                    }, 'searchable': false, sortable: false
                },
            ],
            "order": [[ 0, 'desc' ]],
            "rowCallback": function( row, data, index ) {
                if (data['id'] === null) {
                    $(row).hide();
                }
            }

        });

    };



    // Public Functions
    return {
        // public functions
        init: function () {
            getCompanies();
            getEmployees();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    datatables.init();
});
