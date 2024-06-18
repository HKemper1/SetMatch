$(document).ready(function() {
    $('#teamname').blur(function() { /
        var teamname = $(this).val();
        $.ajax({
            url: '<?php echo $_SERVER['PHP_SELF']; ?>',
            type: 'POST',
            data: { teamname: teamname },
            success: function(response) {
                if (response.trim() === 'taken') {
                    $('#teamname_message').html('Teamname bereits vergeben!');
                    $('#teamname').val('');
                } else {
                    $('#teamname_message').html('');
                }
            }
        });
    });
});

