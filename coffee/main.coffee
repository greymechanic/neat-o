$(window).trigger('resize').trigger 'scroll'

$(document).ready ->

	document.querySelector('#nav-toggle').addEventListener 'click', ->
		@classList.toggle 'active'

