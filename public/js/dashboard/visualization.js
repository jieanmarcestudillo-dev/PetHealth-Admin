$(document).ready(function () {
    totalCompletedAppointment();
    totalClientRegistered();
    totalAcceptAppointment();
    totalPendingAppointment();
    visualization();
    commonService();
    commonBreed();
});

// FUNCTION FOR SHOW TOTAL UPCOMING OPERATION
function totalCompletedAppointment() {
    $.ajax({
        url: "/totalCompletedAppointment",
        method: "GET",
        success: function (data) {
            $("#totalCompletedAppointment").html(data);
        },
    });
}
// FUNCTION FOR SHOW TOTAL UPCOMING OPERATION

// FUNCTION FOR SHOW TOTAL COMPLETED OPERATION
function totalClientRegistered() {
    $.ajax({
        url: "/totalClientRegistered",
        method: "GET",
        success: function (data) {
            $("#totalClientRegistered").html(data);
        },
    });
}
// FUNCTION FOR SHOW TOTAL COMPLETED OPERATION

// FUNCTION FOR SHOW TOTAL APPLICANTS
function totalPendingAppointment() {
    $.ajax({
        url: "/totalPendingAppointment",
        method: "GET",
        success: function (data) {
            $("#totalPendingAppointment").html(data);
        },
    });
}
// FUNCTION FOR SHOW TOTAL APPLICANTS

// FUNCTION FOR SHOW TOTAL FOREMAN
function totalAcceptAppointment() {
    $.ajax({
        url: "/totalAcceptAppointment",
        method: "GET",
        success: function (data) {
            $("#totalAcceptAppointment").html(data);
        },
    });
}
// FUNCTION FOR SHOW TOTAL FOREMAM

// VISUALIZATION
function visualization() {
    $.ajax({
        url: "/visualization",
        method: "GET",
        success: function (data) {
            if (data != "") {
                const ctx = document.getElementById("myChart").getContext("2d");
                new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: data.months,
                        datasets: [
                            {
                                label: "# of Completed Appointment Per Month",
                                data: data.operations,
                                borderWidth: 1,
                                backgroundColor: ["#BF622A"],
                                borderColor: ["#BF622A"],
                            },
                        ],
                    },
                    options: {
                        scales: {
                            y: {
                                max: 15,
                                beginAtZero: true,
                            },
                        },
                    },
                });
            } else {
                var target = document.getElementById("visualization");
                target.innerHTML +=
                    "<div class='text-danger fs-4 text-center' style='position:absolute; top:19rem; width:100%' role='alert'>NO DATA AVAILABLE</div>";
            }
        },
    });
}
// VISUALIZATION

// HIGHEST RATINGS
function highestRatings() {
    var table = $("#highestRating").DataTable({
        language: {
            emptyTable: "No Employees Found",
        },
        lengthChange: false,
        scrollCollapse: false,
        paging: false,
        info: false,
        responsive: false,
        ordering: false,
        aLengthMenu: [
            [25, 50, 75, -1],
            [25, 50, 75, "All"],
        ],
        iDisplayLength: 25,
        ajax: {
            url: "/getHighestRating",
            dataSrc: "",
        },
        _columns: [
            { data: "applicant_id" },
            {
                mData: function (data, type, row) {
                    if (data.extention != null) {
                        return (
                            data.firstname +
                            " " +
                            data.lastname +
                            " " +
                            data.extention
                        );
                    } else {
                        return data.firstname + " " + data.lastname;
                    }
                },
            },
            {
                mData: function (data, type, row) {
                    return data.age + " Years Old";
                },
            },
            {
                mData: function (data, type, row) {
                    return data.averageRating + "%";
                },
            },
        ],
        get columns() {
            return this["_columns"];
        },
        set columns(value) {
            this["_columns"] = value;
        },
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
// HIGHEST RATINGS

// COMMON TYPE OF SERVICE
function commonService() {
    $.ajax({
        url: "/mostCommonType",
        method: "GET",
        success: function (data) {
            if (data != "") {
                const ctx = document
                    .getElementById("pieService")
                    .getContext("2d");
                let commonCarry = new Chart(ctx, {
                    type: "pie",
                    data: {
                        datasets: [
                            {
                                data: data.count,
                                backgroundColor: [
                                    "rgb(255, 99, 132)",
                                    "rgb(54, 162, 235)",
                                    "rgb(255, 205, 86)",
                                    "rgb(0, 255, 0)",
                                    "rgb(0, 255, 255)",
                                ],
                            },
                        ],
                        labels: data.type,
                    },
                    options: {
                        responsive: true,
                    },
                });
            }
        },
    });
}
// COMMON TYPE OF SERVICE

// COMMON TYPE OF BREED
function commonBreed() {
    $.ajax({
        url: "/mostCommonTypeBreed",
        method: "GET",
        success: function (data) {
            if (data != "") {
                const ctx = document
                    .getElementById("pieBreed")
                    .getContext("2d");
                let commonCarry = new Chart(ctx, {
                    type: "pie",
                    data: {
                        datasets: [
                            {
                                data: data.count,
                                backgroundColor: [
                                    "rgb(255, 99, 132)",
                                    "rgb(54, 162, 235)",
                                    "rgb(255, 205, 86)",
                                    "rgb(0, 255, 0)",
                                    "rgb(0, 255, 255)",
                                ],
                            },
                        ],
                        labels: data.type,
                    },
                    options: {
                        responsive: true,
                    },
                });
            }
        },
    });
}
// COMMON TYPE OF BREED
