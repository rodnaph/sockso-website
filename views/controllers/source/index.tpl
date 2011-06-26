
{include file="header.tpl" title="Source Code"}

<div id="welcome">

    <h1>Source Code</h1>

    <p>Sockso uses loads of brilliant source code and free libraries
    that you can find linked to on the right of the page.  Without lots of other
    peoples hard work this project would have been too much, but with the freedom
    of the open source community, and the help of others, we can make great things!</p>

    <p>I'm using <a href="http://github.com">Github</a> for source control
    with Sockso.  You can get a copy of sockso using the following command:</p>

    <p><pre>git clone https://github.com/rodnaph/sockso.git</pre></p>

    <p>I push my latest changes here pretty often so it should be up to date with
    the latest development.</p>

    <div class="recentChanges">

        <h2>Recent Changes</h2>

        <ul class="commits">

            {foreach $commits->entry as $entry}
            <li class="commit">
                <span class="title">{$entry->title}</span>
                -
                <span class="author">{$entry->author->name}</span>
            </li>
            {/foreach}

        </ul>

    </div>

    <h2>Website Code</h2>

    <p>The source code for the website is also available online here:</p>
   
    <p><a href="http://github.com/rodnaph/sockso-website">http://github.com/rodnaph/sockso-website</a></p>

    <p>This is part of a larger framework, but is provided as open source because
    Sockso does 'call home' for a few things like checking your external IP
    address, and finding the latest version.  So having the code open shows
    at least it's not doing anything naughty!  :D</p>

</div>

{include file="footer.tpl"}
