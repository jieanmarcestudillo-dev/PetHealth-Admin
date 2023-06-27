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
                {
                    "data": "user_id",
                    mRender: function (data, type, row) {
                        return '<button type="button" data-title="View More Details?" onclick=viewClient(' + data + ') class="btn rounded-0 btn-outline-success btn-sm py-2 px-3"><i class="bi bi-eye"></i></button>';
                    }
                }
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


// VIEW DETAILS
    function viewClient(id){
        $('#viewClientDetails').modal('show')
        $.ajax({
            url: '/viewClient',
            type: 'GET',
            dataType: 'json',
            data: {clientId: id},
        })
        .done(function(response) {
            $('#applicantsNationality').val(response.nationality)
            $('#applicantsReligion').val(response.religion)
        })
    }
// VIEW DETAILS
