<?php header( 'Content-type: text/css; charset: UTF-8' ); ?>

html {
	box-sizing: border-box;
}
*,
*:before,
*:after {
	box-sizing: inherit;
}
*:focus {
	outline: 0;
}
body {
	background: #fff;
	color: #666;
	font-family: sans-serif;
	font-size: 14px;
	line-height: 1.7;
}
h1, h2, h3, h4, h5, h6 {
	margin: 2rem 0 1rem;
	color: #333;

	font-style: normal;
	font-weight: normal;
	letter-spacing: 0;
	text-decoration: none;
	text-transform: none;
}
h1:first-child, h2:first-child, h3:first-child, h4:first-child, h5:first-child, h6:first-child {
	margin-top: 0;
}
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
	color: inherit;
}
h1 {
	font-size: 175%;
	line-height: 1.4;
}
h2 {
	font-size: 160%;
	line-height: 1.4;
}
h3 {
	font-size: 145%;
	line-height: 1.5;
}
h4 {
	font-size: 130%;
	line-height: 1.5;
}
h5 {
	font-size: 115%;
	line-height: 1.6;
}
h6 {
	font-size: 100%;
}
p {
	margin: 0 0 20px;
}
a {
	text-decoration: none;
	transition: all 0.25s ease-in-out;
}
a:hover,
a:focus,
a:active {
	color: #333;
	outline: 0;
}
dfn,
cite,
em,
i {
	font-style: italic;
}
blockquote {
	margin: 0 0 20px;
}
address {
	margin: 0 0 20px;
}
pre {
	background: #eee;
	font-family: "Courier 10 Pitch", Courier, monospace;
	font-size: 15px;
	font-size: 0.9375rem;
	line-height: 1.6;
	margin: 0 0 1.5em;
	max-width: 100%;
	overflow: auto;
	padding: 1.2em;
}
code,
kbd,
tt,
var {
	font-family: Monaco, Consolas, "Andale Mono", "DejaVu Sans Mono", monospace;
	font-size: 15px;
	font-size: 0.9375rem;
}
abbr,
acronym {
	border-bottom: 1px dotted #666;
	cursor: help;
}
mark,
ins {
	background: #fff9c0;
	text-decoration: none;
}
big {
	font-size: 125%;
}
blockquote:before,
blockquote:after,
q:before,
q:after {
	content: "";
}
blockquote,
q {
	quotes: "" "";
}
blockquote {
	background-color: #f3f3f3;
	padding: 20px 30px;
	font-size: 120%;
	font-style: italic;
}
blockquote p:last-child {
	margin-bottom: 0;
}
hr {
	background-color: #eee;
	border: 0;
	height: 1px;
	margin: 40px 0;
}
ul,
ol {
	margin: 0 0 20px 30px;
	padding: 0;
}
ul {
	list-style: disc;
}
ol {
	list-style: decimal;
}
li > ul,
li > ol {
	margin-bottom: 0;
	margin-left: 20px;
}
dt {
	font-weight: bold;
}
dd {
	margin: 0 0 20px 20px;
}
img {
	height: auto;
	max-width: 100%;
}
table {
	margin: 0 0 20px;
	width: 100%;
}
embed,
iframe,
object {
	max-width: 100%;
}

body {
	max-width: 1080px;
	margin: 1em;
	font-family: <?php echo urldecode( $_REQUEST[ 'typography_body_font_family' ] ); ?>;
}
a {
	color: <?php echo urldecode( $_REQUEST[ 'color_accent' ] ); ?>;
}
h1, h2, h3, h4, h5, h6 {
	font-family: <?php echo urldecode( $_REQUEST[ 'typography_headings_font_family' ] ); ?>;
}

/* Alignment */
.alignleft {
	display: inline;
	float: left;
	margin: 7px 20px 7px 0;
}
.alignright {
	display: inline;
	float: right;
	margin: 7px 0 7px 20px;
}
.aligncenter {
	clear: both;
	display: block;
	margin: 7px auto;
}

/* Caption */
.wp-caption {
	margin-bottom: 20px;
	max-width: 100%;
}
.wp-caption img[class*="wp-image-"] {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.wp-caption .wp-caption-text {
	margin: 0.8075em 0;
}
.wp-caption-text {
	text-align: center;
}

/* Gallery */
.gallery {
	margin-bottom: 20px;
}
.gallery-item {
	display: inline-block;
	text-align: center;
	vertical-align: top;
	width: 100%;
}
.gallery-columns-2 .gallery-item {
	max-width: 50%;
}
.gallery-columns-3 .gallery-item {
	max-width: 33.33%;
}
.gallery-columns-4 .gallery-item {
	max-width: 25%;
}
.gallery-columns-5 .gallery-item {
	max-width: 20%;
}
.gallery-columns-6 .gallery-item {
	max-width: 16.66%;
}
.gallery-columns-7 .gallery-item {
	max-width: 14.28%;
}
.gallery-columns-8 .gallery-item {
	max-width: 12.5%;
}
.gallery-columns-9 .gallery-item {
	max-width: 11.11%;
}
.gallery-caption {
	display: block;
}

/* Smiley */
.page-content .wp-smiley,
.entry-content .wp-smiley,
.comment-content .wp-smiley {
	border: none;
	margin-bottom: 0;
	margin-top: 0;
	padding: 0;
}

.sticky {}
.bypostauthor {}

.mce-item-table, .mce-item-table td, .mce-item-table th, .mce-item-table caption {
	border: none;
}
.mce-item-table {
	border-bottom: 1px solid #eee;
}
.mce-item-table th, .mce-item-table td {
	padding: 9px 12px;
	border-top: 1px solid #eee;
}