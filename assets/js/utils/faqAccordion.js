export default function() {
  const accordion = document.querySelector('.faq-wrapper')

  if (!accordion) {
    return false
  }

  const panes = accordion.querySelectorAll('.faq-item')

  Array.from(panes).map(pane => {
    const question = pane.querySelector('.faq-question-section')

    question.addEventListener('click', e => {
      pane.classList.toggle('active')

      Array.from(panes).map(paneEl => {
        if (paneEl !== pane) {
          paneEl.classList.remove('active')
        }
      })
    })
  })
}
