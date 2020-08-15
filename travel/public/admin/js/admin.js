(function($) {
  "use strict"; // Start of use strict
  // Configure tooltips for collapsed side navigation
  $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
    template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
  })
  // Toggle the side navigation
  $("#sidenavToggler").click(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");
    $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
    $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
  });
  // Force the toggled class to be removed when a collapsible nav link is clicked
  $(".navbar-sidenav .nav-link-collapse").click(function(e) {
    e.preventDefault();
    $("body").removeClass("sidenav-toggled");
  });
  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
    var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  });
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  // Configure tooltips globally
  $('[data-toggle="tooltip"]').tooltip()
  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });

  // Inline popups
  $('.inline-popups').each(function () {
  	$(this).magnificPopup({
  		delegate: 'a',
  		removalDelay: 500, //delay removal by X to allow out-animation
  		callbacks: {
  			beforeOpen: function () {
  				this.st.mainClass = this.st.el.attr('data-effect');
  			}
  		},
  		midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  	});
  });

 // Bookmarks
 $('.wishlist_close').on('click', function (c) {
 	$(this).parent().parent().parent().fadeOut('slow', function (c) {});
 });

  // Selectbox
  $(".selectbox").selectbox();

  // Pricing add
	function newMenuItem() {
		var newElem = $('tr.pricing-list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#pricing-list-container');
	}

    function newMenuItemNew() {
        var newElem = '<tr class="pricing-list-item">' +
            '<td> <div class="row"> <div class="col-md-3">' +
            '<div class="form-group">' +
            '<input type="text" name="things_title_new[]" required class="form-control" placeholder="Title">' +
            '</div></div><div class="col-md-3"> <div class="form-group">' +
            '<input type="text" required name="things_link_new[]" class="form-control" placeholder="Link"> ' +
            '</div></div><div class="col-md-3"> <div class="form-group" >' +
            '<textarea rows="5" type="text" name="things_description_new[]" required class="form-control" placeholder="Description..."></textarea>' +
            '</div></div><div class="col-md-2"> <div class="form-group" style="overflow: auto"> <input type="file" required name="things_image_new[]" class="form-control">' +
            '</div></div><div class="col-md-1"> <div class="form-group"> <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a> </div></div></div></td></tr>';

        $('table#pricing-list-containernew').append(newElem);
    }

    function newMenuItem2New() {
        var newElem = '<tr class="pricing-list-item2new"> <td> <div class="row"> <div class="col-md-4"> <div class="form-group"> <input type="text" name="hotels_title_new[]" required class="form-control" placeholder="Name"> </div></div><div class="col-md-4"> <div class="form-group"> <input type="text" required name="hotels_link_new[]" class="form-control" placeholder="Link"> </div></div><div class="col-md-2"> <div class="form-group"> <input type="file" name="hotels_image_new[]" required class="form-control"> </div></div><div class="col-md-2"> <div class="form-group"> <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a> </div></div></div></td></tr>';
        $('table#pricing-list-container2new').append(newElem);
    }

    function newMenuItem2() {
        var newElem = $('tr.pricing-list-item2').first().clone();
        newElem.find('input').val('');
        newElem.appendTo('table#pricing-list-container2');
    }

    function newMenuItem3() {
        var newElem = $('tr.pricing-list-item3').first().clone();
        newElem.find('input').val('');
        newElem.find('textarea').val('');
        newElem.appendTo('table#pricing-list-container3');
    }

    function newMenuItem4() {
        var newElem = $('tr.pricing-list-item4').first().clone();
        newElem.find('input').val('');
        newElem.find('textarea').val('');
        newElem.appendTo('table#pricing-list-container4');
    }

    function newMenuItem4New() {
        var newElem = '<tr class="pricing-list-item4new"> <td> <div class="row"> <div class="col-md-2"> <div class="form-group"><input type="text" class="form-control" placeholder="Title" name="article_titles_new[]"></div></div><div class="col-md-3"> <div class="form-group"> <textarea rows="5" type="text" name="article_texts_new[]" class="form-control" placeholder="Section Text..."></textarea> </div></div><div class="col-md-3"> <div class="form-group"><input type="text" class="form-control" placeholder="Image Caption" name="article_captions_new[]"></div></div><div class="col-md-2"> <div class="form-group"><input type="file" class="form-control" name="article_images_new[]"></div></div><div class="col-md-2"> <div class="form-group"><a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a></div></div></div></td></tr>';
        $('table#pricing-list-container4new').append(newElem);
    }

    function newMenuItem3New() {
        var newElem = '<tr class="pricing-list-item3new"> <td> <div class="row"> <div class="col-md-6"> <div class="form-group" style="overflow: auto"><input type="file" class="form-control" required name="image_gallery_new[]"></div></div><div class="col-md-4"> <div class="form-group"><input type="text" class="form-control" name="caption_image_new[]" required placeholder="Caption"></div></div><div class="col-md-2"> <div class="form-group"><a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a></div></div></div></td></tr>';
        $('table#pricing-list-container3new').append(newElem);
    }

	if ($("table#pricing-list-container").is('*')) {
		$('.add-pricing-list-item').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#pricing-list-container .delete", function (e) {
			e.preventDefault();
			console.log($(this).parent().parent().parent().parent().parent());
            $(this).parent().parent().parent().parent().parent().remove();
		});
	}

    if ($("table#pricing-list-containernew").is('*')) {
        $('.add-pricing-list-itemnew').on('click', function (e) {
            e.preventDefault();
            newMenuItemNew();
        });
        $(document).on("click", "#pricing-list-containernew .delete", function (e) {
            e.preventDefault();
            console.log($(this).parent().parent().parent().parent().parent());
            $(this).parent().parent().parent().parent().parent().remove();
        });
    }

    if ($("table#pricing-list-container4new").is('*')) {
        console.log("hi");
        $('.add-pricing-list-item4new').on('click', function (e) {
            e.preventDefault();
            console.log('ss');
            newMenuItem4New();
        });
        $(document).on("click", "#pricing-list-container4new .delete", function (e) {
            e.preventDefault();
            console.log($(this).parent().parent().parent().parent().parent());
            $(this).parent().parent().parent().parent().parent().remove();
        });
    }

    if ($("table#pricing-list-container2").is('*')) {
        $('.add-pricing-list-item2').on('click', function (e) {
            e.preventDefault();
            newMenuItem2();
        });
        $(document).on("click", "#pricing-list-container2 .delete", function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().parent().remove();
        });
    }

    if ($("table#pricing-list-container2new").is('*')) {
        $('.add-pricing-list-item2new').on('click', function (e) {
            e.preventDefault();
            newMenuItem2New();
        });
        $(document).on("click", "#pricing-list-container2new .delete", function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().parent().remove();
        });
    }

    if ($("table#pricing-list-container3").is('*')) {
        $('.add-pricing-list-item3').on('click', function (e) {
            e.preventDefault();
            newMenuItem3();
        });
        $(document).on("click", "#pricing-list-container3 .delete", function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().parent().remove();
        });
    }

    if ($("table#pricing-list-container3new").is('*')) {
        $('.add-pricing-list-item3new').on('click', function (e) {
            e.preventDefault();
            newMenuItem3New();
        });
        $(document).on("click", "#pricing-list-container3new .delete", function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().parent().remove();
        });
    }

    if ($("table#pricing-list-container4").is('*')) {
        $('.add-pricing-list-item4').on('click', function (e) {
            e.preventDefault();
            newMenuItem4();
        });
        $(document).on("click", "#pricing-list-container4 .delete", function (e) {
            e.preventDefault();
            console.log($(this).parent().parent().parent().parent().parent());
            $(this).parent().parent().parent().parent().parent().remove();
        });
    }

})(jQuery); // End of use strict
