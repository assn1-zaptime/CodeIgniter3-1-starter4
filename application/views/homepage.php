<script>
    window.onload = function()
    {
        $(".navbar-nav").find(".active").removeClass("active");
        $("#nav-item-Home").addClass("active");
    };
</script>
<div class="row">
    {gearCustomization}
        <!-- Hair -->
        <div class="col-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Hair</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected value="7">acc-7</option>
                    <option value="8">acc-8</option>
                </select>
            </div>
            <!-- Eyes -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Eyes</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected value="7">acc-1</option>
                    <option value="8">acc-2</option>
                </select>
            </div>
            <!-- Nose -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Nose</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected value="7">acc-3</option>
                    <option value="8">acc-4</option>
                </select>
            </div>
            <!-- Mouth -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Mouth</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected value="7">acc-5</option>
                    <option value="8">acc-6</option>
                </select>
            </div>
            <form class="p-4" action="/addSet" method="post"><button type="submit" class="btn btn-primary">Save</button></form>
        </div>
    {/gearCustomization}

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
    </div>
</div>