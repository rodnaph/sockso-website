
{if $page != Manual_Controller::DEFAULT_PAGE}

    {assign var="captcha" value=chr(rand(65,90))}

    <a name="comments"></a>

    <h2>Comments</h2>
    
    {if $session->commentSaved}
        <div class="flash">Your comment has been posted.</div>
    {/if}
    
    <ul class="comments">
    {foreach $comments as $comment}
    
        <li class="comment">
            <span class="name">{$comment->name}</span> said:
            <p>{$comment->body|htmlspecialchars|nl2br}</p>
            <span class="date">on {$comment->dateCreated}</span>
        </li>
    
    {/foreach}
    </ul>

    <form method="post" action="index.php?controller=manual&action=post">

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

{/if}
