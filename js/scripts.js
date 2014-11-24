$(document).ready(function() {
	//Hide missing images
	$('img').error(function(){
        $(this).hide();
	});
	//Sliders
	var unslider;
	if($('.banner').length){
		unslider = $('.banner').unslider({dots: true, delay: 3000});
		$('.banner .left').click(function(){ unslider.data('unslider').prev() });
		$('.banner .right').click(function(){ unslider.data('unslider').next() });
	}
	//Mobile Slim Menu
	$('.navigation').mobileMenu();
	//Gallery
	if($('#gallery').length){
		$('#gallery .four figure').click(function(){
			var h = $(window).height() / 2 - $(this).height() / 2;
			$('#wireframe').css({'display': 'block', 'height': $(window).height()+'px', 'width': $(window).width()+'px'}).append($(this).find('img').clone()).stop().animate({'opacity': 1}, 300).click(function(){
				$(this).find('img').remove()
				$(this).animate({'opacity': 0}, 300, function(){
					$(this).css('display', 'none');
				});	
			});
		});
	}
	//Property Enquiry form
	if($('#property').length){ $('#property .enquire').enquire() }
	//Contact form
	if($('#contact').length){ loadScript(); $('#commentForm').validate({
  		errorElement: 'div',
		submitHandler: function(form) {$.ajax({
			url : 'http://localhost/shenstone-homes/scripts/mail.php',
			data : $('#commentForm').serialize(),
			type: 'POST',
			success : function(data){
				$('#commentForm').hide('slow');
				$('.form-container .cf').html(data); }
		});
		return false;
	}}); }
	//Admin
	if($('#admin').length){ 
		$('.add-form').initialize();
		$('.add-form').addThis();
		$('.item').updateThis();
		$('.item .delete').deleteThis();
	}
});
//Contact Map
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}
function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
      'callback=initialize';
  document.body.appendChild(script);
}
//Admin Init
(function($){
  $.fn.initialize = function() {
	$(this).find('.title').focus(function() { 
		if($(this).val() == 'Enter the title here...') $(this).val('');
	}).blur(function() {
		if($(this).val() == '') $(this).val('Enter the title here...');
	});
	$(this).find('.price').focus(function() { 
		if($(this).val() == 'Enter the price here...') $(this).val('');
	}).blur(function() {
		if($(this).val() == '') $(this).val('Enter the price here...');
	});
	$(this).find('textarea').autosize();
	$(this).find('textarea').focus(function() { 
		if($(this).val() == 'Enter the address here...') $(this).val('');
	}).blur(function() {
		if($(this).val() == '') $(this).val('Enter the address here...');
	});
  }; 
})(jQuery);
//Admin Add
(function($){
  $.fn.addThis = function() {
	$(this).find('.cancel').click(function(e){
		e.preventDefault();
		$('.add-form').trigger('reset');
	});
	$(this).submit(function(e){
		e.preventDefault();
		var formData = new FormData($(this)[0]);
		
		$('.subtract').css('display', 'block');
		$('.subtract').animate({'opacity': 1}, 250);
		
		$.ajax({
			url: 'add.php',
			data: formData,
			type: 'POST',
			async: false,
			success: function(data){
			  $.get('last.php', function(response){
				$('.item .delete').unbind('click');
				$('.item').unbind('click');
				$('.add-form').trigger('reset');
			    $('.subtract').animate({'opacity': 0}, 250);
			    $('.subtract').css('display', 'none');
				$('.add').after(response);
				$('.item .delete').deleteThis();
				$('.item').updateThis();
			  });
			},
			cache: false,
			contentType: false,
			processData: false
		});	
	});
  }; 
})(jQuery);
//Admin Update
(function($){
  $.fn.updateThis = function() {
	$(this).find('.edit').click(function(e){
		e.preventDefault();
		var theItem = $(this).parents('.item');
		var $theForm = $('<div class="add">' + $('.add').html() + '</div>');
		$('.add').animate({'opacity': 0}, 250, function(){
			$(this).removeClass('add').addClass('hidden');
			var id;
			
			$('.item .edit').unbind('click');
			$('.item .delete').unbind('click');
			
			$.get('id.php?id='+$(theItem).attr('id'), function(response){
				var news = jQuery.parseJSON(response);
				id = news.id;
				$theForm.find('h1').empty().append('Edit this property');
				$theForm.find('.title').val(news.title);
				$theForm.find('.content').empty().append(news.content);
				$theForm.find('.price').val(news.price);
				$theForm.find('.imagery_1').append('<img src="../uploads/' + news.image_1 + '" />').attr('href', '../uploads/' + news.image_1);
				$theForm.find('.imagery_2').append('<img src="../uploads/' + news.image_2 + '" />').attr('href', '../uploads/' + news.image_2);
				$theForm.find('.imagery_3').append('<img src="../uploads/' + news.image_3 + '" />').attr('href', '../uploads/' + news.image_3);
				$theForm.find('.imagery_4').append('<img src="../uploads/' + news.image_4 + '" />').attr('href', '../uploads/' + news.image_4);
				$theForm.find('.imagery_5').append('<img src="../uploads/' + news.image_5 + '" />').attr('href', '../uploads/' + news.image_5);
				$theForm.initialize();
				$(theItem).addClass('hiddenitem').after($theForm);
				$theForm.find('.cancel').click(function(){
					$theForm.remove();
					$('.hidden').removeClass('hidden').addClass('add').animate({'opacity': 1}, 250);	
					$('.hiddenitem').removeClass('hiddenitem');
					$('.item').updateThis();
					$('.item .delete').deleteThis();
				});
			});
			
			$theForm.find('.add-form').submit(function(e){
				e.preventDefault();
				var formData = new FormData($(this)[0]);
				formData.append('id', id);
				
				$('.subtract').css('display', 'block');
				$('.subtract').animate({'opacity': 1}, 250);
		
				$.ajax({
					url: 'update.php',
					data: formData,
					type: 'POST',
					async: false,
					success: function(data){
					  alert(data);
					  $.get('last.php', function(response){
						$theForm.remove();
						$('.hidden').removeClass('hidden').addClass('add').animate({'opacity': 1}, 250);
					 	$('.add-form').trigger('reset');
						$('.hiddenitem').remove();
						$('.subtract').animate({'opacity': 0}, 250);
						$('.subtract').css('display', 'none');
						$('.add').after(response);
						$('.item .delete').deleteThis();
						$('.item').updateThis();
					  });
					},
					cache: false,
					contentType: false,
					processData: false
				});
			});
		});
	});
  }; 
})(jQuery);
//Admin Delete
(function($){
   $.fn.deleteThis = function() {
      $(this).click(function(e){
		e.preventDefault();
		if(confirm('Are you sure you want to delete this? This cannot be undone.')){
			var thisItem = $(this).parents('.item');
			$.ajax({
				url: 'delete.php',
				data: {'id': $(thisItem).attr('id')},
				type: 'POST',
				success: function(data){
				  $(thisItem).fadeOut(250).remove();
				}
			});
		}
	  });
   }; 
})(jQuery);
//Mobile Menu
(function($){
  $.fn.mobileMenu = function() {
	var open = false;
	//Set Container Size
	$('.container').width($(window).width());
	$(window).resize(function(){ $('.container').width($(window).width()) });
	//Create Menu
	$('body').append('<div class="overlay-menu"><ul></ul></div>');
	$(this).find('li').each(function(){
		//alert($(thisLi).html());
		if($(this).parent().hasClass('dropdown')) {
			var thisLi = $(this).clone().addClass('lvl2');
		} else {
			var thisLi = $(this).clone();
		}
		if($(thisLi).find('.dropdown').length) { $(thisLi).find('.dropdown').remove() }
		$('.overlay-menu ul').append($(thisLi));
	});
	//Set click functions
	$('.mobile .menu-button').click(function(){
		if(open == false){
			$('.container').stop().animate({'margin-left': '-240px', 'opacity': 0.3333333}, 300, function(){
				$('.container').click(function(){
					$('.container').animate({'margin-left': '0px', 'opacity': 1}, 300);
					$('.overlay-menu').stop().animate({'right': '-240px'}, 300, function(){
						$(this).css('display', 'none');
					});
					$('body').css('overflow', 'scroll');
					open = false;
					$(this).unbind('click');
				});
			});
			$('.overlay-menu').css('display', 'block').stop().animate({'right': '0px'}, 300);
			$('body').css('overflow', 'hidden');
			open = true;
		} else if(open == true){
			$('.container').animate({'margin-left': '0px', 'opacity': 1}, 300);
			$('.overlay-menu').stop().animate({'right': '-240px'}, 300, function(){
				$(this).css('display', 'none')	;
			});
			$('body').css('overflow', 'scroll');
			open = false;
		}
		
	});
   }; 
})(jQuery);
//Property Enquire
(function($){
  $.fn.enquire = function() {
	var theForm = '<div class="wireframe-form"><form class="cmxform" id="commentForm" method="get" action=""><p><label for="cname">Name (required, at least 2 characters)</label><input id="cname" name="name" minlength="2" type="text" required/></p><p><label for="cemail">E-Mail (required)</label><input id="cemail" type="email" name="email" required/></p><p><label for="cphone">Phone No. (required)</label><input id="cphone" type="text" name="phone" required/></p><p><label for="ccomment">Your Comments (required)</label><textarea id="ccomment" name="comment" required></textarea></p><p style="text-align:right;width:100%x"><input class="submit" type="submit" value="Submit"/></p></form><div class="cf"></div></div>';
	$(this).click(function(){
		$('#wireframe').css({'display': 'block', 'height': $(window).height()+'px', 'width': $(window).width()+'px'}).append(theForm).stop().animate({'opacity': 1}, 300).click(function(e){
			if(e.target.id == 'wireframe'){
				$(this).animate({'opacity': 0}, 300, function(){
					$('.wireframe-form').remove();
					$(this).css('display', 'none');
				});	
			}
		});
		$('#commentForm').validate({
			errorElement: 'div',
			submitHandler: function(form){
				$.ajax({
					url : 'http://localhost/shenstone-homes/scripts/mail_.php',
					data : $('#commentForm').serialize(),
					type: 'POST',
					success : function(data){
						$('#commentForm').hide('slow');
						alert('We have received your request. We will get in touch with you shortly!');
						$('#wireframe').animate({'opacity': 0}, 300, function(){
							$('.wireframe-form').remove();
							$(this).css('display', 'none');
						});	
					}
				});
				return false;
			}
		});
	});
  }; 
})(jQuery);