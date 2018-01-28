(function() {
	'use strict';

	function confirmCancel(a) {
		if (!confirm('Loobuda?')) return;
		window.location.href = a.href;
	}

	window.onload = function() {
		var links = document.querySelectorAll('[data-control="cancel-link"]');
		
		for (var i = 0; i < links.length; i++) {
			links[i].addEventListener('click', function(e) {
				e.preventDefault();
				confirmCancel(e.target);
			});
		}
	};
})();
