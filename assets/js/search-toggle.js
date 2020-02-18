class SearchToggle {
  constructor() {
    this.inAction = false

    this.overlay = document.querySelector('.search-wrap-overlay')
    this.toggle = document.querySelectorAll('.search-toggle')

    if (this.toggle) {
      for (let i = 0; i < this.toggle.length; i++) {
        this.toggle[i].addEventListener('click', e => this.handleToggle(e, i))
      }
    }
  }

  handleToggle(e, i) {
    e.preventDefault()

    if (this.inAction) return false

    if (!this.overlay.classList.contains('active')) {
      anime({
        targets: this.overlay,
        duration: 300,
        opacity: 1,
        translateY: [0, `100%`],
        easing: 'easeInOutQuad',
        begin: () => {
          this.overlay.classList.add('active')
          this.inAction = true
        },
        complete: () => {
          this.inAction = false
        },
      })
    } else {
      anime({
        targets: this.overlay,
        duration: 300,
        opacity: 0,
        translateY: [`100%`, 0],
        easing: 'easeInOutQuad',
        begin: () => {
          this.overlay.classList.remove('active')
          this.inAction = true
        },
        complete: () => {
          this.inAction = false
        },
      })
    }
  }
}

jQuery(() => {
  let toggle
  if (document.querySelector('.search-wrap-overlay')) toggle = new SearchToggle()
})
