require('dotenv').config()

import 'core-js/stable'
import 'regenerator-runtime/runtime'
import AOS from 'aos'
import homeNavScroll from './js/utils/homeNavScroll'
import portfolioPreview from './js/utils/portfolioPreview'
import smoothScrollTo from './js/utils/smoothScrollTo'
import faqAccordion from './js/utils/faqAccordion'
import logoToggle from './js/utils/logoToggle'
import vantaUtils from './js/utils/vantaUtils'
import 'aos/dist/aos.css'
import './scss/main.scss'

const { log, error } = console

class TheLaunch {
  constructor() {
    this.baseUrl = args.base_url
    this.isHomePage = args.is_home_page
    this.is404Page = args.is_404
    this.isContactPage = args.is_contact_page

    this.preFetch = this.preFetch.bind(this)
    this.loadInit = this.loadInit.bind(this)
    this.loader = null
  }

  preFetch() {}

  loadInit() {
    AOS.init()

    if (this.isHomePage) {
      homeNavScroll()
      smoothScrollTo()
      portfolioPreview(this.baseUrl, this.loader)
    }

    faqAccordion()

    if (this.isHomePage) {
      VANTA.GLOBE(vantaUtils.globe)
    } else if (this.is404Page) {
      VANTA.GLOBE(vantaUtils.globe404)
    } else {
      VANTA.DOTS(vantaUtils.dots)
    }

    if (!this.is404Page) {
      VANTA.NET(vantaUtils.net)
    }

    logoToggle()

    this.loader = document.getElementById('async-loader')
    setTimeout(() => {
      this.loader.classList.remove('loading')
    }, 1000)
  }
}

const Launch = new TheLaunch()

Launch.preFetch()

window.addEventListener('load', () => {
  Launch.loadInit()
})
