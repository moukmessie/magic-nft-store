
<?php if(!empty($params["cards"])) :?>
<header style="text-align: center; margin: 15px" xmlns="http://www.w3.org/1999/html"> <div>Please <a href="/account" style="color: white">Login</a>" to Shop..."</div> </header>
<div class="browser">
    <div class="browser-content-wrapper">
        <div class='browser-content' >
            <?php  foreach ($params["cards"] as $iValue) :?>
                <form action="/product" method="get">
                    <button type="submit" class="magic-card">
                            <img src="<?php echo $iValue->image_uris->normal ?>"  alt="card">
                            <legend style="justify-content: center; color: white">
                                <label for="<?php echo $iValue->id ?>"><?php echo $iValue->name ?></label>
                            </legend>
                        <input class="form-check-input " style="visibility: hidden" type="text" name="id" value="<?php echo $iValue->id ?>">

                    </button>
</form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php else: ?>
<div style="text-align: center"> Aucune donnée n'a été trouvée</div>

<?php endif;