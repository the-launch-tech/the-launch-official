require('dotenv').config()

import 'core-js/stable'
import 'regenerator-runtime/runtime'
import AOS from 'aos'
import homeNavScroll from './js/utils/homeNavScroll'
import portfolioPreview from './js/utils/portfolioPreview'
import smoothScrollTo from './js/utils/smoothScrollTo'
import faqAccordion from './js/utils/faqAccordion'
import 'aos/dist/aos.css'
import './scss/main.scss'

const { log, error } = console

class TheLaunch {
  constructor() {
    this.baseUrl = args.base_url
    this.isHomePage = args.is_home_page

    this.preFetch = this.preFetch.bind(this)
    this.loadInit = this.loadInit.bind(this)
    this.loader = null
  }

  preFetch() {}

  loadInit() {
    AOS.init()

    if (this.isHomePage) {
      VANTA.GLOBE({
        el: '#globe-selector',
        mouseControls: true,
        touchControls: true,
        minHeight: 200.0,
        minWidth: 200.0,
        scale: 1.0,
        scaleMobile: 1.0,
        color: 0xfa3939,
        color2: 0x3873b6,
        size: 0.6,
        backgroundColor: 0xf2f2f2,
      })
      homeNavScroll()
      smoothScrollTo()
      portfolioPreview(this.baseUrl, this.loader)
    } else {
      VANTA.DOTS({
        el: '#wave-selector',
        mouseControls: true,
        touchControls: true,
        minHeight: 200.0,
        minWidth: 200.0,
        scale: 1.0,
        scaleMobile: 1.0,
        color: 0xffffff,
        color2: 0xffffff,
        backgroundColor: 0xfa3939,
        size: 5.0,
        spacing: 30.0,
      })
      faqAccordion()
    }
    VANTA.NET({
      el: '#net-selector',
      mouseControls: true,
      touchControls: true,
      color: 0xfa3939,
      backgroundColor: 0xffffff,
      minHeight: 200.0,
      minWidth: 200.0,
      scale: 1.0,
      scaleMobile: 1.0,
      points: 6.0,
      maxDistance: 14.0,
      spacing: 11.0,
    })

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
