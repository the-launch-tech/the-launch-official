class HomeMenu {
  constructor(menu) {
    console.log(menu)
    this.withChildren = menu.querySelectorAll('.menu-item-has-children')

    if (!this.withChildren) return false

    for (let i = 0; i < this.withChildren.length; i++) {
      this.withChildren[i].addEventListener('mouseenter', e => this.revealChild(e, i))
      this.withChildren[i].addEventListener('mouseleave', e => this.hideChild(e, i))
    }
  }

  revealChild(e, i) {
    e.preventDefault()

    const child = this.withChildren[i].querySelector('ul')

    anime({
      targets: child,
      duration: 150,
      easing: 'easeInOutQuad',
      opacity: 1,
      translateY: [20, 0],
      begin: () => {
        child.style.display = 'flex'
      },
    })
  }

  hideChild(e, i) {
    e.preventDefault()

    const child = this.withChildren[i].querySelector('ul')

    anime({
      targets: child,
      duration: 150,
      easing: 'easeInOutQuad',
      opacity: 0,
      translateY: [0, 20],
      complete: () => {
        child.style.display = 'none'
      },
    })
  }
}

jQuery(() => {
  const menu = document.getElementById('home-menu')
  const homeMenu = menu ? new HomeMenu(menu) : null
})
