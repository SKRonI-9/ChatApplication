const form=document.querySelector(".typing-area"),
inputField=form.querySelector(".input-field"),
sendBtn=form.querySelector("button"),
chatBox=document.querySelector(".chat-box");

sendBtn.onclick=()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","insert-chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value="";
            }
        }
    }
    let formData=new FormData(form);
    xhr.send(formData);
}