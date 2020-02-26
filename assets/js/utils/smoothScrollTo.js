import getYPos from './getYPos'

export default function() {
  const serviceAnchor = document.querySelector('.nav-service-anchor')
  const portfolioAnchor = document.querySelector('.nav-portfolio-anchor')

  serviceAnchor &&
    serviceAnchor.addEventListener('click', e => {
      window.scrollTo({
        top: getYPos(document.querySelector('.service-preview-wrapper')),
        behavior: 'smooth',
      })
    })

  portfolioAnchor &&
    portfolioAnchor.addEventListener('click', e => {
      window.scrollTo({
        top: getYPos(document.querySelector('.portfolio-preview-wrapper')),
        behavior: 'smooth',
      })
    })
}
