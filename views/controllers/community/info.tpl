
{include file="header.tpl" title="{$server->title}"}

<h2>{$server->title} - {$server->tagline}</h2>

<p><i>Last active: {$server->dateUpdated}</i></p>

<div id="serverChart" data-id="{$server->id}">Chart loading...</div>

<p>The above chart displays this servers availability over a period of time.</p>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="{$filesUrl}js/serverinfo.js"></script>

{include file="footer.tpl"}
