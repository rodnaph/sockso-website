
{include file="header.tpl" title=""}

<h1>Developing for Sockso</h1>

<p>This page contains some basic information on how to set up a Sockso development
environment.  So basically, what you'll need...</p>

<h2>Essentials</h2>

<p>1) <b>JDK 1.5+</b> (<a href="http://java.sun.com">http://java.sun.com</a>)<br />
Sockso (and some of it's libraries) require atleast JDK 1.5.  The official
releases are compiled with this.</p>

<p>2) <b>Apache Ant</b> (<a href="http://ant.apache.org">http://ant.apache.org</a>)<br />
All of the compiling, running, packaging and testing of Sockso is done with Ant,
so it's an essential really (unless ur mental and want to do things on your own)</p>

<p>3) <b>PHP 4+</b> (<a href="http://www.php.net">http://www.php.net</a>)<br />
Some of the build process uses PHP scripts to do some stuff, so you'll need this
installed to or you won't get far (again, unless ur mental)</p>

<h3>Optional</h3>

<p>1) <b>IDE</b><br />
Some people love them, others (mentalists) hate them, but I'd reccomend using
Netbeans (<a href="http://netbeans.org">http://netbeans.org</a>).  There are lots of others to but I find this
one pretty good.</p>

<h2>Configuration</h2>

<p>First make a copy of the file "sockso.properties-sample" and rename it to just
"sockso.properties".  Then, as long as you're using Ant, pretty much everything
should be ready to go.  If you're using an IDE then you'll probably need to
point it to all the Jar files in the "lib/std", "lib/dev" and "lib/opt" directories or it'll
complain about all the imports.  Otherwise try some of these useful Ant tasks...</p>

<ol>
    <li><b>run</b> - Builds a working Sockso distribution in the "dist" folder, and runs it.</li>
    <li><b>package</b> - Makes nice packages for Sockso.</li>
    <li><b>test</b> - Run all the Java unit tests</li>
    <li><b>test-single -Dclass=CLASSNAME</b> - Run a specific class's tests</li>
</ol>

<h2>Source Layout</h2>

<p><b>lib/*</b> - Java libraries<br />
<b>resources</b> - JS/CSS/Image resources for desktop application and web browser<br />
<b>scripts</b> - Various utility scripts for development<br />
<b>src</b> - Java source code<br />
<b>templates</b> - Jamon templates<br />
<b>test</b> - Test cases</p>

<h2>Unit Testing</h2>

<p>Sockso strives to have as much UT coverage as possible in both it's Java and
Javascript.  To run the JUnit tests for Java use...</p>

<pre>
$> ant test
</pre>

<p>Or to run a single test case...</p>

<pre>
$> ant test-single -Dclass=com.pugh.sockso.StringProperties
</pre>

<p>NB: Running the Java unit tests requires MySQL installed, running and accessible
by the mysql.* settings from sockso.properties (this user will need create/drop
permissions).</p>

<p>For the Javascript tests Sockso uses JsTestDriver, so first you need to start
up the test server in one shell...</p>

<pre>
$> ant test-js-server
</pre>

<p>Then go to http://localhost:9876 to attach a browser, you can then run the tests
from another shell.</p>

<pre>
$> ant test-js
</pre>

<p>You can attach multiple browsers to test across them all at once.</p>

{include file="comments.tpl"}

{include file="footer.tpl"}
