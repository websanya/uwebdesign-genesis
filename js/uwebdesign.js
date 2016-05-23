// @codekit-prepend "color-thief.js";

jQuery( window ).load( function() {
	if ( document.getElementsByClassName( 'entry-image' ).length > 0 ) {
		var colorThief = new ColorThief();
		i = 0;
		jQuery( '.entry-header' ).each( function() {
			dominantColors = colorThief.getPalette( document.getElementsByClassName( 'entry-image' )[i], 8 );
			jmax = jmin = dominantColors[0];
			for ( var j = 0; j < dominantColors.length; j++ ) {
				jsum = dominantColors[j][0] + dominantColors[j][1] + dominantColors[j][2];
				if ( jsum < parseInt( jmin[0] + jmin[1] + jmin[2] ) ) {
					jmin = dominantColors[j];
				}
				if ( jsum > parseInt( jmax[0] + jmax[1] + jmax[2] ) ) {
					jmax = dominantColors[j];
				}
			}
			jQuery( this ).css( 'background-color', 'rgb(' + jmin[0] + ',' + jmin[1] + ',' + jmin[2] + ')' );
			jQuery( this ).css( 'color', 'rgb(' + jmax[0] + ',' + jmax[1] + ',' + jmax[2] + ')' );
			jQuery( 'a', this ).css( 'color', 'rgb(' + jmax[0] + ',' + jmax[1] + ',' + jmax[2] + ')' );
			i++;
		} );
	}
} );