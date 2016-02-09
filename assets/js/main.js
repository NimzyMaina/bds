/**
 * Created by nimzy on 2/9/2016.
 */

$(document).on('click', '.delete-object', function(){

    var id = $(this).attr('delete-id');
    var del = $(this).attr('delete-type');

    swal({
            title: 'Are you Sure?',
            text: 'You will not be able to recover this Item!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel please!',
            confirmButtonClass: 'confirm-class',
            cancelButtonClass: 'cancel-class',
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if(isConfirm) {
                //ajax
                $.post(ajax_url, {
                    object_id: id,
                    type : del
                }, function(data){
                    swal('Deleted!',
                        'Your Item has been Deleted.',
                        'success');
                    location.reload();
                }).fail(function() {
                    swal('Unable to delete.');
                });
            }else{
                swal(
                    'Cancelled',
                    'Your Item Is Safe :)',
                    'error'
                );
            }

        });

    return false;
});


$(function() {
    $( ".date" ).datepicker();
});


var dataPreferences = {
    series: [
        [25, 30, 20, 25]
    ]
};

var optionsPreferences = {
    donut: true,
    donutWidth: 40,
    startAngle: 0,
    total: 100,
    showLabel: false,
    axisX: {
        showGrid: false
    }
};

Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

Chartist.Pie('#chartPreferences', {
    labels: lab,
    series: val
});


var data = {
    labels: lab2,
    series: [val]
};

var options = {
    seriesBarDistance: 10,
    axisX: {
        showGrid: false
    },
    height: "245px"
};

var responsiveOptions = [
    ['screen and (max-width: 640px)', {
        seriesBarDistance: 5,
        axisX: {
            labelInterpolationFnc: function (value) {
                return value[0];
            }
        }
    }]
];

Chartist.Bar('#chartActivity', data, options, responsiveOptions);




