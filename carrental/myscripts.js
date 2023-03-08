
    function validate() {
        var x = document.forms["form1"]["user_name"].value;
        var y = document.forms["form1"]["password"].value;
        var yy = document.forms["form1"]["passwordconfirm"].value;
        var z = document.forms["form1"]["email"].value;
        if (x == null || x == "") {
            alert("username must be filled out");
            return false;
        }
        if (y == null || y == "") {
            alert("password must be filled out");
            return false;
        }
        if (y != yy){
            alert("password confirmation error");
            return false;
        }
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (z.search(mailformat)==-1) {
            alert("You have entered an invalid email address!");
            return false;
        }

        return true;
    }

    function validate2() {
        var y = document.forms["form2"]["password"].value;
        var z = document.forms["form2"]["email"].value;
        if (y == null || y == "") {
            alert("password must be filled out");
            return false;
        }
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (z.search(mailformat)==-1) {
            alert("You have entered an invalid email address!");
            return false;
        }

        return true;
    }

    function ajax()  {
        var y = document.forms["form2"]["password"].value;
        var z = document.forms["form2"]["email"].value;
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "loginajax.php", true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("email=" +z + "&password=" +y);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var r = xhttp.responseText;
              if(r=="yes")
              {
                document.getElementById("bbb").style.backgroundColor = "#00ff00";
              }else{
                document.getElementById("bbb").style.backgroundColor = "#AE1100";
              }
            }
          };
          


    }