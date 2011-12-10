
{include file="header.tpl" title="Meta Tags"}

<h1>Meta Tags</h1>

<p>Sockso allows adding arbitrary <b>meta</b> tags to the HTML markup to support things like verifying via Google Webmaster, or
adding keywords to your Sockso server, etc...  To do this you create properties starting with <b>www.metatags</b> like this:</p>

<pre>
propset www.metatags.google-site-verification +hajsdjashjdasd=
</pre>

<p>So, anything after <b>www.metatags</b> becomes the meta tag name, and then the property value is the meta tag content</p>

{include file="comments.tpl"}

{include file="footer.tpl"}
