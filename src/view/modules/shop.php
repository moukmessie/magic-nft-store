<?php if(!empty($params["cards"])) :?>
<form class="browser" method="post" action="<?php echo DOCUMENT_DIR ?>pages/add_to_cart.php">
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
<script>

    let number = undefined
    let count = 0
    let addToCartBtn = undefined
    document.addEventListener('DOMContentLoaded', function (){
        number = document.getElementById('num-cards');
        addToCartBtn = document.getElementById('add-to-cart')
        addToCartBtn.disabled = true
        let checks = document.querySelectorAll("input[type='checkbox']")
        for (c of checks){
            c.addEventListener('change', function (e){
                if (this.checked){
                    this.parentElement.parentElement.classList.add('selected')
                }else{
                    this.parentElement.parentElement.classList.remove('selected')
                }
                count_selection()
            })
            c.parentElement.parentElement.addEventListener('click', function (){
                let input = this.querySelector("input[type='checkbox']") ;
               // console.log(input)
                input.checked = !input.checked ;
                if (input.checked){
                    this.classList.add('selected')
                }else{
                    this.classList.remove('selected')
                }
                count_selection()
            })
        }
        count_selection()
    })

    function count_selection(){
        let selected = document.querySelectorAll("input[type='checkbox']:checked")

        if(selected.length == 0){
            addToCartBtn.disabled = true
            number.innerHTML = '0'
        }else{
            addToCartBtn.disabled = false
            number.innerHTML = selected.length
            selected.forEach(input =>{
                console.log(input.parentElement.parentElement)
            })
        }
    }

</script>

<?php else: ?>
    <div style="text-align: center"> Aucune donnée n'a été trouvée</div>

<?php endif;