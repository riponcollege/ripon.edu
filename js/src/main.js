

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

});

