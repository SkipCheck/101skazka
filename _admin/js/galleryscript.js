let button = document.querySelector(".add-button");
    button.addEventListener("click", function(event){
        let form = document.createElement("form");
        form.classList.add("hidden-form");
        form.action = "createPhoto.php";
        form.style.display = "none";
        form.method = "post";
        form.enctype = "multipart/form-data";

        let childInput = document.createElement("input");
        childInput.type = "file";
        childInput.name = "image";

        let childSubmit = document.createElement("button");
        childSubmit.type = "submit";

        form.appendChild(childInput);
        form.appendChild(childSubmit);

        let table = document.querySelector(".table");
        table.appendChild(form);

        childInput.click();

        childInput.addEventListener("change", function(event){
            childSubmit.click();
        });
    })