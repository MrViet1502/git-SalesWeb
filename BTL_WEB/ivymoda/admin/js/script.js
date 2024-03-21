const meNuleft = document.querySelectorAll(".admin-content-left > ul > li")
meNuleft.forEach(function(menuitem,index){
    menuitem.addEventListener("click",function(){
        menuitem.classList.toggle("active")    
    })
})