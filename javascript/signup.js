const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-tex"),
$inputfield = document.querySelectorAll(".form .field");
form.onsubmit = (e)=>{
  e.preventDefault();
}

continueBtn.onclick = ()=>{
  // let's start ajax 
  
    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST","php/signup.php", true );
    xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
                let data = xhr.response;
                if(data == "success"){
                 $inputfield.value = "";   
                }else{
                  errorText.style.display = 'block';
                  errorText.innerHTML = data;
                  $inputfield.value = "";  
                }
            }   
          }
    }
    //we have to send th form dat through ajax to php 
    let formData = new FormData(form); //creatin new formData objcet    
    xhr.send(formData); // sending the form data to php 
}