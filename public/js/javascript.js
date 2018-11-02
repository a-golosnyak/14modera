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
                      alert(this.responseText);
                        var response = JSON.parse(this.responseText);
//                      alert(response[0].name);

                        if (response.length == 0)
                        {
                            document.getElementById('item'+id).className = 'red-text';
                        }
                        else
                        {
                            parent = document.getElementById('data'+id);
                            ul = document.createElement('ul');
                            ul.className = "";

                            for (var key in response) 
                            {                     
                                ul.innerHTML += "<li id='item"+ response[key].id +"' class='point blue-grey-text'><form  onclick='GetCategory("+ response[key].id +");'>"+ 
                                                response[key].id +" "+ response[key].name +" "+ response[key].parent_id +"<input id='trigg"+ response[key].id +
                                                "' type='hidden' value='0'></form><div id='data{{$cat->id}}'> </div></li>";

                                parent.appendChild(ul);
                            }
                        }
                    }
        }
        request.send(data);
    }
    else
    {
        document.getElementById('trigg'+id).value = 0;
        parent = document.getElementById('data'+id).innerHTML = '';
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