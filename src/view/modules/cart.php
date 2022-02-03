 <form class="browser" method="post" action="<?php echo DOCUMENT_DIR ?>pages/update_cart.php"  >
            <header style="flex-direction: column; justify-content: center ">
                <h1 style="padding: 5px">CART: <span id="num-cards">0</span>$ </h1>
                <button class="btn btn-danger" type="submit" style="width: 100%;margin: 0px;visibility:hidden" id="update-cart"  >UPDATE CART</button>
            </header>
            <div class="browser-content-wrapper">
                <div class="browser-content">

                              <div class="magic-card selected">
                            <img src="<?php echo $iValue->image_uris->normal ?>" alt="card">

                            <legend style="justify-content: center">
                                <label for="<?php echo $key ?>"><?php echo $iValue->name  ?></label>

                                <input  type="number"   value="<?php echo $value ?>" name="upd[<?php echo $key ?>]" id="<?php echo $key ?> " >

                            </legend>
                        </div>


                 </div>

            </div>
        </form>
    <script>


        let inputs = undefined
        let numCards = undefined
        let updateButton = undefined
        document.addEventListener('DOMContentLoaded', function (){
            numCards = document.getElementById('num-cards')
            updateButton = document.getElementById('update-cart')
            inputs = document.getElementsByTagName('input')
            for (input of inputs){
                input.addEventListener('change', function (){
                    if(this.value !== this.defaultValue){
                        this.parentElement.parentElement.classList.remove('selected')
                        this.parentElement.parentElement.classList.add('edited')
                    }else{
                        this.parentElement.parentElement.classList.remove('edited')
                        this.parentElement.parentElement.classList.add('selected')
                    }
                    countItems()
                    styleButton()
                })
            }
            countItems()
            styleButton()
        })

        function countItems(){
            const price = 25
            let count = 0
            for(input of inputs){
                let val = parseInt(input.value)
                val = val >= 0 ? val : 0
                count += val
            }
            numCards.innerHTML = count*price/100
        }

        function styleButton(){
            let edited = document.getElementsByClassName('edited')
            updateButton.style.visibility = (edited.length != 0) ? 'visible' : 'hidden'
        }



    </script>

