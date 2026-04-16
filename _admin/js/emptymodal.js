const modal = document.querySelectorAll(".modal");
modal.forEach(function(item, i, modal){
    item.addEventListener("click", function(event){
        const target = event.target;
        const closeBtn = target.closest(".modal__close");
        if(target.classList.contains("modal") || closeBtn || target.classList.contains("modal__close")){
            item.classList.remove("_active");
            clearFields();
        }
    });
});

const btn = document.querySelectorAll(".js-modal-open");
btn.forEach(function(item, i, btn){
    item.addEventListener("click", function(event){
        if(!item.classList.contains("order-form__btn")){
            event.preventDefault();
            const modalWindow = document.getElementById(item.getAttribute("data-open").replace("#", ""));
            modalWindow.classList.add("_active");
        }else{
            if(checkFields()){
                const modalActive = document.querySelector(".modal._active");
                modalActive.classList.remove("_active");

                const modalWindow = document.getElementById(item.getAttribute("data-open").replace("#", ""));
                modalWindow.classList.add("_active");
            }else{
                event.preventDefault();
            }
        }
    });
});