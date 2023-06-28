$(document).ready(function () {
    allThisWeekAppointmentFunction();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// FETCH UPCOMING OPERATION FOR TABLES
function allThisWeekAppointmentFunction() {
    var table = $("#allThisWeekAppointmentFunction").DataTable({
        language: {
            emptyTable: "No Appointment Found.",
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
            url: "/allThisWeekAppointmentFunction",
            dataSrc: "",
            targets: "0",
        },
        columns: [
            { data: "app_id" },
            {
                mData: function (data, type, row) {
                    return data.user_fname + " " + data.user_lname;
                },
            },
            { data: "pet_name" },
            { data: "pet_breed" },
            { data: "app_type" },
            {
                data: "app_date",
                render: function (data) {
                    return moment(data).format("MMM DD, YYYY");
                },
                targets: 1,
            },
            {
                data: "app_time",
                render: function (data) {
                    var timeString = moment().format("YYYY-MM-DD") + " " + data;
                    return moment(timeString, "YYYY-MM-DD h:mm:ss a").format(
                        "h:mm a"
                    );
                },
                targets: 1,
            },
            {
                data: "app_id",
                mRender: function (data, type, row) {
                    return (
                        '<button type="button" data-title="Deactivate This?" onclick=completeAppointment(' +
                        data +
                        ') class="btn rounded-0 btn-outline-success btn-sm py-2 px-3"><i class="bi bi-check-lg"></i></button> <a href="printAppointment/' +
                        data +
                        '" class="btn rounded-0 btn-outline-primary btn-sm py-2 px-3" data-title="Print Appointment?"><i class="bi bi-filetype-pdf"></i></a>'
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

// COMPLERE APPOINTMENT FETCH APPOINTMENT ID
function completeAppointment(id) {
    $("#completeAppointmentModal").modal("show");
    localStorage.setItem("appointmentId", id);
}
// COMPLERE APPOINTMENT FETCH APPOINTMENT ID

// SUBMIT COMPLETION INFO
$("body").delegate("#submitCompletionAppFunction", "submit", function (e) {
    e.preventDefault();
    var appointmentId = localStorage.getItem("appointmentId");
    var typeOfNextAppointment = $("#typeOfNextAppointment").val();
    var petWeight = $("#petWeight").val();
    var nameOfMeds = $("#nameOfMeds").val();
    var dateOfNextAppointment = $("#dateOfNextAppointment").val();
    var timeOfNextAppointment = $("#timeOfNextAppointment").val();
    $.ajax({
        url: "/submitCompletionAppFunction",
        type: "POST",
        method: "POST",
        dataType: "text",
        data: {
            appointmentId: appointmentId,
            petWeight: petWeight,
            typeOfNextAppointment: typeOfNextAppointment,
            dateOfNextAppointment: dateOfNextAppointment,
            timeOfNextAppointment: timeOfNextAppointment,
            nameOfMeds: nameOfMeds,
        },
        success: function (response) {
            if (response == 1) {
                // APPOINTMENT SUBMIT SUCCESSFULY
                $("#submitCompletionAppFunction").trigger("reset");
                $("#allThisWeekAppointmentFunction").DataTable().ajax.reload();
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "APPOINTMENT HAS BEEN COMPLETED",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                // SOMETHING WRONG IN BACKEND
                Swal.fire(
                    "Added Failed",
                    "Sorry appointment has not complete",
                    "error"
                );
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
});
// SUBMIT COMPLETION INFO
