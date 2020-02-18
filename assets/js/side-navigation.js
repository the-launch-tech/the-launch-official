class KenanSideNavigation {
  constructor() {
    this.inAction = false
    this.windowWidth = window.innerWidth
    this.DOM = {}

    console.log(_ksn)

    this.page = document.getElementById(_ksn.page_id)

    this.ksn_overlay = document.getElementById(_ksn.overlay_id)
    this.ksn_open = document.getElementById(_ksn.open_id)
    this.ksn_close = document.getElementById(_ksn.close_id)
    this.ksn_wrapper = document.getElementById(_ksn.container_id)

    if (!this.ksn_wrapper) return false

    this.ksn_menu = this.ksn_wrapper.querySelector('ul')

    if (!this.ksn_menu) return false

    this.hasChildren = this.ksn_menu.querySelectorAll('.menu-item-has-children')

    for (let i = 0; i < this.hasChildren.length; i++) {
      this.DOM[i] = {}
      this.DOM[i]['li'] = this.hasChildren[i]
      const iDOM = document.createElement('i')
      iDOM.classList.add('fas')
      iDOM.classList.add('fa-chevron-right')
      this.DOM[i]['li'].appendChild(iDOM)
      this.DOM[i]['ul'] = this.DOM[i]['li'].querySelector('ul')
      this.DOM[i]['i'] = this.DOM[i]['li'].querySelector('i')
      this.DOM[i]['i'].addEventListener('click', e => this.toggleChild(e, i))
    }

    window.addEventListener('resize', () => this.handleResize())

    this.ksn_open.addEventListener('click', () => this.allOn())

    this.ksn_close.addEventListener('click', () => this.allOff())

    this.ksn_overlay.addEventListener('click', () => this.allOff())
  }

  handleResize() {
    const width = window.innerWidth
    const breakPoint = _ksn.breakpoint

    if (width > breakPoint - 1 && this.windowWidth < breakPoint) this.allOff()

    this.windowWidth = width
  }

  allOn() {
    this.cursorOn()
    this.overlayOn()
    this.menuOn()
  }

  allOff() {
    this.cursorOff()
    this.overlayOff()
    this.menuOff()
  }

  hasClass() {
    return this.ksn_wrapper.classList.contains('active')
  }

  cursorOn() {
    if (!this.hasClass()) {
      document.body.style.cursor = 'crosshair'
      this.ksn_overlay.style.cursor = 'crosshair'
      this.page.style.cursor = 'crosshair'
      this.ksn_wrapper.style.cursor = 'auto'
    }
  }

  cursorOff() {
    if (this.hasClass()) {
      document.body.style.cursor = 'auto'
      this.ksn_overlay.style.cursor = 'auto'
      this.page.style.cursor = 'auto'
    }
  }

  overlayOn() {
    !this.hasClass() &&
      anime({
        targets: this.ksn_overlay,
        opacity: 1,
        easing: 'linear',
        begin: () => {
          this.ksn_overlay.style.visibility = 'visible'
          this.ksn_overlay.classList.add('active')
        },
      })
  }

  overlayOff() {
    this.hasClass() &&
      anime({
        targets: this.ksn_overlay,
        opacity: 0,
        easing: 'linear',
        begin: () => this.ksn_overlay.classList.remove('active'),
        complete: () => (this.ksn_overlay.style.visibility = 'hidden'),
      })
  }

  menuOn() {
    !this.hasClass() &&
      anime({
        targets: this.ksn_wrapper,
        translateX: [
          { value: '100%', duration: 0, delay: 0, elasticity: 0 },
          { value: '0', duration: parseInt(_ksn.slide_in_time), delay: 0, elasticity: 0 },
        ],
        easing: 'easeInOutQuad',
        begin: () => {
          this.ksn_wrapper.style.visibility = 'visible'
          this.ksn_wrapper.classList.add('active')
        },
      })
  }

  menuOff() {
    this.hasClass() &&
      anime({
        targets: this.ksn_wrapper,
        translateX: [
          { value: '0', duration: 0, delay: 0, elasticity: 0 },
          { value: '100%', duration: parseInt(_ksn.slide_out_time), delay: 0, elasticity: 0 },
        ],
        easing: 'linear',
        begin: () => this.ksn_wrapper.classList.remove('active'),
        complete: () => (this.ksn_wrapper.style.visibility = 'hidden'),
      })
  }

  toggleChild(e, i) {
    e.preventDefault()

    if (this.inAction) return false

    this.DOM[i]['ul'].classList.contains('dropped') ? this.close(i) : this.open(i)
  }

  open(i) {
    anime({
      targets: this.DOM[i]['ul'],
      height: '100%',
      opacity: 1,
      duration: 350,
      easing: 'easeInOutQuad',
      begin: () => {
        this.DOM[i]['ul'].style.visibility = 'visible'
        this.inAction = true
        anime({
          targets: this.DOM[i]['i'],
          rotate: 180,
          duration: 150,
        })
      },
      complete: () => {
        this.DOM[i]['ul'].classList.add('dropped')
        this.inAction = false
      },
    })
  }

  close(i) {
    anime({
      targets: this.DOM[i]['ul'],
      height: 0,
      duration: 150,
      opacity: 0,
      easing: 'easeInOutQuad',
      begin: () => {
        this.inAction = true
        anime({
          targets: this.DOM[i]['i'],
          rotate: 0,
          duration: 150,
        })
      },
      complete: () => {
        this.DOM[i]['ul'].style.visibility = 'hidden'
        this.DOM[i]['ul'].classList.remove('dropped')
        this.inAction = false
      },
    })
  }
}

jQuery(() => {
  console.log(_ksn)
  const nav = document.getElementById(_ksn.overlay_id)
  const setClass = nav ? new KenanSideNavigation() : null
})
