// JavaScript Document
//$('.day-list li').each(function () {
	
		//var target = $(this).attr('sft-program-Id');
		//var scrollPos = $("#" + target).position().top;
			  //console.log(scrollPos);
				//$(this).find('a').click(function () { 
				//$('.active').removeClass('active');
				//$(this).addClass('active');
				//$('.day-description').animate({ 
					 //scrollTop: scrollPos 
				//}, 500); 
				
		//});
	//});
	
$(document).on('click','.searchbychar', function(event) {
    event.preventDefault();
    $(".day-list>li.active").removeClass('active');
    $(this).closest('li').addClass('active');
    var target = "#" + this.getAttribute('data-target'); alert(target);
    $('.day-description').animate({
        scrollTop: $(target).offset().top
    }, 2000);
});