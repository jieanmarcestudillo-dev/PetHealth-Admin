$(document).ready(function(){
    getAllVaccinationReportsFunction();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// FETCH UPCOMING OPERATION FOR TABLES
    function getAllVaccinationReportsFunction(){
            var table = $('#vaccinationReports').DataTable({
                "language": {
                    "emptyTable": "No Reports Found."
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
                "url":"/getAllVaccinationReportsFunction",
                "dataSrc": "",
                "targets": "0",
            },
            "columns":[
                {"data":"completed_id"},
                { "mData": function (data, type, row) {
                    return data.user_fname+ " " +data.user_lname;
                }},
                {"data":"pet_name"},
                {"data":"pet_breed"},
                {"data":"pet_weight"},
                {"data": "app_date",
                    "render": function(data) {
                    return moment(data).format('MMM DD, YYYY | hh:mm A');
                },
                "targets": 1
                },
                {"data": "app_date",
                    "render": function(data) {
                    return moment(data).format('MMM DD, YYYY | hh:mm A');
                },
                "targets": 1
                },
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