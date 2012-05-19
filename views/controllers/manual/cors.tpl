
{include file="header.tpl" title="Cross-origin Resource Sharing"}

<h1>Cross-origin Resource Sharing (CORS)</h1>

<p>As of version 1.5.4, Sockso support adding the <i>Access-Control-Allow-Origin</i> HTTP header
which allows making XHR calls cross-domain.  This is supported is all modern browsers and allows
for more easily building Javascript applications which share data cross-domain.</p>

<p>For example this could allow building an alternative Sockso interface on your own website,
    or maybe a small widget for searching and querying.</p>

<h2>Enabling CORS</h2>

<p>CORS is disabled by default, but to enable for all domains just add this setting:</p>

<pre>
propset www.cors *
</pre>

<p>Alternatively to allow CORS for only certain domains just specify them.</p>

<pre>
propset www.cors http://www.mysite.com
</pre>

{include file="comments.tpl"}

{include file="footer.tpl"}
