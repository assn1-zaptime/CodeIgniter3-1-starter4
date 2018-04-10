<script>
    window.onload = function()
    {
        $(".navbar-nav").find(".active").removeClass("active");
        $("#nav-item-Home").addClass("active");
    };
</script>
<div class="row">
    <div class="col">
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
                {/setScore}
                <div class="dropdown show">
                    <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sets
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        {sets}
                        <a class="dropdown-item" href="/set/{setID}">Set {setID}</a>
                        {/sets}
                    </div>
                </div>
                {addSet}
            </div>
        </div>
    </div>
</div>