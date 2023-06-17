const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-tex");
 
form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
  // let's start ajax 
  
    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST","php/verify.php", true );
    xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
                let data = xhr.response;
               if(data == "success"){
                location.href = "reseat.php"; 
                console.log(data);
                   
                }else{
                   errorText.style.display = 'block';
                    errorText.innerHTML = data;
                    
                  
                 
                }
            }
            
          }
    }
    //we have to send th form dat through ajax to php 
    let formData = new FormData(form); //creatin new formData objcet
     
    xhr.send(formData); // sending the form data to php 
}