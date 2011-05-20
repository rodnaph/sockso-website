
{include file="header.tpl" title="Setting up Netbeans"}

<h1>Setting up Netbeans</h1>

<p>This page describes how to set up Sockso with Netbeans.</p>

<h2>Creating the Project</h2>

<p>After you have cloned the Git repository, open Netbeans and  choose to create a new project
from existing sources.</p>

<p><img src="{$filesUrl}images/manual/dev-netbeans-1.png" /></p>

<p>Next, enter the name for the project (probably 'Sockso'), and choose the directory that
you cloned the repository in.</p>

<p><img src="{$filesUrl}images/manual/dev-netbeans-2.png" /></p>

<p><b>NOTE:</b> You will probably get an error here about the <i>build.xml</i> file already
existing (Sockso uses its own, not Netbeans standard one) - so you will need to temporarily
rename <i>build.xml</i> to something else.  But name it back when we have passed this step!</p>

<p>Then add the main source code folders...</p>

<p><img src="{$filesUrl}images/manual/dev-netbeans-3.png" /></p>

<p>And just click <b>Finish</b>, you don't need to go on to the next step, and your project
should be created for you...</p>

<p><img src="{$filesUrl}images/manual/dev-netbeans-4.png" /></p>

<p>The first thing you'll see is lots of errors on the packages like in the screenshot below.
This is because we haven't told Netbeans about all the dependencies yet, so right click the
Sockso project and select the <i>Properties</i> option from the menu.</p>

<p><img src="{$filesUrl}images/manual/dev-netbeans-5.png" /></p>

<p>Then we can go to the <i>Libraries</i> tab on the left side, and then click the button
labelled <b>Add JAR/Folder</b>.</p>

<p><img src="{$filesUrl}images/manual/dev-netbeans-6.png" /></p>

<p>We then need to add all the <i>.jar</i> files from the following folders...</p>

<ul>
    <li>lib/dev (development)</li>
    <li>lib/opt (optional)</li>
    <li>lib/std (standard runtime libraries)</li>
</ul>

<p><img src="{$filesUrl}images/manual/dev-netbeans-7.png" /></p>

<h2>Missing Classes</h2>

<p>After this most of the errors will have gone, but you may still see errors about missing
template classes like in the screenshot below...</p>

<p><img src="{$filesUrl}images/manual/dev-netbeans-8.png" /></p>

<p>These classes (along with <i>Sockso.java</i>) are created when you build Sockso, so go to the
shell, change to the Sockso directory and run the compile Ant target. (You can also do this from
within Netbeans if you have the Ant plugin)</p>

<pre>
$> ant compile
</pre>

<p>The reason you need to do this is because all Sockso's output templates are written using
the Jamon templating engine (ie. all the .jamon files), which are converted to Java classes
and then compiled into Sockso.  So running the <b>compile</b> target as above will do all this.</p>

<p>Normally though you won't run the <b>compile</b> target directly, you'll usually just use <b>run</b></p>

{include file="comments.tpl"}

{include file="footer.tpl"}
