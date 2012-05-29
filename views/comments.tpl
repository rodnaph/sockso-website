
{if $page != Manual_Controller::DEFAULT_PAGE}

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="{$filesUrl}js/comments.js"></script>

    <div class="comments">

        {assign var="captcha" value=chr(rand(65,90))}

        <a name="comments"></a>

        <h2>Comments</h2>

        {if $session->commentSaved}
            <div class="flash">Your comment has been posted.</div>
        {/if}

        <ul class="comments">
        {foreach $comments as $comment}

            <li class="comment">
                <div class="author"><span class="name">{$comment->name}</span> said:</div>
                <div class="body">{$comment->body|htmlspecialchars|nl2br}</div>
                <div class="date">{$comment->dateCreated}</div>
            </li>

        {foreachelse}
            <li class="empty">No comments yet, be the first!</li>
        {/foreach}
        </ul>
            
        <ul class="links">
            <li class="problem"><a rel="noreferrer" target="_blank" href="https://github.com/rodnaph/sockso-website/issues/new">Report a problem</a> (via Github)</li>
        </ul>

        <form method="post" action="index.php?controller=comment&action=post">

            <h3>Post Comment</h3>
            
            <p>Just enter your name, fill out the easy captcha and enter your
                comments - it'll appear on the site right away. If you enter
                your email it will just be linked from your name so people
                can get in touch with you about your comment, so it's
                optional.</p>
            
            <fieldset>
                <div class="row">
                    <label>Name:</label>
                    <input type="text" name="name" />
                </div>
                <div class="row">
                    <label>Email: (optional)</label>
                    <input type="text" name="email" />
                </div>
                <div class="row">
                    <label>Captcha, type letter '{$captcha}':</label>
                    <input type="text" name="captcha" class="captcha" />
                </div>
                <div class="row">
                    <label>Comments:</label>
                    <textarea name="comment"></textarea>
                </div>
            </fieldset>

            <fieldset class="submit">
                <input type="hidden" name="captcha2" value="{$captcha}" />
                <input type="hidden" name="page" value="{$page}" />
                <input type="submit" value="Post Comment" />
            </fieldset>

        </form>
            
    </div>

{/if}
