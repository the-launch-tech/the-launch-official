import getYPos from './getYPos'

export default function() {
  const anchors = [
    { el: document.querySelector('.nav-service-anchor'), target: '.service-preview-wrapper' },
    { el: document.querySelector('.nav-portfolio-anchor'), target: '.portfolio-preview-wrapper' },
    { el: document.querySelector('.home-services-button'), target: '.service-preview-wrapper' },
    { el: document.querySelector('.home-portfolio-button'), target: '.portfolio-preview-wrapper' },
    {
      el: document.querySelector('.home-about-button'),
      target: window.location.origin + '/about-the-launch',
    },
  ]

  anchors.map(({ el, target }) => {
    if (!!el) {
      el.addEventListener('click', e => {
        if (target.includes('http')) {
          window.location.href = target
        } else {
          window.scrollTo({ top: getYPos(document.querySelector(target)), behavior: 'smooth' })
        }
      })
    }
  })
}
