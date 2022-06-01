const loginButton = document.querySelector("#login-submit");

loginButton.addEventListener("click", function() {NextPage();});

function NextPage()
{
    window.location.href = "student.html";
}