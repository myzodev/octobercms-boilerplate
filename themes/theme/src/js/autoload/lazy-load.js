import lozad from 'lozad'

const lazyLoad = () => {
	const observer = lozad('[data-lazy-load]', {
		rootMargin: '10px 0px',
		threshold: 0.1,
		enableAutoReload: true,
	})

	observer.observe()
}

export { lazyLoad }
