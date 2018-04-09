<h1>Task # {id}</h1>
<form role="form" action="/catalogue/submit" method="post">
    {ftask}<br/>
    {fpriority}<br/>
    {fsize}<br/>
    {fgroup}<br/>
    {fstatus}<br/>
    {zsubmit}<br/>
</form>
    {error}
    <br/>
    <a href="/catalogue/cancel"><input type="button" value="Cancel the current edit"/></a>
    
    <a href="/catalogue/delete"><input type="button" value="Delete this todo item"/></a>