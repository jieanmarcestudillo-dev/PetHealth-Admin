$(document).ready(function(){
    getAllClientFunction();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// FETCH UPCOMING OPERATION FOR TABLES
    function getAllClientFunction(){
            var table = $('#clientDetails').DataTable({
                "language": {
                    "emptyTable": "No Clients Found."
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
                "url":"/getAllClientFunction",
                "dataSrc": "",
                "targets": "0",
            },
            "columns":[
                {"data":"user_id"},
                { "mData": function (data, type, row) {
                    return data.user_fname+ " " +data.user_lname;
                }},
                {"data":"contact"},
                {"data":"email"},
                {"data":"address"},
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