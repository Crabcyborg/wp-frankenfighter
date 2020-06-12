function frankenfighter(el) {
	m.render(el, m(frankenfighter.Monster, { configuration: JSON.parse(decodeURIComponent(el.dataset.config.replace(/\+/g, ' '))) }));
}

(function() {
	const ff = frankenfighter;

	ff.RelativePart = {
		view: v => m('div', { style: { position: 'relative', ...v.attrs.style } }, m('img', { src: v.attrs.image }), v.children)
	};

	ff.AbsolutePart = {
		view: v => m('div', { style: { position: 'absolute', ...v.attrs.style } }, m('img', { src: v.attrs.image }))
	};

	ff.Torso = {
		view: v => m(ff.RelativePart, { style: {display: 'inline-block', ...v.attrs.style}, image: v.attrs.image })
	};

	ff.Antlers = ff.AbsolutePart;
	ff.Head = {
		view: v => m(ff.RelativePart, { style: v.attrs.style, image: v.attrs.image }, m(ff.Antlers, v.attrs.antlers))
	};

	ff.Leg = {
		view: v => m(
			ff.RelativePart,
			{ style: {...v.attrs.style, display: 'inline-block'}, image: v.attrs.image },
			v.attrs.foot && m('img', { style: { position: 'relative', ...v.attrs.foot.style }, src: v.attrs.foot.image })
		)
	};

	ff.Tail = ff.AbsolutePart;
	ff.Wing = ff.AbsolutePart;

	ff.Monster = {
		view: v => m(
			'div',
			{ id: v.attrs.id, style: { display: 'inline-block', position: 'relative', lineHeight: '20px', ...v.attrs.configuration.style } },
			m(ff.Head, v.attrs.configuration.head),
			m(
				'div',
				m(ff.Torso, {...v.attrs.configuration.torso}),
				v.attrs.configuration.wings && v.attrs.configuration.wings.map(wing => m(ff.Wing, wing))
			),
			m('div', { style: { position: 'relative' } }, m(ff.Tail, v.attrs.configuration.tail), v.attrs.configuration.legs.map(leg => m(ff.Leg, leg)))
		)
	};

	document.querySelectorAll('.frankenfighter').forEach(frankenfighter);
})();