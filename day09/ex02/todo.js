let ft_list = document.getElementById('ft_list');

function todoDelete(obj) {
    let del = confirm("Are you sure to delete it?");
    if (del) {
        ft_list.removeChild(obj);
        setCookie(obj.getAttribute("name").trim(), '', -1);
    } 
}

function setCookie(cname, cvalue, exdays) {
        let d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

window.onload = function() {
    let cookies = document.cookie.split(';');
    if (cookies[0]) {
        for (let i = 0; i < cookies.length; i++) {
            let arr = cookies[i].split('=');
            ft_list.innerHTML += '<div name="' + arr[0].trim() + '" class="todo" onclick="todoDelete(this)">' + decodeURIComponent(arr[1]) + '</div>';
        }
}

    document.getElementById('add').onclick = function(){
        let add = prompt("Add a new point", '');
        if (add) {
            let i = new Date().getTime();
            ft_list.innerHTML += '<div name="' + i + '" class="todo" onclick="todoDelete(this)">' + add + '</div>';
            setCookie(i, encodeURIComponent(add), 7);
        }
    }
}
