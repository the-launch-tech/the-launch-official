export default function() {
  const nav = document.getElementById('navigation-home')
  const logo = document.querySelector('#logo-home img')

  window.addEventListener('scroll', () => {
    if (window.pageYOffset > 100 && !nav.classList.contains('scrolled')) {
      nav.classList.add('scrolled')
      logo.src = window.location.origin + '/wp-content/uploads/2020/02/logo-light.png'
    } else if (window.pageYOffset < 101 && nav.classList.contains('scrolled')) {
      nav.classList.remove('scrolled')
      logo.src = window.location.origin + '/wp-content/uploads/2020/02/logo-dark.png'
    }
  })
}
