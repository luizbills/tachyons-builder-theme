<div id="app" class="mb4">

	<div class="cf">

		<div class="dn">
			<pre id="default_config_json"><?php echo builder_get_default_config(); ?></pre>
			<pre id="default_css_result"><?php echo builder_get_default_tachyons(); ?></pre>
		</div>

		<div class="w-50-l fl-l mb3">
			<form id="tachyons_builder">
				<textarea
					name="config_json"
					id="config_json"
					class="h4 vh-50-l w-100 ma0 ba b--black-20"
				></textarea>

				<div class="flex justify-end mt2-ns" id="actions">
					<button
						type="button"
						id="builder_reset"
						class="ph4 pv3 ph3-l pv2-l mr2-ns f5 bg-light-gray hover-bg-moon-gray dark-gray bn w-50 w-auto-ns"
					>Reset</button>

					<button
						type="submit"
						id="builder_submit"
						class="ph4 pv3 ph3-l pv2-l f5 bg-blue hover-bg-dark-blue white bn w-50 w-auto-ns"
					>Build</button>
				</div>
			</form>
		</div>

		<div class="w-50-l fl-l">
			<textarea
				readonly
				id="css_result"
				class="h4 vh-50-l w-100 ma0 ba b--black-20"
			></textarea>

			<div class="flex justify-end mt2-ns" id="actions">
				<button
					type="button"
					id="select_css_result"
					class="ph4 pv3 ph3-l pv2-l f5 bg-light-gray hover-bg-moon-gray dark-gray bn w-100 w-auto-ns"
				>Select result</button>
			</div>
		</div>

	</div>

</div>