
{include file="header.tpl" title="Running Sockso"}

<h1>Running Sockso on a Server</h1>

<p>If you want to install Sockso on a server without a GUI then you can
start it up with the <b>--nogui</b> option, and you'll be presented
with a console where you can manage everything.</p>

<p><b>Windows</b><br />
$>windows.bat --nogui<br />
<br />
<b>Linux (and others)</b><br />
$>sh linux.sh --nogui
</p>

<p>To find out the available commands type <b>help</b> at the console.</p>

<p>For a list of other command line switches see the
<a href="index.php?controller=manual&page=cmdline">command line options</a> page.</p>

<h2>Sockso Properties</h2>

<p>You can change Sockso's behaviour through the console by changing it's
<a href="index.php?controller=manual&page=properties">properties</a>.</p>

<h2>Administration Mode</h2>

<p>Sockso version before 1.3.4 had an administration mode available if you were
using MySQL.  This feature has now been removed though as the admin console
is available in the GUI.</p>

{include file="comments.tpl"}

{include file="footer.tpl"}
