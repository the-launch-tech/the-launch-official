import {
  Scene,
  PerspectiveCamera,
  WebGLRenderer,
  HemisphereLight,
  MeshPhongMaterial,
  SphereGeometry,
  Object3D,
  DirectionalLight,
  Mesh,
  Texture,
} from 'three'
import { geoMercator, geoPath, geoEquirectangular, geoOrthographic } from 'd3-geo'
import { feature } from 'topojson-client'

export default worldMap => {
  let start = (root, renderer, scene, camera, start) => {
    animate(root, renderer, scene, camera, start)
  }

  let stop = () => {
    tm.kill()
  }

  let animate = (root, renderer, scene, camera, start) => {
    root.rotation.y += 0.0075
    renderer.render(scene, camera)

    setTimeout(() => {
      requestAnimationFrame(e => start(root, renderer, scene, camera, start))
    }, 30)
  }

  let globe = document.getElementById('globe-selector')

  if (!globe || !worldMap) {
    return false
  }

  console.log(globe, worldMap)

  let scene = new Scene()
  let camera = new PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 6000)
  let renderer = new WebGLRenderer({ antialias: true, alpha: true })
  let light = new HemisphereLight(0xffffff, 0x0, 1)
  let layerMaterial = new MeshPhongMaterial({
    color: 0xa2aaad,
    specular: 0x0,
    emissive: 0x728793,
    shininess: 20,
    flatShading: true,
  })
  let sphere = new SphereGeometry(210, 100, 100)
  let root = new Object3D()
  let directionalLight = new DirectionalLight(0xffffff, 1)
  let canvas = document.createElement('canvas')
  let context = null
  let baseLayer = null
  let mouseX = 0
  let mouseY = 0
  let width = 2048
  let height = 1024
  let windowHalfX = 2048 / 2
  let windowHalfY = 1024 / 2

  baseLayer = new Mesh(sphere, layerMaterial)
  context = canvas.getContext('2d')

  let projection = geoMercator()
    .scale(310)
    .translate([width / 2 + 30, height / 2 + 170])
    .clipAngle(0)
    .precision(0)

  let path = geoPath()
    .projection(projection)
    .context(context)

  canvas.style.display = 'none'
  canvas.width = width
  canvas.height = height
  canvas.id = 'GlobeCanvas'
  context.strokeStyle = '#000'
  canvas.style.margin = 'auto'
  context.lineWidth = 1
  context.fillStyle = '#000'
  context.imageSmoothingEnabled = true
  context.beginPath()
  path(feature(worldMap, worldMap.objects.countries))
  context.fill()
  context.stroke()
  globe.appendChild(canvas)
  camera.position.z = 500
  renderer.setSize(window.innerWidth, window.innerHeight)
  globe.appendChild(renderer.domElement)
  light.position.set(500, 1000, -100)
  light.castShadow = true
  scene.add(light)
  directionalLight.position.x = 500
  directionalLight.position.y = 1000
  directionalLight.position.z = 100
  directionalLight.castShadow = true
  scene.add(directionalLight)
  var mapTexture = new Texture(canvas)
  mapTexture.needsUpdate = true
  mapTexture.anisotropy = renderer.capabilities.getMaxAnisotropy()
  var mapMaterial = new MeshPhongMaterial({
    map: mapTexture,
    color: 0x686868,
    specular: 0x636363,
    emissive: 0xc99c9c,
    shininess: 3,
    transparent: true,
    flatShading: false,
  })
  let mapLayer = new Mesh(sphere, mapMaterial)
  mapLayer.castShadow = true
  mapLayer.receiveShadow = false
  root.rotation.x = 0.05
  root.castShadow = true
  root.receiveShadow = true
  root.add(baseLayer)
  root.add(mapLayer)
  scene.add(root)

  start(root, renderer, scene, camera, start)
}
