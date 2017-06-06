
(function($) {
  /**
   * @todo
   */
  
  
  Drupal.behaviors.bizsearchDropdownMenu = {
    attach: function (context) {
        $('.dropdown').hover(
        function () {
			$(this).addClass('open');
		},
		
        function () {
			$(this).removeClass('open');
		}
		);
    }
  };


Drupal.behaviors.bizsearchConditionText = {
    attach: function(context, settings){
        $("#edit-commerce-node-checkout-product").change(function() {
            var selected_text = $("#edit-commerce-node-checkout-product option:selected").text();
            $("#edit-field-commerce-node-checkout-val-und-0-value").val(selected_text).change();
            }).change();
        }};
  
  
  Drupal.behaviors.bizsearchEqualHeights = {
    attach: function (context) {
      $('body', context).once('views-row-equalheights', function () {
        $(window).resize(function() {
          $($('.view-list-business-grid .view-content, .view-list-modern .view-content, .view-events .view-content').get().reverse()).each(function () {
            var elements = $(this).children('.views-row').css('height', '');
            if($(window).width() > 960) {
              var tallest = 0;
              elements.each(function () {    
                if ($(this).height() > tallest) {
                  tallest = $(this).height();
                }
              }).each(function() {
                if (($(this).height() < tallest) || ($(this).height() == tallest)) {
                  $(this).css('height', tallest);
				  $('.views-row-inner',this).css('height', tallest);
                }
              });
			}
			else {
				elements.each(function () {
				  $(this).css('height', 'auto');
				  $('.views-row-inner',this).css('height', 'auto');
				});
			}
          });
        });
      });
    }
  };
  
  Drupal.behaviors.bizsearchGalleryPage = {
    attach: function (context) {
      $('.block-featured-business .views-field-field-image, .view-member .views-field-picture, .view-meet-our-team .views-field-field-image,.view-events .views-field-field-event-image').hover(
        function () {
		  $(this).addClass('hover');
        },
        function () {
		  $(this).removeClass('hover');
        }
      );
    }
  };
  Drupal.behaviors.bizsearchThemeColors = {
    attach: function (context) {
      $('body', context).once('block-theme-colors-showhide', function () {													   
        jQuery('.block-theme-colors .close').click(function(e){
		  e.preventDefault();
		  jQuery('.block-theme-colors .block-theme-color-content ').hide();
		  jQuery(this).hide();
		  jQuery('.block-theme-colors .open').show();
		});
		jQuery('.block-theme-colors .open').click(function(e){
          e.preventDefault();
		  jQuery('.block-theme-colors .block-theme-color-content ').show();
		  jQuery(this).hide();
		  jQuery('.block-theme-colors .close').show();
		});  
      });
    }
  };  
  Drupal.behaviors.bizsearchSearchResult = {
    attach: function (context) {
        $(window).bind('resize', function() {
				var searchResult = document.querySelector("#list-index-business-search-result"); 
				var searchMap = document.querySelector("#list-index-business-search-map"); 
				var position = getPosition(searchResult);
				var curHeight = $(window).height() - position.y - 20;
				var windowWidth = $(window).width();
				var searchResultWidth = $("#list-index-business-search-result").width();
				var mapWidth = windowWidth - searchResultWidth - 40;
				if (windowWidth > 768) {
				  searchResult.style.height= curHeight + "px";		
				  searchMap.style.height= curHeight + "px";	
				  searchMap.style.width= mapWidth + "px";
				}
				else {
				  searchResult.style.height= "auto";		
				  searchMap.style.height= "auto";
				  searchMap.style.width= "100%";
				}
				
				function getPosition(el) {
				  var xPos = 0;
				  var yPos = 0;
				 
				  while (el) {
					if (el.tagName == "BODY") {
					  // deal with browser quirks with body/window/document and page scroll
					  var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
					  var yScroll = el.scrollTop || document.documentElement.scrollTop;
				 
					  xPos += (el.offsetLeft - xScroll + el.clientLeft);
					  yPos += (el.offsetTop - yScroll + el.clientTop);
					} else {
					  // for all other non-BODY elements
					  xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
					  yPos += (el.offsetTop - el.scrollTop + el.clientTop);
					}
				 
					el = el.offsetParent;
				  }
				  return {
					x: xPos,
					y: yPos
				  };
				}

        }).trigger('resize');

    }
  };
})(jQuery); 
