window.addEventListener('load', () => {
	const { log, error } = console

	log(GLOSSARY)

	const input = document.getElementById('search_glossary_input')
	const submit = document.getElementById('search_glossary')
	const reset = document.getElementById('reset_glossary')
	const results = document.getElementById('results_glossary')
	const details = document.getElementById('details_glossary')

	if (!submit || !reset || !input || !results || !details) {
		log('submit, reset, input, results, details: ', submit, reset, input, results, details)
		return false
	}
	
	reset.addEventListener('click', e => {
		results.innerHTML = '';
		details.innerHTML = '';
		input.value = '';
	})

	submit.addEventListener('click', e => {
		e.preventDefault()

		jQuery.ajax({
			url: GLOSSARY.url,
			type: 'GET',
			dataType: 'HTML',
			data: {
				value: input.value,
				security: GLOSSARY.search_security,
				action: GLOSSARY.search_action,
			},
			success: search => {
				if (search[search.length - 1] === '0') {
					search = search.substr(0, search.length - 1)
				}

				results.innerHTML = search

				const resultEls = results.querySelectorAll('li')

				if (resultEls) {
					Array.from(resultEls).map(el => {
						el.addEventListener('click', e => {
							e.preventDefault()

							jQuery.ajax({
								url: GLOSSARY.url,
								type: 'GET',
								dataType: 'HTML',
								data: {
									id: el.getAttribute('data-id'),
									security: GLOSSARY.details_security,
									action: GLOSSARY.details_action,
								},
								success: item => {
									if (item[item.length - 1] === '0') {
										item = item.substr(0, item.length - 1)
									}

									Array.from(resultEls).map(resEl =>
															  resEl === el
															  ? resEl.classList.add('selected')
															  : resEl.classList.remove('selected')
															 )
									details.innerHTML = item
								},
								error,
							})
						})
					})
				}
			},
			error,
		})
	})
})
