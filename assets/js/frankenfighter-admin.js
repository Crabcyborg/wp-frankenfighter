jQuery(document).ready(function() {
	jQuery('.jsoneditor').each(function() {
		const editor = new JSONEditor(this, {});
		editor.set(JSON.parse(decodeURIComponent(jQuery(this).attr('data-config').replace(/\+/g, ' '))));

		// get json
		//const updatedJson = editor.get()
	});
});