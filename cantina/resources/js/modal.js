export default function modal(){

    const btn_open = document.querySelector("#open_modal")
    const btn_close= document.querySelector("#close_modal")
    const modal    = document.querySelector("#dialog")

    btn_open.onclick = function(){
        modal.showModal();
    }

    btn_close = function(){
        modal.close();
    }
    console.log('Pk.Siga Carregamento Modal modal.js');
}
