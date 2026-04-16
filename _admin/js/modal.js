function check(){
    const fields = document.querySelectorAll(".form-control");
    let checked = true;

    fields.forEach(function(item, i, fields){
        if(!item.classList.contains("disableCheck")){
            if(item.value == null || item.value == ""){
                checked = false;
                return;
            }
        }
    });
    
    if(!checked){
        alert("Заполните все поля!");
    }
    return checked;
}

const btnModals = document.querySelector(".btn-add");
if(btnModals !== null){
    btnModals.addEventListener('click', function(event){
        if(!check()){
            event.preventDefault();
        }
    });
}