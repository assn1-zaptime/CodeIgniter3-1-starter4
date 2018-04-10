<?php
/*
 * Menu navbar, just an unordered list
 */
?>
<ul class="nav">
    {menudata}
    <li><a id="nav-item-{name}" class="nav-item nav-link"  href="{link}">{name}</a></li>
    {/menudata}
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="/roles/actor/Guest">Guest</a></li>
            <li><a href="/roles/actor/User">User</a></li>
            <li><a href="/roles/actor/Admin">Admin</a></li>
      </ul>
    </li>
    <li><a href="#">{role}</a></li>
</ul>
