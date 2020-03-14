/*
* Sapple Systems Single slider - jQuery plugin
*/
(function ($) {
	$.fn.sappleSingleSlider = function (options) {

		// Handle multiple elements
		if (this.length > 1) {
			var a = new Array();
			this.each(function () {
				a.push($(this).sappleSingleSlider(options));
			});
			return a;
		}

		// Create "opts" object
		var opts = $.extend({}, $().sappleSingleSlider.defaults, options);

		// Define slider object
		var $this = this;
		var images = $this.find('img');
		var sliderUL = $this.find('ul');
		var sliderItems = sliderUL.find('li');
		var sliderWidth, swipeDistance, sliderItemsNew, sliderULWidth, itemCurr, itemPrev, itemNext, titleLIs, btnNext, btnPrev, counterCurrent, counterTotal, swipeXStart, swipeXEnd, isAnimating, titles, pagination;

		//Vars

		/* PRIVATE FUNCTIONS */
		var beforeTransition = function (direction) {

			counterCurrent.text(itemCurr.data('index')+1);

			sliderItemsNew = sliderUL.find('li');

			var curr = itemCurr;
			var prev = itemCurr.prev();
			var next = itemCurr.next();

			switch (direction) {
				case 'prev':
				prev = (prev.length > 0) ? prev : sliderItemsNew.last();
				break;
				case 'next':
				next = (next.length > 0) ? next : sliderItemsNew.first();
				break;
			}
			
			titleLIs.animate({ 'opacity' : 0 }, opts.animationSpeed/2, function() {

				$(titleLIs[1]).html('<h4>' + curr.find('h4').text() + '</h4><p>' + curr.find('p').text() + '</p>');
				$(titleLIs[0]).html('<h4>' + prev.find('h4').text() + '</h4>');
				$(titleLIs[2]).html('<h4>' + next.find('h4').text() + '</h4>');

				titleLIs.animate({ 'opacity' : 1 }, opts.animationSpeed/3);

			});

		}

		var afterTransition = function () {

			sliderItemsNew = sliderItemsNew || sliderUL.find('li');

			itemPrev = itemCurr.prev();
			itemNext = itemCurr.next();

			if (itemPrev.length < 1) {
				itemPrev = sliderItemsNew.last();
				sliderUL.prepend(itemPrev.detach());
			}
			else if (itemNext.length < 1) {
				itemNext = sliderItemsNew.first();
				sliderUL.append(itemNext.detach());
			}
			sliderUL.css('left', 0-itemCurr.position().left);

			isAnimating = false;
		}

		var startSwipe = function (e) {
			if (isAnimating)
				return;
			swipeXStart = e.clientX || e.touches[0].clientX;
			
		}

		var endSwipe = function (e) {
			if (!swipeXStart)
				return;
			swipeXEnd = e.clientX || e.changedTouches[0].clientX;

			if (swipeXEnd - swipeXStart > opts.swipeDistance) {
				$this.prev();
			}
			else if (swipeXStart - swipeXEnd > opts.swipeDistance) {
				$this.next();
			}
			swipeXStart = null;
			swipeXEnd = null;
		}

		var downHandler = function(e) {
			startSwipe(e);
		}
		var upHandler = function(e) {
			endSwipe(e);
		}

		var highlight = function(direction) {
			var currIndex = itemCurr.data('index');
			var nextIndex;
			if (direction == 'prev') {
				if (currIndex == 0)
					nextIndex = sliderItems.length;
				else 
					nextIndex = currIndex;
			}
			else if (direction == 'next') {
				if (currIndex == (sliderItems.length-1))
					nextIndex = 1;
				else 
					nextIndex = currIndex+2;
			}
			counterCurrent.text(nextIndex);
		}

		var debounce = function(func, wait, immediate) {
			var timeout;
			return function() {
				var context = this, args = arguments;
				var later = function() {
					timeout = null;
					if (!immediate) func.apply(context, args);
				};
				var callNow = immediate && !timeout;
				clearTimeout(timeout);
				timeout = setTimeout(later, wait);
				if (callNow) func.apply(context, args);
			};
		};

		var resizeHandler = debounce(function() {
			$this.update(opts);
        }, 100);

 				
		/* PUBLIC FUNCTIONS */
		this.destroy = function (resetHTML) {
			$this.removeData('sappleSingleSlider').removeClass('sappleSingleSliderContainer').removeAttr('style');
			if (resetHTML) {
				sliderUL.empty().append(sliderItems);
			}
			sliderItems.removeAttr('data-index').removeClass('slide').css({
				'float' : '',
				'width' : ''
			});
			titles.remove();
			pagination.remove();

			sliderUL.removeAttr('style');

			sliderUL[0].removeEventListener('mousedown', downHandler);
			sliderUL[0].removeEventListener('mouseup', upHandler);
			sliderUL[0].removeEventListener('touchstart', downHandler);
			sliderUL[0].removeEventListener('touchend', upHandler);

			window.removeEventListener('resize', resizeHandler);
			
		};
 
		this.update = function (options, reset) {
			opts = null;
			opts = $.extend({}, $().sappleSingleSlider.defaults, options);
			this.destroy(reset);
			return this.create();
		};
 
		this.prev = function () {
			isAnimating = true;
			itemCurr = itemCurr.prev();
			beforeTransition('prev');
			sliderUL.animate({
				'left' : (0 - itemCurr.position().left)
			}, opts.animationSpeed, function() {
				afterTransition();
			});
			
		};
		this.next = function () {
			isAnimating = true;
			itemCurr = itemCurr.next();
			beforeTransition('next');
			sliderUL.animate({
				'left' : (0 - itemCurr.position().left)
			}, opts.animationSpeed, function() {
				afterTransition();
			});
		};
		
		
 		/* CREATE FUNCTION */
		this.create = function () {
			if(!$(this).html()) {
				return false; 
			}
			
			// stop double initialization
			if ($this.data('sappleSingleSlider') == true) {
				return this;
 			}
			// beforeCreateFunction
			if (opts.beforeCreateFunction != null && $.isFunction(opts.beforeCreateFunction)) {
				opts.beforeCreateFunction.call($this);
 			}
			
			//START MAIN CREATE FUNCTIONALITY;

			titles = $('<ul class="titles"><li class="prev"></li><li class="current"></li><li class="next "></li></ul>');
			pagination = $('<div class="pagination"><a href="#" class="prev arrow-left_project">Previous</a><span class="counter"><em class="current"></em> of <em class="total"></em></span><a href="#" class="next arrow-right_project">Next</a></div>');

			$this.addClass('sappleSingleSliderContainer');

			

			sliderItems.css('float', 'left').addClass('slide');
			sliderUL.css({ 
				'position' : 'relative', 
				'overflow' : 'hidden'
			});

			$this.css({
				'position' : 'relative',
				'width' : '100%',
				'overflow' : 'hidden'
			})
			.prepend(titles)
			.append(pagination);

			// Had to put these lines in to get the slider to occupy the correct width with or without the scrollbar
			var hideItems = sliderItems.not(':eq(0)').hide();
			$this.css('width', $this.outerWidth());
			hideItems.show();

			sliderWidth = $this.outerWidth();
			sliderULWidth = 0;

			$(sliderItems).each (function(i) {
				var obj = $(this)
				var width = obj.outerWidth(true);

				obj.attr('data-index', i).width(width);
				sliderULWidth += width;
			});
			sliderUL.width(sliderULWidth);

			titleLIs = titles.find('li');
			btns = pagination.find('a');
			counterCurrent = pagination.find('em.current');
			counterTotal = pagination.find('em.total').text(sliderItems.length);
			// This is necessary as draggable images interfere with the draggable mousemove event
			images.on('dragstart', false);

			itemCurr = itemCurr || $(sliderItems[0]);

			afterTransition();
			beforeTransition();

			// button controller behaviours
			btns.add(titleLIs).on('mouseover', function() {
				
				if ($(this).hasClass('prev'))
					highlight('prev');
				else if ($(this).hasClass('next'))
					highlight('next');
					
			})
			.on('mouseout', function() {
				counterCurrent.text(itemCurr.data('index')+1);
			})
			.on('click', function(e) {
				e.preventDefault();

				if (isAnimating)
					return;

				if ($(this).hasClass('prev'))
					$this.prev();
				else if ($(this).hasClass('next'))
					$this.next();
			});

			// draggable element
			sliderUL[0].addEventListener('mousedown', downHandler);
			sliderUL[0].addEventListener('mouseup', upHandler);
			sliderUL[0].addEventListener('touchstart', downHandler);
			sliderUL[0].addEventListener('touchend', upHandler);


			// Update on window resize for responsiveness
			window.addEventListener('resize', resizeHandler);
			
			//END MAIN CREATE FUNCTIONALITY
 
			// Set plugin flag
			$this.data('sappleSingleSlider', true);
 
			// afterCreateFunction
			if (opts.afterCreateFunction != null && $.isFunction(opts.afterCreateFunction)) {
				opts.afterCreateFunction.call($this);
 			}
			return this;
		};
 				
 		// CREATE FUNCTION CALL
		return this.create();
	};
 
	jQuery.fn.sappleSingleSlider.defaults = {
		animationSpeed : 600,
		swipeDistance : 200,
		beforeCreateFunction : null,
		afterCreateFunction :  null
	};
})(jQuery);