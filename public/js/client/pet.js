$(document).ready(function () {
    getAllPetFunction();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// FETCH UPCOMING OPERATION FOR TABLES
function getAllPetFunction() {
    var table = $("#petDetails").DataTable({
        language: {
            emptyTable: "No Clients Found.",
        },
        lengthChange: true,
        scrollCollapse: true,
        paging: true,
        info: true,
        responsive: true,
        ordering: false,
        aLengthMenu: [
            [25, 50, 75, -1],
            [25, 50, 75, "All"],
        ],
        iDisplayLength: 25,
        ajax: {
            url: "/getAllPetFunction",
            dataSrc: "",
            targets: "0",
        },
        columns: [
            { data: "pet_id" },
            { data: "pet_name" },
            { data: "pet_breed" },
            {
                data: { species: "species" },
                mRender: function (data, type, full) {
                    if (data.species == "") {
                        return "N/A";
                    } else {
                        return data.species;
                    }
                },
            },
            { data: "pet_cm" },
            { data: "gender" },
            {
                data: "birthdate",
                render: function (data) {
                    return moment(data).format("MMM DD, YYYY");
                },
                targets: 1,
            },
            {
                mData: function (data, type, row) {
                    return data.user_fname + " " + data.user_lname;
                },
            },
            {
                data: "pet_id",
                mRender: function (data, type, row) {
                    return (
                        '<button type="button" data-title="View More Details?" onclick=viewPet(' +
                        data +
                        ') class="btn rounded-0 btn-outline-success btn-sm py-2 px-3"><i class="bi bi-eye"></i></button>'
                    );
                },
            },
        ],
        order: [[1, "asc"]],
    });
    table
        .on("order.dt search.dt", function () {
            let i = 1;
            table
                .cells(null, 0, { search: "applied", order: "applied" })
                .every(function (cell) {
                    this.data(i++);
                });
        })
        .draw();
}
// FETCH UPCOMING OPERATION FOR TABLES

// VIEW PET DETAILS
function viewPet(id) {
    $("#viewPetDetails").modal("show");
    $.ajax({
        url: "/viewPet",
        type: "GET",
        dataType: "json",
        data: { petId: id },
    }).done(function (response) {
        $("#pet_name").val(response.pet_name);
        $("#pet_cm").val(response.pet_cm);
        $("#pet_breed").val(response.pet_breed);
        $("#address").val(response.address);
        $("#gender").val(response.gender);
        $("#species").val(response.species);
        $("#breed").val(response.pet_breed);
        var formattedDate = moment(response.birthdate).format("MMMM DD, YYYY");
        $("#birthdate").val(formattedDate);
        $("#gender").val(response.gender);
        $("#ownerName").val(response.user_fname + " " + response.user_lname);
        medicalHistory();
        function medicalHistory() {
            $.ajax({
                url: "/petMedicalHistory",
                method: "GET",
                data: { petId2: response.pet_id },
                success: function (data) {
                    $("#medicalHistory").html(data);
                },
            });
        }
    });
}
// VIEW PET DETAILS
