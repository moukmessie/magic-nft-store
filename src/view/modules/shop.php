<?php if(!empty($params["cards"])) :?>
<form class="browser" method="post" action="/cart/add">
    <header style="font-size: 1.5em; padding: 5px; display: flex; justify-content: space-between; align-items: center ">
        <div  >SELECTION : <span id="num-cards"></span>  </div>

        <button  type="submit" class="btn btn-dark" id="add-to-cart">Add to Cart</button>
    </header>
    <div class="browser-content-wrapper">
        <div class="browser-content">
            <?php foreach ($params['cards'] as $iValue) :?>
                <div class="magic-card">
                    <img src="<?php echo $iValue->image_uris->normal ?>" alt="card">

                    <legend style="justify-content: center">
                        <label for="<?php echo $iValue->id ?>"><?php echo $iValue->name ?></label>

                        <input  class="form-check-input " style="visibility: hidden" type="checkbox" name="add[]"  value="<?php echo $iValue->id ?>" id="<?php $iValue->id?>">

                    </legend>


                </div>
            <?php endforeach; ?>
        </div>

    </div>
</form>
<script src="/public/javascripts/shop.js"></script>
<?php else: ?>
    <div style="text-align: center"> Aucune donnée n'a été trouvée</div>

<?php endif;