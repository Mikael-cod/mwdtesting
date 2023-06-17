<?php
session_start();
include_once "config.php";
$title = mysqli_real_escape_string($con, $_POST['title']);
$discription =mysqli_real_escape_string($con, $_POST["discription"]);
$price =mysqli_real_escape_string($con, $_POST["price"]);

$error = '';
        
            if(!empty($title) && !empty($discription) && !empty($price)){

                if(isset($_FILES["image"])){
                    //if file is uploaded
                    $img_name = $_FILES["image"]['name']; // getting user uploaded img name
                    $img_type = $_FILES["image"]["type"];
                    $tmp_name = $_FILES["image"]["tmp_name"];
                    $img_type = $_FILES["image"]["type"]; // this temp name is used to save/move file in our folder


                    // let's explode image end get the last extension like jpg png  
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);// here we get the extension of an user uploaded img file

                    $extension = ['png', 'jpeg', 'jpg'];// these are sore valid img ext and we've store them in array 
                    if(in_array($img_ext, $extension)=== true){    
                        // if user uploaded in=mg ext is matched with any array extensions 
                        $time =time(); // this will return us current time.. 
                        // we need theis time because when you uploading user img to in our folder we rename user file with current time 
                        // so all the image file will have a unique name
                        // once user signed up then this status will be active now 

                        $new_img_name = $time.$img_name;
                        //let's move the user uploaded img to our particlar folder
                        if(move_uploaded_file($tmp_name,"../admin/post_img/".$new_img_name)){

                            $random_id = time() ;  // creating random is for user 
                            // let's insert all user data inside table
                            $sql2 = mysqli_query($con, "INSERT INTO `post` (title,discription,price, image) 
                                                                    values ('$title','$discription','$price','$new_img_name')");
                                    if($sql2){ 
                                            $error = '<div class ="mess-sucess">
                                                         Posted successful! 
                                                      </div>';    
                                        
                                    }else{
                                        $error ='<div class ="mess">
                                                     somthing went wrong !'.mysqli_error($con).'
                                                 </div> ';
                                    }
                        }

                    }else{
                        $error ='<div class ="mess">
                        please select image file like  jpeg png jpg
                     </div> ';
                    }


                }else{
                    $error = '<div class ="mess">
                    pleas select an image file!
                 </div> ';
                }
               
            }else{

                $error = '<div class ="mess">
                    All filed requierd
                 </div> ';
            } 
echo $error;
?>