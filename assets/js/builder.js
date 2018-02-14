window.jQuery(function ($) {
	var ace = window.ace;
	var params = window.tachyons_builder_params;

	if (!params) return;

	var default_css = $('#default_css_result').text();
	var default_config = $('#default_config_json').text();
	var sending = false;
	var $blocker = $('#blocker');
	var editor_classes = 'h4 vh-50-l ma0 ba b--black-20';
	var editor_font_size = '14px';

	// config editor
	var json_editor = ace.edit("config_json");

	json_editor.session.setMode("ace/mode/json");
	$(json_editor.container)
		.addClass(editor_classes)
		.css('font-size', editor_font_size);

	// css preview editor
	var css_editor = ace.edit("css_result");

	css_editor.session.setMode("ace/mode/css");
	css_editor.renderer.setShowGutter(false);
	css_editor.setReadOnly(true);
	$(css_editor.container)
		.addClass(editor_classes)
		.css('font-size', editor_font_size);

	$('#tachyons_builder').on('submit', function (evt) {
		evt.preventDefault();

		if (sending) return;

		var args = {
			security: params.security_nonce,
			action: 'build_tachyons',
			config_json: encodeURI( json_editor.getValue() ),
		};

		var req = $.ajax( {
			url: params.ajax_url,
			method: 'post',
			timeout: 15 * 1000,
			data: args,
			beforeSend: function () {
				block_page();
			}
		} );

		req.always(function () {
			unblock_page();
		})

		req.done(function (res) {
			if ( res.success === true ) {
				css_editor.setValue(res.data.css);
				css_editor.gotoLine(1);
			} else {
				show_error( res.data.message, res.data.json_error );
			}
		});

		req.fail(function(jqXHR, textStatus, errorThrown) {
			show_error(errorThrown, false);
		});

		function show_error ( message, json_error ) {
			message = ( json_error ? 'JSON parse error: ' : 'Server error: ' ) + message;
			css_editor.setValue('/* ' + message + ' */');
		}
	});

	$('#builder_reset').on('click', reset_fields);

	$('#select_css_result').on('click', function (evt) {
		css_editor.session.selection.selectAll();
		//css_editor.session.selection.moveCursorDown();
		css_editor.focus();
	})

	reset_fields();

	function reset_fields (evt) {
		if (sending) return;

		if ( evt == null || window.confirm("Are you sure?") ) {
			block_page();

			json_editor.setValue(default_config);
			json_editor.gotoLine(1);
			css_editor.setValue(default_css);
			css_editor.gotoLine(1);

			unblock_page();
		}

		return false;
	}

	function block_page () {
		sending = true;
		$blocker.removeClass('dn');
	}

	function unblock_page () {
		sending = false;
		$blocker.addClass('dn');
	}
});
