var supportsWebP = (function () {
'use strict';

var index = new Promise(function (resolve) {
	var image = new Image();
	image.onerror = function () { return resolve(false); };
	image.onload = function () { return resolve(image.width === 1); };
	image.src = 'data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=';
}).catch(function () { return false; });

return index;

}());

window.supportsWebP.then(supported => {
	var body = document.getElementsByTagName("body")[0];

	if (supported) {
		console.log('suporte para WebP!');
		body.classList.add('suporte-webp');
	} else {
		console.log('sem suporte para WebP!');
	}
});