<script>
    function update(sets)
    {
        console.log("select item changed!")
        console.log(sets);
    }
</script>
<div class="row extra-height">
    <div class="form-group">
        <select class="form-control" id="sel1" onchange="update()">
            <option>Set 1</option>
            <option>Set 2</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        {sets}
            <img class="my-image" src="/img/{img1}.png" alt="spiky">
            <img class="my-image" src="/img/{img2}.png" alt="spiky">
            <img class="my-image" src="/img/{img3}.png" alt="spiky">
            <img class="my-image" src="/img/{img4}.png" alt="spiky">
        {/sets}
    </div>
</div>

