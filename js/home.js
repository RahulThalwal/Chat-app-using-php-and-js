 const searchBar = document.querySelector(".search input"),
 searchIcon = document.querySelector(".search button"),
 allUsers = document.querySelector(".all_users");


 setInterval (() =>{

    let xhr = new XMLHttpRequest(); // Creates a new AJAX request
 
    xhr.open("GET", "php/home.php", true);// Makes a GET request to 'php/home.php'
     xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;// Response from the server (HTML list of users)
                allUsers.innerHTML = data;// Response from the server (HTML list of users)
            }
        }
     }

     xhr.send();
 }, 500);