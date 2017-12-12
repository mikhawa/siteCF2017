(function($) {
	$(document).ready(function() {

		$('.student a, .employer a').hover(function(){
    			$(this).parent().siblings('.toggle').stop().show(500);
    			$(this).parent().parent().siblings().find('.toggle').stop().hide(500);
			}, function(){
				$(this).parent().siblings('.toggle').stop().hide(500);
			}
		);

		$('.table-responsive').stacktable({class:'stacktable small-only'});

		/*$('#searchsubmit').click(function(e){
			e.preventDefault();
			$('.search-query').show();
		});*/

		/*$('#searchsubmit').on('click', function(e) {
			e.preventDefault();
		    var sInput = $('.search-query').val();
		    if (sInput == null || sInput == '') {
		        $('.search-query').stop().show().focus();
		    }else{
		        $('#searchform').submit();
		    }
		});*/

	})
})(jQuery);