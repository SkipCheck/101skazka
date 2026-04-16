function closeableAllServices(item){
    const otherService = document.querySelectorAll(".more__level");
    
    otherService.forEach(function(otherItem, i, modal){
        
        if(item != otherItem){
            otherItem.classList.remove("active-list");
            const elements = otherItem.querySelector(".under-list");
            elements.style.opacity = "0";
            elements.style.height = "0px";
        }
    });
  }

const listService = document.querySelectorAll(".more__level");
listService.forEach(function(item, i, modal){
    item.addEventListener("click", function(event){
        if(!item.classList.contains("active-list")){
            closeableAllServices(item);
            item.classList.add("active-list");
            const elements = item.querySelector(".under-list");
            const mainList = item.querySelector(".content-list");
            elements.style.opacity = "1";
            elements.style.height = elements.scrollHeight+14+"px";
        }else{
            const target = event.target;
            if(target.classList.contains("category-name")){
                item.classList.remove("active-list");
                const elements = item.querySelector(".under-list");
                elements.style.opacity = "0";
                elements.style.height = "0px";
            }
        }
    });
});