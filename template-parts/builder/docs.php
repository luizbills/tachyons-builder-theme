<div id="docs" class="measure-wide lh-copy f5 nested-links">
	<h2 class="ma0 f4 b">JSON config documentation</h2>
	<p class="mt0 mb3">Short description of some options used in the JSON config above.</p>

	<h3 class="ma0 f4 b"><code>prefix</code></h3>
	<p class="mt0 mb3">default value: <code class="bg-moon-gray br2 ph1">null</code><br>
	Adds a prefix in all tachyons classes.</p>

	<h3 class="ma0 f4 b"><code>debug, debug-children and debug-grid</code></h3>
	<p class="mt0 mb3">default value: <code class="bg-moon-gray br2 ph1">false</code><br>
		If <code>true</code>, respectively includes
		<a target="_blank" rel="nofollow"  class="link" href="https://github.com/luizbills/wp-modular-css/blob/master/css-modules/tachyons-default/debug.css">debug</a>,
		<a target="_blank" rel="nofollow"  class="link" href="https://github.com/luizbills/wp-modular-css/blob/master/css-modules/tachyons-default/debug-children.css">debug-children</a> and
		<a target="_blank" rel="nofollow"  class="link" href="https://github.com/luizbills/wp-modular-css/blob/master/css-modules/tachyons-default/debug-grid.css">debug-grid</a> modules.
	</p>

	<h3 class="ma0 f4 b"><code>include-normalize</code></h3>
	<p class="mt0 mb3">default value: <code class="bg-moon-gray br2 ph1">true</code><br>
	Adds the <a target="_blank" rel="nofollow"  href="https://github.com/tachyons-css/tachyons/blob/master/src/_normalize.css" class="link">Normalize.css library</a>.</p>

	<h3 class="ma0 f4 b"><code>media-queries</code></h3>
	<p class="mt0 mb3">Defines your <strong>breakpoints</strong> to responsive classes. If no breakpoints are set, then no module will be responsive.</p>

	<h3 class="ma0 f4 b"><code>colors</code></h3>
	<p class="mt0 mb3">The colors used in several modules, like "text colors", "background colors", "border colors", ...</p>

	<h3 class="ma0 f4 b"><code>__enabled-modules</code></h3>
	<p class="mt0 mb3">Defines which tachyons modules will be used, which ones will be responsive, and their order in the generated css file.</p>

	<div class="pl3 pl4-ns">
		<h4 class="ma0 f4 b">How to make a module responsive or non-responsive</h4>
		<p class="mt0 mb3">Put <code>"responsive"</code> inside of the module's array definition.<br>
			Example: make <code>"border-colors"</code> module responsive (which by default is not responsive).</p>
		<pre class="pre pa2 bg-light-gray mt0 mb3"><code>...
"__enabled-modules": {
	"border-colors": [ "responsive" ]
}
...</code></pre>
	</div>

	<h3 class="ma0 f4 b">Other options</h3>
	<p class="mt0 mb3">Some special identifiers are used to customize the modules.</p>

	<div class="pl3 pl4-ns">
		<h4 class="ma0 f4 b"><code>@default</code></h4>
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

		<h4 class="ma0 f4 b"><code>[[@use ...]]</code></h4>
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