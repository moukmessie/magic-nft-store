
<div class='browser-content'  style="box-sizing: border-box  content: ''; display: table; clear: both">
    <div style=" float: left">
        <div class="product-images " style="flex: 1; padding: 32px">
            <img  style="max-width: 100%; max-height: 400px;" src="<?=$params["cards"]->image_uris->normal ?>" id="post" alt="">
        </div>
    </div>
    <div style=" float: left;width: 50%;padding-top: 50px;height: 300px">
        <h1 ><?=$params["cards"]->type_line ?></h1>
        <h2 style=" font-size: 22px;font-weight: 300; margin: 16px 0 8px"><?=$params["cards"]->name ?></h2>
        <h2 style="margin: 32px 0 16px"> Spécificités</h2>
        <h3 style=" font-size: 22px;font-weight: 300; margin: 16px 0 8px"><?=$params["cards"]->set_name ?></h3>
        <p style="margin: 16px 0 0 16px"><?= $text = !empty($params["cards"]->flavor_text)? $params["cards"]->flavor_text : null ?></p>
        <p style="margin-top: 8px"> <?=$params["cards"]->oracle_text ?></p>
    </div>

</div>
