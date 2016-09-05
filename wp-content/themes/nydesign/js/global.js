require.config({
	baseUrl: "traktorOMaskin/../wp-content/themes/yeopress/js",
	paths: {
		jquery: "\\vendor\\jquery\\jquery",
		Swiper: "\\vendor\\Swiper\\dist\\js\\swiper",
		"animate.css": "\\vendor\\animate.css\\gulpfile",
		parallax: "\\vendor\\parallax.js",
		"parallax.js": "\\vendor\\parallax.js\\parallax",
		"desandro-matches-selector": "\\vendor\\desandro-matches-selector\\matches-selector",
		"ev-emitter": "\\vendor\\ev-emitter\\ev-emitter",
		"fizzy-ui-utils": "\\vendor\\fizzy-ui-utils\\utils",
		"get-size": "\\vendor\\get-size\\get-size",
		masonry: "\\vendor\\masonry\\",
		video: "\\vendor\\video.js\\dist\\video-js\\video.dev",
		instafeed: "\\vendor\\instafeed.js",
		"instafeed.js": "\\vendor\\instafeed.js\\instafeed"
	}
});

require(['jquery'], function($) {
	console.log('Working!!');
});
