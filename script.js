// document.querySelector('') 是用於 返回文档中与指定的选择器
let menu = document.querySelector('#menu-btn');
let navbar=document.querySelector('.header .navbar')

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

// 意思是 當你點選了第一個的document.querySelector，亦即是admin_me.php中的cancel和('#close-edit')時，
// 就會執行第二個document.querySelector('.edit-form-container')就是 整個菜單更改的畫面被刪掉了.
document.querySelector('#close-edit').onclick= ()  =>{
    document.querySelector('.edit-form-container').style.display=`none`;
    window.location.href='admin_me.php';
}