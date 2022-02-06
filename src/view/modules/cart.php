 <div class="browser" >
    <?php if (count($params['cards']) !=0) :?>
     <header style="flex-direction: column; justify-content: center ">
         <h1 style="padding: 5px">CART: <span id="num_cards"><?= $_SESSION['cart']['quantity']*25/100?></span>$ </h1>
         <div id="alert" class="alert alert-danger" role="alert" style="visibility: hidden">
             Quantité maximum pour ce produit
         </div>
     </header>
     <div class="browser-content-wrapper">
         <div class="browser-content">
             <?php for ($iValue=0; $iValue<count($params['cards']); $iValue++) {?>
                 <div class="magic-card selected">
                     <img src="<?= $params['cards'][$iValue]->image_uris->normal ?>" alt="card">
                     <legend style="justify-content: center ">
                         <label for=""><?= $params['cards'][$iValue]->name  ?></label>
                         <form method="post" action="/cart/update" style="display: flex">
                             <label>
                                 <input type="text" name="id_product" style="position: absolute;visibility: hidden"  value="<?= $params['cards'][$iValue]->id ?>">
                                 <input type="text" class="btn_value" name="quantity" style="position: absolute;visibility: hidden"  value="<?= $params['quantity'][$iValue] ?>">

                             </label>
                             <input class="btn_less" type="submit" style="margin: 0 2px" value="-"   >
                             <input  type="button"  style="background: white" disabled value="<?=  $params['quantity'][$iValue]?> "  >
                             <input class="btn_more" type="submit" style="margin: 0 2px"  value="+"   >
                         </form>
                         <form action="/cart/delete" method="post">
                             <button type="submit" class="delete">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                     <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                     <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                 </svg>
                             </button>
                             <label>
                                 <input type="text" name="delete" style="position: absolute;visibility: hidden"  value="<?= $params['cards'][$iValue]->id ?>">
                             </label>
                         </form>
                     </legend>
                 </div>
             <?php }  ?>

         </div>
     </div>
        <script>

            document.addEventListener('DOMContentLoaded', function () {
                let btn_less = document.getElementsByClassName('btn_less');
                let btn_more = document.getElementsByClassName('btn_more');
                let btn_value = document.getElementsByClassName('btn_value');
                const MAX_PRODUCT = 5;
                for (let i = 0; i < btn_less.length; i++) {

                    btn_less[i].addEventListener('click', () => {
                        if ( parseInt(btn_value[i].value) > 1) {
                            btn_value[i].value = parseInt(btn_value[i].value) - 1;
                        }else{
                            btn_less[i].disabled=true;
                        }

                    })
                }
                for (let i = 0; i < btn_more.length; i++) {
                    btn_more[i].addEventListener('click', () => {
                        if (parseInt(btn_value[i].value) < MAX_PRODUCT) {
                            btn_value[i].value = parseInt(btn_value[i].value) + 1;
                        }else{
                            btn_more[i].disabled=true;
                            document.getElementById('alert').style.visibility="visible";
                        }
                    })
                }
            })

        </script>

 </div>
<?php else:?>
    <div class="browser-content" >
        <div class="browser-content-wrapper">
             <div class="alert alert-primary" >
                 Votre panier est vide. <a href="/shop" class="alert-link">aller dans la boutique</a>
             </div>
        </div>
    </div>
<?php endif; ?>
