function Check_password()
{
    password_1 = document.getElementById("password_1").value;
    password_2 = document.getElementById("password_2").value;
    if (password_1 != password_2)
        { return false;} return true; }

function add_account()
        { _error=0;
        document.getElementById("username")
        document.getElementById("email")
        document.getElementById("password_1")
        document.getElementById("password_2")

    if (document.getElementById("username").value=="")
        { document.getElementById("username")
        _error=1;
        }
    if (document.getElementById("email").value=="")
        {document.getElementById("email")
        _error=1;
        }

    if (document.getElementById("password_1").value=="")
        {document.getElementById("password_1")
        _error=1;
        }

    if (document.getElementById("password_2").value=="")
       {document.getElementById("password_2")
        _error=1;
        }

    if(Check_password() == false)
        { _error=1;
        document.getElementById("password_1")
        document.getElementById("password_2").style.background="#fa897a";
        }
    if(_error==0)
        { document.getElementById("SignUp").submit(); }
}
