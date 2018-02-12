<script>
    var global = 1;
    function update()
    {
        if (global == 1)
        {
            document.getElementById("img1").src = '/img/fierce.png';
            document.getElementById("img2").src = '/img/bignose.png';
            document.getElementById("img3").src = '/img/tongue.png';
            document.getElementById("img4").src = '/img/spiky.png';
            global = 0;
        }

        else
        {
            document.getElementById("img1").src = '/img/blue.png';
            document.getElementById("img2").src = '/img/smallnose.png';
            document.getElementById("img3").src = '/img/smiling.png';
            document.getElementById("img4").src = '/img/long.png';
            global = 1;
        }
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
        <img id="img1" class="my-image" src="/img/{img1}.png" alt="spiky">
        <img id="img2" class="my-image" src="/img/{img2}.png" alt="spiky">
        <img id="img3" class="my-image" src="/img/{img3}.png" alt="spiky">
        <img id="img4" class="my-image" src="/img/{img4}.png" alt="spiky">
        {/sets}
    </div>
</div>