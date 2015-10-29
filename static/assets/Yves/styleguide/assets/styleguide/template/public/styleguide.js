$(function(){
	hljs.initHighlightingOnLoad();

	var ref = $('.styleguide-menu').find('.styleguide-menu-list').data('kss-ref');
	$('.styleguide-menu').find('.section-' + ref).addClass('selected');

	if (!$('.styleguide-menu .selected').size()) {
		window.location = $('.styleguide-menu').find('a').eq(0).attr('href');
	}

	$('iframe').each(function () {
		$(this).load(function () {
			var $this = $(this);
			$($this.contents()[0]).ready(function () {
				setTimeout(function () {
					$this.css('height', $this.contents().find("body").height() );
				}, 0);


				$($this.contents()[0]).find('.faq-card').each(function () {
			        var $card = $(this);

			        $card.find('.faq-card__toggle, .faq-card__question').click(function () {
			            var $answer = $card.find('.faq-card__answer');

			            if ($card.hasClass('faq-card--active')) {
			                $card.removeClass('faq-card--active');
			                $answer.slideUp();

			            } else {
			                $card.addClass('faq-card--active');
			                $answer.slideDown();
			            }
			        });
			    });


				$($this.contents()[0]).find('.faq__switches').each(function () {
			        var $switches = $(this).find('.faq__switch');

					$switches.click(function () {
			            $switches.removeClass('faq__switch--initial faq__switch--active');
			            $(this).addClass('faq__switch--active');
			        });
			    });


				$($this.contents()[0]).find('.featured-products__slider').each(function () {
					var $slider, $container, $prev, $next, $cards, $bullets;

					$slider = $(this);
					$container = $slider.find('.featured-products__slider-inner');
					$prev = $slider.find('.featured-products__control--prev');
					$next = $slider.find('.featured-products__control--next');
					$productCard = $slider.find('.product-card');

					var index, count, visible;

					index = 1;

					updateVisible();
					count = $productCard.size();


					createBullets();


					$prev.click(previous);
					$next.click(next);

					$slider.on('click', '.featured-products__bullet', function () {
						index = $bullets.index($(this));
						slide();
					});



					// TODO: helper.debounce
					$(window).resize(function () {
						updateVisible();
						createBullets();
						slide();
					});



					function previous () {
						index = Math.max(0, index - 1);
						slide();
					}

					function next () {
						index = Math.min(count - visible, index + 1);
						slide();
					}



					function hasPrevious () {
						return index > 0;
					}

					function hasNext () {
						return index < count - visible;
					}



					function slide () {
						updateBullets();
						updateContainerOffset();
						updateControls();
					}


					function createBullets () {
						if (!!$bullets) {
							$bullets.remove();
						}

						$bullets = $slider.find('.featured-products__bullets');

						for (var i = 0; i <= count - visible; i++) {
							$bullets.append('<span class="featured-products__bullet">');
						}

						$bullets = $bullets.children();
						updateBullets();
					}


					function updateVisible () {
						// TODO: helper.getViewport
						visible = Math.round($(document).width() / $productCard.outerWidth(true));
					}

					function updateContainerOffset () {
						var offset = visible != 1 ? 100 / count * (1 - index) : 0;

						$container.css({
							'transform': 'translate(' + offset + '%,0)',
							'-moz-transform': 'translate(' + offset + '%,0)',
							'-webkit-transform': 'translate(' + offset + '%,0)',
							'-ms-transform': 'translate(' + offset + '%,0)'
						});
					}

					function updateBullets () {
						$bullets.removeClass('featured-products__bullet--active');
						$bullets.eq(index).addClass('featured-products__bullet--active');
					}

					function updateControls () {
						if (hasPrevious()) {
							$slider.removeClass('js-first')
						} else {
							$slider.addClass('js-first')
						}

						if (hasNext()) {
							$slider.removeClass('js-last')
						} else {
							$slider.addClass('js-last')
						}
					}
				});
			});
		});
	});

});