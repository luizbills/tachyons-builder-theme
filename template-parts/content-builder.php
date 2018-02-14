	<div class="sans-serif ph2 ph4-ns relative">

		<div id="blocker" class="relative z-max dn">
			<div id="backdrop" class="fixed absolute--fill bg-black-60"></div>
			<div class="fixed f4 f2-ns white b absolute--center tc">
				Building... <br class="dn-ns">please wait
			</div>
		</div>

		<header class="mw8 center mb3 mt3 mt4-ns mt5-l">
			<h1 class="ma0 f3 mb2">Tachyons Builder <span class="clip">Online</span></h1>
			<h2 class="ma0 f5 normal">Generate a custom Tachyons build from a json configuration.</h2>
			<p><a class="github-button" href="https://github.com/luizbills/wp-modular-css" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star luizbills/wp-modular-css on GitHub">Star</a></p>
		</header>

		<main class="mw8 center">
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
								class=""
							></textarea>

							<div class="flex justify-end mt2-ns" id="actions">
								<button
									type="button"
									id="builder_reset"
									class="ph4 pv3 ph3-l pv2-l mr2-ns bg-moon-gray hover-bg-light-silver dark-gray bn w-50 w-auto-ns"
								>Reset</button>

								<button
									type="submit"
									id="builder_submit"
									class="ph4 pv3 ph3-l pv2-l bg-blue hover-bg-dark-blue white bn w-50 w-auto-ns"
								>Build</button>
							</div>
						</form>
					</div>

					<div class="w-50-l fl-l">
						<textarea
							readonly
							id="css_result"
							class=""
						></textarea>

						<div class="flex justify-end mt2-ns" id="actions">
							<button
								type="button"
								id="select_css_result"
								class="ph4 pv3 ph3-l pv2-l bg-moon-gray hover-bg-light-silver dark-gray bn w-100 w-auto-ns"
							>Select result</button>
						</div>
					</div>

				</div>

			</div>

			<div id="docs" class="measure-wide lh-copy f5 nested-links">
				<h2 class="ma0 f4 b">JSON config documentation</h2>
				<p class="mt0 mb3">Short description of some options used in the JSON config above.</p>

				<h3 class="ma0 f5 b"><code>prefix</code></h3>
				<p class="mt0 mb3">default value: <code class="bg-moon-gray br2 ph1">null</code><br>
				Adds a prefix in all tachyons classes.</p>

				<h3 class="ma0 f5 b"><code>debug, debug-children and debug-grid</code></h3>
				<p class="mt0 mb3">default value: <code class="bg-moon-gray br2 ph1">false</code><br>
					If <code>true</code>, respectively includes
					<a target="_blank" rel="nofollow"  class="link" href="https://github.com/luizbills/wp-modular-css/blob/master/css-modules/tachyons-default/debug.css">debug</a>,
					<a target="_blank" rel="nofollow"  class="link" href="https://github.com/luizbills/wp-modular-css/blob/master/css-modules/tachyons-default/debug-children.css">debug-children</a> and
					<a target="_blank" rel="nofollow"  class="link" href="https://github.com/luizbills/wp-modular-css/blob/master/css-modules/tachyons-default/debug-grid.css">debug-grid</a> modules.
				</p>

				<h3 class="ma0 f5 b"><code>include-normalize</code></h3>
				<p class="mt0 mb3">default value: <code class="bg-moon-gray br2 ph1">true</code><br>
				Adds the <a target="_blank" rel="nofollow"  href="https://github.com/tachyons-css/tachyons/blob/master/src/_normalize.css" class="link">Normalize.css library</a>.</p>

				<h3 class="ma0 f5 b"><code>media-queries</code></h3>
				<p class="mt0 mb3">Defines your <strong>breakpoints</strong> to responsive classes. If no breakpoints are set, then no module will be responsive.</p>

				<h3 class="ma0 f5 b"><code>colors</code></h3>
				<p class="mt0 mb3">The colors used in several modules, like "text colors", "background colors", "border colors", ...</p>

				<h3 class="ma0 f5 b"><code>__enabled-modules</code></h3>
				<p class="mt0 mb3">Defines which tachyons modules will be used, which ones will be responsive, and their order in the generated css file.</p>

				<div class="pl3">
					<h4 class="ma0 f5 b">How to make a module responsive or non-responsive</h4>
					<p class="mt0 mb3">Put <code>"responsive"</code> inside of the module's array definition.<br>
						Example: make <code>"border-colors"</code> module responsive (which by default is not responsive).</p>
					<pre class="pre pa2 bg-light-gray mt0 mb3"><code>...
"__enabled-modules": {
	"border-colors": [ "responsive" ]
}
...</code></pre>
				</div>

				<h3 class="ma0 f5 b">Other options</h3>
				<p class="mt0 mb3">Some special identifiers are used to customize the modules.</p>

				<div class="pl3">
					<h4 class="ma0 f5 b"><code>@default</code></h4>
					<p class="mt0 mb3">Some options has <code>"@default"</code> as key/name, this means an <em>empty name</em>.<br>
					Example:</p>
					<pre class="pre pa2 bg-light-gray mt0 mb3"><code>...
"letter-spacing": {
	"@default": ".1em",
	"tight":    "-.05em",
	"mega":     ".25em"
}
...</code></pre>
					<p class="mt0 mb3">the above config generates:</p>
					<pre class="pre pa2 bg-light-gray mt0 mb3"><code>.tracked { letter-spacing: .1em; }
.tracked-tight { letter-spacing: -.05em; }
.tracked-mega { letter-spacing: .25em; }</code></pre>

					<h4 class="ma0 f5 b"><code>[[@use ...]]</code></h4>
					<p class="mt0 mb3">Some options has <code>"[[@use ...]]"</code> as value, this is used to get value from other options.<br>
					Example:</p>
					<pre class="pre pa2 bg-light-gray mt0 mb3"><code>...
"colors": {
	"crazy-color": "#123456"
},
"nested": {
	"links-color": "[[@use colors crazy-color]]"
}
...</code></pre>
					<p class="mt0 mb3">the above config generates:</p>
					<pre class="pre pa2 bg-light-gray mt0 mb3"><code>.nested-links a {
	color: #123456;
	...
}</code></pre>
				</div>
			</div>

			<div id="about" class="mt5 mb3 measure lh-copy nested-links">
				<h2 class="ma0 f4 b">About</h2>
				<p class="ma0">This project was created by <a href="https://luizpb.com" class="link">Luiz Bills</a> and uses <strong>WordPress Modular CSS</strong> as backend. Anyone is welcome to suggest any improvement, report issues and contribute to this project on <a href="https://github.com/luizbills/wp-modular-css" class="link">Github</a>.</p>
				<p class="ma0"><p><a class="github-button" href="https://github.com/luizbills/wp-modular-css" data-icon="octicon-star"  data-show-count="true" aria-label="Star luizbills/wp-modular-css on GitHub">Star</a></p></p>
			</div>
		</main>

		<footer class="mw8 center">
			<p class="mt4 mb3 b f6 gray">Made with Tachyons and ♥ in Brazil.</p>
		</footer>
	</div>
