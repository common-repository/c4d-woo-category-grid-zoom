(function($){
	"use strict";
	var c4dWooCgz = {};
	c4dWooCgz.updateCols = function(){
		var list = $('.woocommerce ul.products'),
		cols = list.find('li.last:first').index() + 1,
		w = $(document).width();

		if (w <= 768) {
			cols = 3;
		}
		if (w <= 640) {
			cols = 2;
		}
		if (w <= 400) {
			cols = 1;
		}
		c4dWooCgz.cols = cols;
		list.attr('data-cols', cols);
	};

	c4dWooCgz.buttonClick = function() {
		var list = $('.woocommerce ul.products');

		$('body').on('click', '.c4d-woo-cgz .zoom-button', function(){
			if ($(this).hasClass('zoom-in')) {
				if (c4dWooCgz.cols > 1) {
					list.attr('data-cols', c4dWooCgz.cols - 1);	
					c4dWooCgz.cols--;
				}
			} else {
				if (c4dWooCgz.cols < 12) {
					list.attr('data-cols', c4dWooCgz.cols + 1);					
					c4dWooCgz.cols++;
				}
			}
		});
	};

	$(document).ready(function(){
		c4dWooCgz.updateCols();
		$( window ).resize(function() {
		  c4dWooCgz.updateCols();
		});
		c4dWooCgz.buttonClick();

		$('body').on('click', '.c4d-woo-cgz-layout .layout-button', function(){
			var addclass = '';
			if ($(this).hasClass('button-list')) {
				addclass = 'c4d-woo-cgz-layout-list';
			} else {
				addclass = 'c4d-woo-cgz-layout-grid';
			}
			$(this).addClass('active').siblings().removeClass('active');
			$('body').removeClass('c4d-woo-cgz-layout-list c4d-woo-cgz-layout-grid').addClass(addclass);
		});
	});

})(jQuery);