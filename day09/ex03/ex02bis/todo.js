let ft_list = $('#ft_list');

function todoDelete(obj) {
    let del = confirm("Are you sure to delete it?");
    if (del) {
        obj.remove();
        setCookie(obj.getAttribute("name").trim(), '', -1);
    }
}

function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function createToDo(name, text) {
	return $('<div>').attr('name', name).attr('onclick', 'todoDelete(this)').addClass('todo').text(decodeURIComponent(text))
}

$(function(){
	let cookies = document.cookie.split(';');
    if (cookies[0]) {
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i].split('=');
            ft_list.append(createToDo(cookie[0], cookie[1]));
        }
    }

    $('#add').click(function(){
        let text = prompt("Add a new point", '');
        if (text) {
            let name = new Date().getTime();
            ft_list.append(createToDo(name, text));
            setCookie(name, encodeURIComponent(text), 7);
        }
    })
})
