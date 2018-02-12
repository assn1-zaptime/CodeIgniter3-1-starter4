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
            <img class="my-image" src="/img/spiky.png" alt="spiky">
        {/sets}
    </div>
</div>

