// Example 26-14: javascript.js

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }


function GetCategory (id)
{
    trigg = document.getElementById('trigg'+id).value;

    if(trigg == 0)
    {
        document.getElementById('trigg'+id).value = 1;

        data = 'id='+ id;
        request = new ajaxRequest()
        request.open("POST", "/get", true)
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8")    // При использовании обьекта FormData это почему-то не нужно
        request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'))          // При использовании обьекта FormData это почему-то не нужно
        
        request.onreadystatechange = function()
        {
            if (this.readyState == 4)
                if (this.status == 200)
                    if (this.responseText != null)
                    {
//                        alert(this.responseText);
                        var response = JSON.parse(this.responseText);

                        if (response.length == 0)
                        {
                            document.getElementById('item'+id).className = 'red-text list-group-item animated shake';
                        }
                        else
                        {
                            parent = document.getElementById('data'+id);

                            for (var key in response) 
                            {                             
                                parent.innerHTML += "<li id='item"+ response[key].id +"' class='blue-grey-text point list-group-item animated fadeInRight faster'><form  onclick='GetCategory("+ response[key].id +");'>"+ 
                                response[key].id +" "+ response[key].name +" "+ response[key].parent_id +
                                "<input id='trigg"+ response[key].id +"' type='hidden' value='0'> </form><ul id='data"+ response[key].id +"'> </ul></li>";
                            }
                        }
                    }
        }
        request.send(data);
    }
    else
    {
        document.getElementById('trigg'+id).value = 0;
        document.getElementById('data'+id).className = 'animated fadeOutRight faster';

        // Событие произходит по окончанию анимирования. Проверяем состояние value элемента 'trigg'+id потому что
        // нам нужно удалять содержимое 'data'+id только если анимация fadeOutRight.
        $("#data"+id).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            if(document.getElementById('trigg'+id).value == 0)
            {
                document.getElementById('data'+id).innerHTML = '';
                document.getElementById('data'+id).className = '';
            }
        });
    }
}

function ajaxRequest()
{
    try { var request = new XMLHttpRequest() }

    catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
            catch(e3) {
                request = false
            } 
        } 
    }
    return request
}
//=================================================================================================