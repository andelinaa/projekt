const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span")

form.onsubmit = (e)=>{
    e.preventDefault(); //priprava slozky na poslani
    statusTxt.style.color = "#0D6EFD";
    statusTxt.style.display = "block";


    let xhr = new XMLHttpRequest(); //vytvoreni noveho xml objektu
    xhr.open("POST", "message.php", true); //poslani dopisu do zpravy php slozky
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let response = xhr.response;
           if(response.indexOf("Doplňte Email a Zprávu!") != -1 || response.indexOf("Emailová adresa je špatně zadaná!") || response.indexOf("Vyplňte prosím formulář!") ){
            statusTxt.style.color = "red";
           }else{
            form.reset();
            setTimeout(()=>{
                statusTxt.style.display = "none";
            }, 3000);
           }
            statusTxt.innerText = response;
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}