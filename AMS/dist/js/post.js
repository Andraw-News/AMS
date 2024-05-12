$(document).ready(function() {
    function updatePosts(){
        $.ajax({
            url: 'bridge.php',
            type: 'post',
            data: { action: 'GetAllPost' },
            success:function(response){
                $('#DisplayPosts').html(response);
            }
        });
    }
    updatePosts(); // Initial update
    
});