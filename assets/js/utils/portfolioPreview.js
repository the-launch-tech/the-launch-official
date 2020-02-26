import axios from 'axios'

const { log, error } = console

export default function(baseUrl, loader) {
  let paged = 1
  const content = document.getElementById('portfolio-preview-content')
  const loadMore = document.getElementById('portfolio-preview-load')

  if (!loadMore || !content) {
    return false
  }

  loadMore.addEventListener('click', e => {
    e.preventDefault()

    paged += 1

    axios
      .get(baseUrl + '/wp-json/thelaunch/portfolio-preview', {
        params: { paged },
      })
      .then(({ data }) => {
        content.innerHTML += data.html
        return data
      })
      .then(data => {
        if (paged >= data.max_num_pages) {
          loadMore.style.display = 'none'
        }
      })
      .then(() => {
        window.scrollTo({
          top: window.pageYOffset + 400,
          behavior: 'smooth',
        })
      })
      .catch(error)
  })
}
