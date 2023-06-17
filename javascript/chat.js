const form = document.querySelector(".typing-area"),
inputField =  form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
deleteBtn = document.querySelector("#edit_mess"),

chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
 e.preventDefault();
}


sendBtn.onclick =()=> {

    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST","php/insert-chat.php", true );
    xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
              inputField.value= ""; // if the message once  inserted to the databas leave the input file blank
              scrollToBom(); 
    
            }
          }
    }
    //we have to send th form dat through ajax to php 
    let formData = new FormData(form); //creatin new formData objcet
    xhr.send(formData); // sending the form data

}

// for deleting message 







chatBox.onmouseenter = ()=>{
  chatBox.classList.add("active");

}
chatBox.onmouseleave = ()=>{
  chatBox.classList.remove("active");

}
setInterval(()=>{
  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("POST","php/get-caht.php", true );
  xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200 ){
              let data = xhr.response;
              chatBox.innerHTML = data; 
              if(!chatBox.classList.contains("active")){
                scrollToBom();  
              }
               
          } 
        }
  }
    let formData = new FormData(form); //creatin new formData objcet
    xhr.send(formData); // sending the form data
}, 500); //this function will run frequently after 500ms

function scrollToBom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}