(function($){
    $(document).ready(function(){
        var sDanw_InitNotification;
        var oDanw_Notification = danw_notification_wc_ajax;
        var oDanw_Duration = oDanw_Notification.danw_duration_notification;
        var oDanw_CustomDuration = oDanw_Notification.danw_duration_custom_notification;
        var data = {
            action: 'danw_notification_wc_ajax'
        };
        clearTimeout(sDanw_InitNotification);
        sDanw_InitNotification = setInterval(function(){
            oDanw_showNotification();
        }, oDanw_Notification.danw_first_time_notifcation);
        
        function oDanw_showNotification()
        {
            $.ajax({
                url: oDanw_Notification.ajaxurl,
                type: 'get',
                data: data,
                dataType: 'html',
                beforeSend: function() {
                    $('.danw-wrapper').remove();
                    clearTimeout(sDanw_InitNotification);
                },
                complete: function() {
                },
                success: function(html) {
                    sDanw_InitNotification = setInterval(function(){
                        oDanw_showNotification();
                    }, oDanw_Notification.danw_time_notifcation);
                    if(html !== ''){
                        var eNotification = $(html);
                        eNotification.css({'z-index':9999});
                        eNotification.css({opacity:0});
                        $('body').append(eNotification);
                        if($('.danw-wrapper-custom').length > 0){
                            eNotification.css({'z-index':9990});
                            doAnimation(eNotification, 500, false, false, Math.round($('.danw-wrapper-custom').outerHeight()));
                        } else {
                            doAnimation(eNotification, 500);
                        }
                        setTimeout(function(){
                            $('.dawn-close-btn').trigger('click');
                        }, oDanw_Duration);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {

                }
            });   
        }
        
             
        

        $('body').on('click', '.dawn-close-btn', function(event) {
            event.preventDefault();
            doAnimation($(this).parent().parent(), 500, true, function(){
                //$(this).parent().parent().remove();
            });
        });
       

        function doAnimation(eBlock, iDuration, bHide, fCallback, iBottomMargin)
        {
            var ePos = eBlock.position();
            if(bHide === true){
                eBlock.css({opacity:1});
                eBlock.animate({bottom:6, opacity:0}, {duration: iDuration, complete: function () {
                        eBlock.remove();
                        if (typeof fCallback === "function") {
                            fCallback();
                        }
                    }
                });   
            } else {
                eBlock.css({bottom:6});
                eBlock.css({opacity:0});
                var iBottomPix = 20;
                if(iBottomMargin){
                    iBottomPix = iBottomMargin + 30;
                }
                eBlock.animate({bottom:iBottomPix, opacity:1}, {duration: iDuration, complete: function () {
                        if (typeof fCallback === "function") {
                            fCallback();
                        }
                    }
                });   
            }
        }
    });
})(jQuery);