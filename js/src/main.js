

// function to wrap the first [numWords] in [tag]
jQuery.fn.wrapStart = function ( numWords, tag ) { 

	if ( typeof( tag ) == 'undefined' ) {
		tag = 'span';
	}
    var node = this.contents().filter(function () { 
            return this.nodeType == 3 
        }).first(),
        text = node.text(),
        first = text.split(" ", numWords).join(" ");

    if (!node.length)
        return;

    node[0].nodeValue = text.slice(first.length);
    node.before('<' + tag + '>' + first + '</' + tag + '>');

};



// onload
jQuery(document).ready(function($){

	var menu = $( 'header nav' ),
		menu_toggle = menu.find( 'button.menu-toggle' ),
		menu_ul = menu.find( '.nav-menu' );


	menu_toggle.click(function(){

		if ( menu_ul.is( ':visible' ) ) {
			menu_ul.hide();
		} else {
			menu_ul.show();
		}

		menu_ul.find( 'a' ).click(function(){
			var submenu = $( this ).next( 'ul' );
			if ( !submenu.is( ':visible' ) ) {
				event.preventDefault();
				submenu.show();
			}
		});

	});

	$( '.spotlight' ).fitVids();
	$( '.content' ).fitVids();

	$( 'footer nav li a' ).each(function(){
		$( this ).wrapStart( 1 );
	});



	// select the footer and colophon only once
	var colophon = $( 'div.colophon' );
	var footer = $( 'footer.footer' );
	var footer_badge = $( '.footer-badge' );

	// if the window is wide enough, tack a margin onto the colophon
	if ( $(window).width() > 1099 ) {
		
		colophon.css( 'margin-top', footer.height() + parseInt( footer.css( 'padding-top' ) ) + parseInt( footer.css( 'padding-bottom' ) ) );

		$( window ).scroll(function(){

			// get the document and window heights
			var doc_height = $( document ).height();
			var win_height = $( window ).height();

			// calculate colophon height including padding
			var col_height = colophon.height() + 
				footer_badge.height() +
				parseInt( colophon.css( 'padding-top' ) ) + 
				parseInt( colophon.css( 'padding-bottom' ) );

			// get current scrolling position
			var scroll_position = $( window ).scrollTop();

			// calculate footer height including padding
			var footer_height = $( 'footer.footer' ).height() + 
				parseInt( footer.css( 'padding-top' ) ) + 
				parseInt( footer.css( 'padding-bottom' ) );

			// if we've scrolled to the point where we can see the 
			// colophon content, snap the footer back to a static position
			// and remove the margin on the colophon.
			if ( doc_height - win_height - col_height < scroll_position ) {
				footer.removeClass( 'fixed' );
				$( "div.colophon" ).css( 'margin-top', 0 );
			} else {
				footer.addClass( 'fixed' );
				$( "div.colophon" ).css( 'margin-top', footer_height );
			}
		});

	}

});


