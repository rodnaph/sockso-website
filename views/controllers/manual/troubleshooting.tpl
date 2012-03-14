
{include file="header.tpl" title="Troubleshooting"}

<h1>Troubleshooting</h1>

<h2>#1 Sockso gives an "out of memory" error</h2>

<p>This is caused by the database running out of memory when doing a query, and
can happen if you have a very big collection.  To resolve this you will need to:</p>

<ol>
<li>Make sure Sockso isn't running, then go to "$HOME/.sockso" and back up the files in there.</li>
<li>Open "database.script" in a text editor and change all occurances of
"CREATE MEMORY TABLE" to "CREATE CACHED TABLE".</li>
<li>Start Sockso again.</li>
</ol>

<p>You <i>could</i> see a performance impact (the reason it isn't like this by default).</p>

<h2>#2 Still getting "out of memory" error...</h2>

<p>If you have a <b>very</b> big collection and using cached tables (#1) doesn't
help then you have the option of using <a href="index.php?controller=manual&page=mysql">MySQL as a backend</a>,
which should give you all the performance you need.</p>

<h2>#3 No system tray icon on 64bit Windows</h2>

<p>On 64bit windows systems you'll need to copy <i>lib/std/systray4j-64bit.dll</i> to <i>lib/std/systray4j.dll</i>.</p>

{include file="comments.tpl"}

{include file="footer.tpl"}
