// Example 26-14: javascript.js

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }


function GetCategory (id)
{
    data = 'id='+ id;
    request = new ajaxRequest()
    request.open("POST", "/get", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8")   // При использовании обьекта FormData это почему-то не нужно
    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'))   // При использовании обьекта FormData это почему-то не нужно

    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                {
                    alert(this.responseText);
                    var response = JSON.parse(this.responseText);
                    alert(response);

/*                    for (var key in response) 
                    {
                    // этот код будет вызван для каждого свойства объекта
                    // ..и выведет имя свойства и его значение
                    // alert( "Ключ: " + key + " значение: " + response[key] );
                    newdiv = document.createElement('div');
                    newdiv.className = "dropdown-item";
                    newdiv.innerHTML  = response[key];

                    Categories.appendChild(newdiv); 
                    }*/
                }
    }
    request.send(data);
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