window.onload = function() {
    var button = document.createElement("button");
    button.innerHTML = "Показать/Скрыть Картинку";

    document.getElementById("button-2").appendChild(button);

    var image = document.getElementById("umagik");

    button.onclick = function() {
        if (image.style.display === "none") {
            image.style.display = "block";  
        } else {
            image.style.display = "none"; 
        }
    };
};