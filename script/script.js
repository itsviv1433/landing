function contact(e){
    e.preventDefault();
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    var http = new XMLHttpRequest();
    var url = './api/submit_form.php';
    var params = 'name='+name+'&email='+email+'&message='+message;
    http.open('POST', url, true);
    
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            var response = JSON.parse(http.responseText);
            if(response.code){
                alert("We Successfully Received your Message.");
                window.location.replace("/landing#contact");
            }else{
                alert(response.msg);   
            }
        }
    }
    http.send(params);
}
