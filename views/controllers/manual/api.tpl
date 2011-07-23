
{include file="header.tpl" title="API"}

<h1>JSON API</h1>

<p>As of version 1.4 Sockso provides a JSON API located under the <b>/api</b>
root URL.  This API exposes a read only JSON view of all the artists, albums,
tracks and playlists stored in a Sockso server.</p>

<ul>
    <li>All endpoints return JSON, and are read-only.</li>
    <li>Endpoints marked as "paged" return 100 items at a time by default, but this can
be adjusted using "limit" and "offset" parameters.</li>
    <li>A "limit" of -1 means no limit.</li>
    <li>Offset can only be specified with a limit.</li>
    <li>Requests should be GET.</li>
    <li>$ID in endpoints indicates an integer ID</li>
</ul>

<h2>Endpoints</h2>

<ul>
    <li><b>/api</b> - Server info</li>
</ul>

<h3>Artists</h3>

<ul>
    <li><b>/api/artists</b> - Lists artists (paged)</li>
    <li><b>/api/artists/$ID</b> - Artist $ID</li>
    <li><b>/api/artists/$ID/tracks</b> - Tracks for artist $ID</li>
</ul>

<h3>Albums</h3>

<ul>
    <li><b>/api/albums</b> - Lists albums (paged)</li>
    <li><b>/api/albums/$ID</b> - Album $ID</li>
    <li><b>/api/albums/$ID/tracks</b> - Tracks for album $ID</li>
</ul>

<h3>Tracks</h3>

<ul>
    <li><b>/api/tracks</b> - Lists tracks (paged)</li>
    <li><b>/api/tracks/$ID</b> - Track $ID</li>
</ul>

<h3>Playlists</h3>

<ul>
    <li><b>/api/playlists</b> - Lists playlists (paged)</li>
    <li><b>/api/playlists/$ID</b> - Playlist $ID</li>
    <li><b>/api/playlists/site</b> - Lists site playlists (paged)</li>
    <li><b>/api/playlists/user</b> - Lists playlists for current user (paged)</li>
    <li><b>/api/playlists/user/$ID</b> - Lists playlists for specified user</li>
</ul>

<h3>Session</h3>

<ul>
    <li><b>/api/session</b> - Returns '1' or '0' indicating if current user has session.</li>
</ul>

{include file="comments.tpl"}

{include file="footer.tpl"}
