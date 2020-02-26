export default function() {
  const nav = document.getElementById('navigation-home')

  window.addEventListener('scroll', () => {
    if (window.pageYOffset > 100 && !nav.classList.contains('scrolled')) {
      nav.classList.add('scrolled')
    } else if (window.pageYOffset < 101 && nav.classList.contains('scrolled')) {
      nav.classList.remove('scrolled')
    }
  })
}
