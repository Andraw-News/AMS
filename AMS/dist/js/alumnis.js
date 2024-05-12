$(document).ready(function() {
    function updateTable(){
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: { action: 'GetAlumniList' },
            success:function(response){
                $('#alumniList').html(response);
            }
        });
    }
    updateTable(); // Initial update
    $(document).on('change', '.user-checkbox', function() {
        updateToField();
        if (!$(this).prop('checked')) {
            // If any checkbox is unchecked, uncheck the "Select All" checkbox
            $('#select-all').prop('checked', false);
        }
    });
     // Select all checkbox
     $('#select-all').change(function () {
        console.log("1");
        $('.user-checkbox').prop('checked', $(this).prop('checked'));
        updateToField();
    });

    // Function to update "To" field
    function updateToField() {
        var selectedEmails = $('.user-checkbox:checked').map(function () {
            return $(this).closest('tr').find('td:nth-child(3)').text().trim();
        }).get();
        $('#inputAddress').val(selectedEmails.join(', '));
    }

    $(document).on('click', '.view', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: { ID: id , action: 'ViewAlumniProfile' },
            success:function(response){
                $('.modal-body').html(response);
                $('#AlumniProfile').modal('show');
            }
        });
    });

    $(document).on('click', '.edit', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: { ID: id , action: 'EditAlumniProfile' },
            success:function(response){
                $('.modal-body').html(response);
                $('#AlumniProfile').modal('show');
            }
        });
    });

    $(document).on('submit', '#AlumniForm', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: formData,
            success:function(response){
                updateTable();
                $('#AlumniProfile').modal('hide');
                alert(response);
            }
        });
    });

    $(document).on('submit', '#SendMailForm', function (event) {
        event.preventDefault();
        console.log(1);
        var formData = $(this).serialize();
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: formData,
            dataType: 'json',
            success:function(data){
                console.log(data.alert);
                alert(data.alert);
            },
            error: function(xhr, status, error) {
                console.error(xhr, status, error);
                alert('An error occurred while processing your request. Please try again later.');
            }
        });
    });
});