<script>
    window.onload = function()
    {
        $(".navbar-nav").find(".active").removeClass("active");
        $("#nav-item-Catalogue").addClass("active");
        //neede to be fixed
    }
    
</script>
    <h1>Catalog</h1>
<?php foreach($cat as $c) {?>

    <div class="row" style = "display: inline-block;">  
        <h1><?php echo strtoupper ($c->catName);?></h1>
        <div class="col-sm-1"></div>
        <?php foreach($acc as $a) {
            if (strcmp($a->catCode,$c->catCode)==0) {?>
        <div class="w3-container col-sm-5" style= " display: inline-block;">
            <div class="w3-card-4" style="width:350px">
                <div class="w3-container">
                <img src=<?php echo 'img//'.$a->accName.'.png';?> 
                    alt="Avatar" class="w3-left w3-margin-right" style="width:200px">
                <p><br><br>Code: <?php echo $a->accCode;?> 
                    <br>Name: <?php echo $a->accName;?> 
                    <br>Pretty: <?php echo $a->att1;?> 
                    <br>Cool: <?php echo $a->att2;?> 
                    <br>Wacky: <?php echo $a->att3;?>
                </p>
                <button>Edit</button>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <?php }} ?>
    </div>

<?php }?>
<br>
