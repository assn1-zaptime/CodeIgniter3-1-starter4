<script>
    window.onload = function()
    {
        $(".navbar-nav").find(".active").removeClass("active");
        $("#nav-item-Home").addClass("active");
    };
</script>
<div class="row">
    <div class="col-xs-12 extra-height">

    </div>
</div>

<div class="card my-container">
    {set}
        <img class="card-img-top my-image" src="/img/{accName}.png" alt="{accName}" style="width:100%">
    {/set}
    <div class="card-body">
        {setScore}
            <h3 class="card-text">Pretty: {pretty}</h3>
            <h3 class="card-text">Cool: {cool}</h3>
            <h3 class="card-text">Wacky: {wacky}</h3>
            <h3 class="card-text">Total: {total}</h3>
            <div class="dropdown show">
                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sets
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/set/1">Set 1</a>
                    <a class="dropdown-item" href="/set/2">Set 2</a>
                </div>
            </div>
        {/setScore}
    </div>
</div>

<!--<div class="row">-->
<!--    <div class="col-xs-12">-->
<!--        {set}-->
<!--            <img class="my-image" src="/img/{accName}.png" alt="{accName}">-->
<!--        {/set}-->
<!--        {setScore}-->
<!--            <p>Pretty: {pretty}</p>-->
<!--            <p>Cool: {cool}</p>-->
<!--            <p>Wacky: {wacky}</p>-->
<!--            <p>Total: {total}</p>-->
<!--        {/setScore}-->
<!--    </div>-->
<!--</div>-->