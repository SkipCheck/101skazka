const btnLogin = document.querySelector(".btn-lg");
if(btnLogin != null){
    btnLogin.addEventListener('click', function(event){
        const login = document.getElementById("floatingInput");
        const password = document.getElementById("floatingPassword");
        if(login.value.length < 3){
            event.preventDefault();
            alert("Длина логина не должна быть меньше 3 символов!");
        }
        if(password.value.length < 3){
            event.preventDefault();
            alert("Длина пароля не должна быть меньше 3 символов!");
        }
    });
}

const btnOpen = document.querySelectorAll(".js-modal-open");
btnOpen.forEach(function(item, i, btn){
    item.addEventListener("click", function(event){
        if(!item.classList.contains("order-form__btn")){
            event.preventDefault();
            const modalWindow = document.getElementById(item.getAttribute("data-open").replace("#", ""));
            modalWindow.classList.add("_active");
        }
    });
});

const modalOpened = document.querySelectorAll(".modal");
modalOpened.forEach(function(item, i, modal){
    item.addEventListener("click", function(event){
        const target = event.target;
        const closeBtn = target.closest(".modal__close");
        if(target.classList.contains("modal__close")){
            item.classList.remove("_active");
            clearFields();
        }
    });
});


function closeOther(itemOther){
    const services = document.querySelectorAll(".category-name");
    services.forEach(function(item, i, modal){
        if(item != itemOther){
            let parent = item.parentNode;
            let servicesBlock = parent.querySelector(".services-block");
            parent.style.width = "20%";
            servicesBlock.style.display = "none";
        }
    });
}

const listServices = document.querySelectorAll(".category-name");
listServices.forEach(function(item, i, modal){
    item.addEventListener("click", function(event){
        closeOther(item);
        let parent = item.parentNode;
        parent.style.width = "100%";
        let servicesBlock = parent.querySelector(".services-block");

        if(window.getComputedStyle(servicesBlock).display == "none"){
            servicesBlock.style.display = "flex";
        }else{
            servicesBlock.style.display = "none";
            parent.style.width = "20%";
        }
    });
});

let prevOrders = 0;
let prevFeedback = 0;
function update() {
    $.ajax({
        url: './includes/dynamicValueOrder.php',
        data: "JSON",
        success: function(data) {
            let number = $.parseJSON(data);
            if(number != prevOrders){
                $('#dynamic-orders').html(data);
                $.ajax({
                    url: './includes/ordersTable.php',
                    success: function(data) {
                        $('#dynamic-table-orders').html(data);
                    }
                });
                prevOrders = number;
            }
        }
    });
    $.ajax({
        url: './includes/dynamicValueFeedback.php',
        data: "JSON",
        success: function(data) {
            let number = $.parseJSON(data);
            if(number != prevFeedback){
                $('#dynamic-feedback').html(data);
                $.ajax({
                    url: './includes/feedbackTable.php',
                    success: function(data) {
                        $('#dynamic-table-feedback').html(data);
                    }
                });
                prevFeedback = number;
            }
        }
    });
};
setInterval(update, 500);