import Alpine from 'alpinejs'
import autoload from './autoload'
import layout from './layout'
import blocks from './blocks'
import components from './components'

window.Alpine = Alpine

const init = () => {
	autoload()
	layout()
	blocks()
	components()
}

addEventListener('DOMContentLoaded', () => {
	Alpine.start()
	init()
})
