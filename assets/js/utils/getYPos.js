export default function(el) {
  var curtop = 0
  if (el.offsetParent) {
    do {
      curtop += el.offsetTop
    } while ((el = el.offsetParent))
    return [curtop]
  }
}
