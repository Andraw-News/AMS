$(document).ready(function() {
    function updateConvo(){
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: { action: 'GetConvo' },
            success:function(response){
                $('.chat-list').html(response);
            }
        });
    }
    updateConvo(); // Initial update

    $(document).on('submit', '#messageForm', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: formData,
            success:function(){
                updateConvo();
            }
        });
    });
});