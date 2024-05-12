$(function() {
    "use strict";
    
    function updateTable(){
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            dataType: 'html', // Specify the expected data type
            data: { action: 'GetSignupList' },
            success: function(response) {
                $("#signupList").html(response);
            }
        });
    }
    updateTable(); // Initial update

    $(document).on('click', '.view', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            dataType: 'html', // Specify the expected data type
            data: { ID: id , action: 'ViewAlumniProfile' },
            success: function(response) {
                $('.modal-body').html(response);
                $('#AlumniProfile').modal('show');
            }
        });
    });

    $(document).on('click', '.approved', function () {
        if (confirm("Do you want to approve alumni's account?")) {
            var id = $(this).attr("id");
            $.ajax({
                url: 'bridge.php',
                type: 'post',
                dataType: 'html', // Specify the expected data type
                data: { ID: id , action: 'ApprovedAccount' },
                success: function(response) {
                    alert(response);
                    updateTable();
                }
            });
        }
    });

    $(document).on('click', '.removed', function () {
        if (confirm("Do you want to remove alumni's account?")) {
            var id = $(this).attr("id");
            $.ajax({
                url: 'bridge.php',
                type: 'post',
                dataType: 'html', // Specify the expected data type
                data: { ID: id , action: 'RemovedAccount' },
                success: function(response) {
                    alert(response);
                    updateTable();
                }
            });
        }
    });
});