class StickyMenu {
  constructor() {
    this.header = document.querySelector('.top-bar')
    this.interiorMenu = document.getElementById('interior-menu')
    this.topBarContainer = document.querySelector('.top-bar-container')
    this.topBarBranding = document.querySelector('.top-bar-branding')
    this.phantomColumn = document.querySelector('.phantom-column')
    this.sideToggle = document.querySelector('.side-toggle')
    this.searchToggle = document.querySelector('.search-toggle')

    this.break = window.location.pathname === '/' ? 80 : 130

    window.addEventListener('scroll', e => this.handleScroll(e))
  }

  handleScroll(e) {
    if (this.break > window.pageYOffset && this.header.classList.contains('sticky')) {
      this.removeSticky()
    } else if (this.break < window.pageYOffset && !this.header.classList.contains('sticky')) {
      this.addSticky()
    }
  }

  removeSticky() {
    this.header.classList.remove('sticky')
  }

  addSticky() {
    this.header.classList.add('sticky')
  }
}

jQuery(() => {
  let sticky = new StickyMenu()
})
