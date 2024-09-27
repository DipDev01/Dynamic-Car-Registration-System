const forminput = document.querySelectorAll('.color_changer').forEach(formin => {
	formin.addEventListener('focus', function(){
		formin.style.backgroundColor = 'yellow'
	})
	formin.addEventListener('blur', function(){
		formin.style.backgroundColor = ''
	})
})
const button = document.querySelectorAll('.button').forEach(buttonco => {
	buttonco.addEventListener('mouseover', function(){
		buttonco.style.backgroundColor = '#5BBCFF'
	})
	buttonco.addEventListener('mouseleave', function(){
		buttonco.style.backgroundColor = ''
	})
})

