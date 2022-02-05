 <div class="browser" >

     <header style="flex-direction: column; justify-content: center ">
         <h1 style="padding: 5px">CART: <span id="num_cards"><?= $_SESSION['cart']['quantity']*25/100?></span>$ </h1>
     </header>
     <div class="browser-content-wrapper">
         <div class="browser-content">
             <?php for ($iValue=0; $iValue<count($params['cards']); $iValue++) {?>
                 <div class="magic-card selected">
                     <img src="<?= $params['cards'][$iValue]->image_uris->normal ?>" alt="card">
                     <legend style="justify-content: center ">
                         <label for=""><?= $params['cards'][$iValue]->name  ?></label>
                         <form method="post" action="/cart/update" style="display: flex">
                             <input type="text" name="id_product" style="position: absolute;visibility: hidden"  value="<?= $params['cards'][$iValue]->id ?>">
                             <input id="btn_less" type="submit" style="margin: 0 2px" value="-"   >
                             <input  id="btn_value" type="button" style="background: white" disabled value="<?=  $params['quantity'][$iValue]?>" name="quantity"  >
                             <input id="btn_more" type="submit" style="margin: 0 2px"  value="+"   >
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
 </div>
<script>
    
        document.addEventListener('DOMContentLoaded', function (){
            let btn_less = document.getElementById('btn_less');
            let btn_more= document.getElementById('btn_more');
            let btn_value = document.getElementById('btn_value');

            btn_less.addEventListener('click',()=>{
                btn_value.value = parseInt(btn_value.value) - 1;

            })
            btn_more.addEventListener('click',()=>{
                btn_value.value =parseInt(btn_value.value) + 1;
            })
        })

</script>

