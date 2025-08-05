const send_image = document.querySelector(".typing-area .image");
const image = document.querySelector(".typing-area .upload_img");
const form = document.querySelector(".typing-area"),
incoming_id =  form.querySelector(".incoming_id").value,
sendBtn = form.querySelector(".send_btn"),
inputField = form.querySelector(".input-field"),
chatBox= document.querySelector(".chat-box");

send_image.onclick = () =>{
    image.click();
}

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value  != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}


image.oninput = ()=>{
    if(image.value  != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick =()=>{
 let xhr = new XMLHttpRequest();

 xhr.open("POST", "php/insert_chat.php", true);


 xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            inputField.value = "";
            image.value = "";
            sendBtn.classList.remove("active");
        }
    }
 }


let formData = new FormData(form);
 xhr.send(formData);


};