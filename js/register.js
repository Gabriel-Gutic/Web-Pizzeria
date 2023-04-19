function SetAlert(error)
{
    const errorDiv = document.createElement("div");

    errorDiv.setAttribute('class', 'alert alert-danger');
    errorDiv.setAttribute('role', 'alert');

    errorDiv.appendChild(document.createTextNode(error));

    const mainColumn = document.getElementById("main-column");
    mainColumn.insertBefore(errorDiv, document.getElementById("title"));
}

function OnRegister()
{
    if (document.getElementById("lastname").value == "" ||
    document.getElementById("firstname").value == "" ||
    document.getElementById("email").value == "" ||
    document.getElementById("phone").value == "" ||
    document.getElementById("password").value == "" ||
    document.getElementById("password-again").value == "")
    {
        SetAlert("Completați toate câmpurile obligatorii!");
    }
    else
    {
        let password = document.getElementById("password");
        let password_again = document.getElementById("password-again");
        
        if (password.value != password_again.value)
        {
            SetAlert("Parolele nu coincid!");
        }
        else
        {
            document.getElementById("register-form").submit();
        }
    }
}