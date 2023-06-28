$(document).ready(function () {
    allPendingAppointmentFunction();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// FETCH UPCOMING OPERATION FOR TABLES
function allPendingAppointmentFunction() {
    var table = $("#allPendingAppointmentFunction").DataTable({
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
            url: "/allPendingAppointmentFunction",
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
                        '<button type="button" onclick=confirmedAppointment(' +
                        data +
                        ') class="btn rounded-0 btn-outline-success btn-sm py-2 px-3" data-title="Accept This?"><i class="bi bi-check-lg"></i></button> <button type="button" data-title="Decline This?" onclick=cancelAppointment(' +
                        data +
                        ') class="btn rounded-0 btn-outline-danger btn-sm py-2 px-3"><i class="bi bi-x-lg"></i></button>'
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

// CONFIRMED APPOINTMENT
function confirmedAppointment(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to ACCEPT this appointment?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Accept it",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/acceptAppointment",
                type: "POST",
                dataType: "json",
                data: { appointmentId: id },
            });
            Swal.fire({
                title: "APPOINTMENT CONFIRMED SUCCESSFULLY",
                text: "Check your Schedule",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
            }).then((result) => {
                if (result) {
                    $("#allPendingAppointmentFunction")
                        .DataTable()
                        .ajax.reload();
                }
            });
        }
    });
}
// CONFIRMED APPOINTMENT

// CANCEL APPOINTMENT
function cancelAppointment(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to DECLINE this appointment?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, CANCEL it",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/cancelAppointment",
                type: "POST",
                dataType: "json",
                data: { appointmentId: id },
            });
            Swal.fire({
                title: "APPOINTMENT CANCELLED SUCCESSFULLY",
                text: "Check your Schedule",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
            }).then((result) => {
                if (result) {
                    $("#allPendingAppointmentFunction")
                        .DataTable()
                        .ajax.reload();
                }
            });
        }
    });
}
// CANCEL APPOINTMENT
