<?php

/**
 * Customized embed templates.
 */
add_action( 'init', function() {
	remove_action( 'embed_head', 'print_embed_styles' );
	add_action( 'embed_head', 'uwd_embed_styles' );
	remove_action( 'embed_head', 'wp_print_styles', 20 );
	remove_action( 'embed_head', 'print_emoji_detection_script' );
	remove_action( 'embed_head', 'locale_stylesheet' );
	remove_action( 'embed_footer', 'wp_print_footer_scripts', 20 );
} );
function uwd_embed_styles() {
	?>
	<style>
		body, html {
			padding: 0;
			margin: 0;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		*,
		*:before,
		*:after {
			box-sizing: inherit;
		}

		:root {
			font-size: 10px;
		}

		html {
			font-size: 62.5%; /* 10px browser default */
			font-family: -apple-system, sans-serif;
		}

		@media (min-width: 770px) {
			:root {
				font-size: 11px;
			}

			html {
				font-size: 68.75%; /* 11px browser default */
			}
		}

		body {
			font-family: sans-serif;
		}

		.screen-reader-text {
			clip: rect(1px, 1px, 1px, 1px);
			height: 1px;
			overflow: hidden;
			position: absolute !important;
			width: 1px
		}

		.dashicons {
			display: inline-block;
			width: 2rem;
			height: 2rem;
			background-color: transparent;
			background-repeat: no-repeat;
			-webkit-background-size: 2rem 2rem;
			background-size: 2rem;
			background-position: center;
			-webkit-transition: background .1s ease-in;
			transition: background .1s ease-in;
			position: relative;
			top: 0.5rem;
		}

		.dashicons-no {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M15.55%2013.7l-2.19%202.06-3.42-3.65-3.64%203.43-2.06-2.18%203.64-3.43-3.42-3.64%202.18-2.06%203.43%203.64%203.64-3.42%202.05%202.18-3.64%203.43z%27%20fill%3D%27%23fff%27%2F%3E%3C%2Fsvg%3E");
		}

		.dashicons-admin-comments {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M5%202h9q.82%200%201.41.59T16%204v7q0%20.82-.59%201.41T14%2013h-2l-5%205v-5H5q-.82%200-1.41-.59T3%2011V4q0-.82.59-1.41T5%202z%27%20fill%3D%27%2382878c%27%2F%3E%3C%2Fsvg%3E");
		}

		.wp-embed-comments a:hover .dashicons-admin-comments {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M5%202h9q.82%200%201.41.59T16%204v7q0%20.82-.59%201.41T14%2013h-2l-5%205v-5H5q-.82%200-1.41-.59T3%2011V4q0-.82.59-1.41T5%202z%27%20fill%3D%27%230073aa%27%2F%3E%3C%2Fsvg%3E");
		}

		.dashicons-share {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M14.5%2012q1.24%200%202.12.88T17.5%2015t-.88%202.12-2.12.88-2.12-.88T11.5%2015q0-.34.09-.69l-4.38-2.3Q6.32%2013%205%2013q-1.24%200-2.12-.88T2%2010t.88-2.12T5%207q1.3%200%202.21.99l4.38-2.3q-.09-.35-.09-.69%200-1.24.88-2.12T14.5%202t2.12.88T17.5%205t-.88%202.12T14.5%208q-1.3%200-2.21-.99l-4.38%202.3Q8%209.66%208%2010t-.09.69l4.38%202.3q.89-.99%202.21-.99z%27%20fill%3D%27%2382878c%27%2F%3E%3C%2Fsvg%3E");
			display: none;
		}

		.js .dashicons-share {
			display: inline-block;
		}

		.wp-embed-share-dialog-open:hover .dashicons-share {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M14.5%2012q1.24%200%202.12.88T17.5%2015t-.88%202.12-2.12.88-2.12-.88T11.5%2015q0-.34.09-.69l-4.38-2.3Q6.32%2013%205%2013q-1.24%200-2.12-.88T2%2010t.88-2.12T5%207q1.3%200%202.21.99l4.38-2.3q-.09-.35-.09-.69%200-1.24.88-2.12T14.5%202t2.12.88T17.5%205t-.88%202.12T14.5%208q-1.3%200-2.21-.99l-4.38%202.3Q8%209.66%208%2010t-.09.69l4.38%202.3q.89-.99%202.21-.99z%27%20fill%3D%27%230073aa%27%2F%3E%3C%2Fsvg%3E");
		}

		.wp-embed {
			width: 100%;
			padding: 1.9rem;
			font: 400 1.4rem/2rem sans-serif;
			color: black;
			background: white;
			border: 0.1rem solid gainsboro;
			-webkit-box-shadow: 0 0.1rem 0.1rem rgba(0, 0, 0, .05);
			box-shadow: 0 0.1rem 0.1rem rgba(0, 0, 0, .05);
			overflow: auto;
			zoom: 1;
		}

		.wp-embed a {
			color: steelblue;
			text-decoration: none
		}

		.wp-embed a:hover {
			text-decoration: underline
		}

		.wp-embed-featured-image {
			margin-bottom: 2rem;
		}

		.wp-embed-featured-image img {
			width: 100%;
			height: auto;
			border: none;
			display: block;
		}

		.wp-embed-featured-image.square {
			/*float: left;*/
			/*max-width: 15rem;*/
			/*margin-right: 2rem;*/
		}

		@media (min-width: 400px) {
			.wp-embed-featured-image.square {
				float: left;
				max-width: 15rem;
				margin-right: 2rem;
			}
		}

		.wp-embed p {
			margin: 0
		}

		p.wp-embed-heading {
			margin: 0 0 1rem;
			font-weight: 700;
			font-size: 2rem;
			line-height: 2.5rem;
		}

		.wp-embed .wp-embed-more {
			color: crimson;
		}

		.wp-embed-footer {
			display: table;
			width: 100%;
			margin-top: 3rem;
		}

		.wp-embed-site-icon {
			position: absolute;
			top: 50%;
			left: 0;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
			height: 2.5rem;
			width: 2.5rem;
			border: 0
		}

		.wp-embed-site-title {
			font-weight: 700;
			line-height: 2.5rem;
		}

		.wp-embed-site-title a {
			position: relative;
			display: inline-block;
			padding-left: 3.5rem;
		}

		.wp-embed-meta, .wp-embed-site-title {
			display: table-cell;
		}

		.wp-embed-meta {
			text-align: right;
			white-space: nowrap;
			vertical-align: middle;
		}

		.wp-embed-comments, .wp-embed-share {
			display: inline;
		}

		.wp-embed-comments a, .wp-embed-share-tab-button {
			display: inline-block;
		}

		.wp-embed-meta a:hover {
			text-decoration: none;
			color: steelblue;
		}

		.wp-embed-comments a {
			line-height: 2.5rem;
		}

		.wp-embed-comments + .wp-embed-share {
			margin-left: 1rem;
		}

		.wp-embed-share-dialog {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #222;
			background-color: rgba(10, 10, 10, .9);
			color: #fff;
			opacity: 1;
			-webkit-transition: opacity .25s ease-in-out;
			transition: opacity .25s ease-in-out;
		}

		.wp-embed-share-dialog.hidden {
			opacity: 0;
			visibility: hidden;
		}

		.wp-embed-share-dialog-close, .wp-embed-share-dialog-open {
			margin: -0.5rem 0 0;
			padding: 0;
			background: 0 0;
			border: none;
			cursor: pointer;
			outline: 0;
		}

		.wp-embed-share-dialog-close .dashicons, .wp-embed-share-dialog-open .dashicons {
			padding: 0.25rem;
		}

		.wp-embed-share-dialog-open .dashicons {
			top: 0.4rem;
		}

		.wp-embed-share-dialog-close:focus .dashicons, .wp-embed-share-dialog-open:focus .dashicons {
			-webkit-box-shadow: 0 0 0 1px steelblue;
			box-shadow: 0 0 0 1px steelblue;
			-webkit-border-radius: 100%;
			border-radius: 100%;
		}

		.wp-embed-share-dialog-close {
			position: absolute;
			top: 2rem;
			right: 2rem;
			font-size: 2rem;
		}

		.wp-embed-share-dialog-close:hover {
			text-decoration: none
		}

		.wp-embed-share-dialog-close .dashicons {
			height: 2rem;
			width: 2rem;
			-webkit-background-size: 2rem 2rem;
			background-size: 2rem;
		}

		.wp-embed-share-dialog-content {
			height: 100%;
			-webkit-transform-style: preserve-3d;
			transform-style: preserve-3d;
			overflow: hidden;
		}

		.wp-embed-share-dialog-text {
			margin-top: 2rem;
			padding: 2rem;
		}

		.wp-embed-share-tabs {
			margin: 0 0 2rem;
			padding: 0;
			list-style: none;
		}

		.wp-embed-share-tab-button button {
			margin: 0;
			padding: 0;
			border: none;
			background: 0 0;
			font-size: 1.6rem;
			line-height: 1.3;
			color: #aaa;
			cursor: pointer;
			-webkit-transition: color .1s ease-in;
			transition: color .1s ease-in;
		}

		.wp-embed-share-tab-button [aria-selected=true], .wp-embed-share-tab-button button:hover {
			color: #fff
		}

		.wp-embed-share-tab-button + .wp-embed-share-tab-button {
			margin: 0 0 0 1rem;
			padding: 0 0 0 0.9rem;
			border-left: 0.1rem solid gainsboro;
		}

		.wp-embed-share-tab[aria-hidden=true] {
			display: none;
		}

		p.wp-embed-share-description {
			margin: 0;
			font-size: 14px;
			line-height: 1;
			font-style: italic;
			color: gainsboro;
		}

		.wp-embed-share-input {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			width: 100%;
			border: none;
			height: 2rem;
			margin: 0 0 1rem;
			padding: 0 0.5rem;
			font: 400 1.4rem/2rem sans-serif;
			resize: none;
			cursor: text;
		}

		textarea.wp-embed-share-input {
			height: 6rem;
		}

		html[dir=rtl] .wp-embed-featured-image.square {
			float: right;
			margin-right: 0;
			margin-left: 2rem;
		}

		html[dir=rtl] .wp-embed-site-title a {
			padding-left: 0;
			padding-right: 35px
		}

		html[dir=rtl] .wp-embed-site-icon {
			margin-right: 0;
			margin-left: 1rem;
			left: auto;
			right: 0;
		}

		html[dir=rtl] .wp-embed-meta {
			text-align: left;
		}

		html[dir=rtl] .wp-embed-share {
			margin-left: 0;
			margin-right: 1rem;
		}

		html[dir=rtl] .wp-embed-share-dialog-close {
			right: auto;
			left: 2rem;
		}

		html[dir=rtl] .wp-embed-share-tab-button + .wp-embed-share-tab-button {
			margin: 0 1rem 0 0;
			padding: 0 0.9rem 0 0;
			border-left: none;
			border-right: 0.1rem solid gainsboro;
		}
	</style>
	<?php
}