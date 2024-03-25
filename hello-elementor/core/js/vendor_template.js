

jQuery(document).ready(function($) {

	$('.related_vendors').click(function(event) {
		var data_vendor = $(this).attr('data-vendor');
		$('.related_vendors').removeClass('active');
		$(this).addClass('active');
        $('.vendor-wrap').css({
            'opacity': 0.3
        });
        var vendor_name = $(this).text();
        $('.vendors-name').text(vendor_name);
        $('.related_vendors_info').show();


        $.ajax({
            type    : "POST",
            url     : js_url.ajaxurl,
            dataType: "json",
            data    : "action=get_vendor_by_cat&id=" + data_vendor,
            success : function (a) {
                console.log(a);

			        $('.vendor-wrap').css({
			            'opacity': 1
			        });
			        $('.vendor-wrap').html(a.out);

                    // var destination = $('#country_select').offset().top - 50;
                    // $('body,html').animate({scrollTop: destination}, 400);


            }
        });//end ajax




	});
		
}); 