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