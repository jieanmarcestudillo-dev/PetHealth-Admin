$(document).ready(function(){
    allAcceptAppointmentFunction();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// FETCH UPCOMING OPERATION FOR TABLES
    function allAcceptAppointmentFunction(){
            var table = $('#allAcceptAppointmentFunction').DataTable({
                "language": {
                    "emptyTable": "No Appointment Found."
                },
                "lengthChange": true,
                "scrollCollapse": true,
                "paging": true,
                "info": true,
                "responsive": true,
                "ordering": false,
                "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                "iDisplayLength": 25,
            "ajax":{
                "url":"/allAcceptAppointmentFunction",
                "dataSrc": "",
                "targets": "0",
            },
            "columns":[
                {"data":"app_id"},
                { "mData": function (data, type, row) {
                    return data.user_fname+ " " +data.user_lname;
                }},
                {"data":"pet_name"},
                {"data":"pet_breed"},
                {"data":"app_type"},
                {"data": "app_date",
                    "render": function(data) {
                    return moment(data).format('MMM DD, YYYY');
                },
                "targets": 1
                },
                {"data":"app_time"},
            ],
            order: [[1, 'asc']],
        });
        table.on('order.dt search.dt', function () {
            let i = 1;
            table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                this.data(i++);
            });
        }).draw();
    }
// FETCH UPCOMING OPERATION FOR TABLES