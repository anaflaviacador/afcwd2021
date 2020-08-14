jQuery(document).ready(function($) {

    // // Show the login dialog box on click
    // $('a#show_login').on('click', function(e){
    //     $('body').prepend('<div class="login_overlay"></div>');
    //     $('form#customer_login').fadeIn(500);
    //     $('div.login_overlay, form#customer_login a.close').on('click', function(){
    //         $('div.login_overlay').remove();
    //         $('form#customer_login').hide();
    //     });
    //     e.preventDefault();
    // });

    // Perform AJAX login on form submit
    $('form#customer_login').on('submit', function(e){
        $('form#customer_login p.status').show().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#customer_login #username').val(), 
                'password': $('form#customer_login #password').val(), 
                'security': $('form#customer_login #security').val() },
            success: function(data){
                $('form#customer_login p.status').text(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_login_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });

});