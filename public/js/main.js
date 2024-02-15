function showPass() {
    var x = document.getElementById("user-password");
    var y = document.getElementById("showPassButton");
    event.preventDefault();
    x.type = (x.type === "password") ? "text" : "password";
    y.style.color = (x.type === "password") ? "gray" : "white";
}

function isValidPassword() {
    var password = document.getElementById("user-password").value;

    var lengthCheck = password.length >= 10;
    var uppercaseCheck = /[A-Z]/.test(password);
    var numberCheck = /\d/.test(password);
    var symbolCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);

    return lengthCheck && uppercaseCheck && numberCheck && symbolCheck;

}

function getAllInfo(){
    var firstName = document.getElementById("first-name").value;
    var userPassword = document.getElementById("user-password").value;
    return [firstName, userPassword];
}

var form = document.querySelector('.form-main'); // select the form using its class name
let WelcomeMessage = document.getElementById('welcomeName');

form.addEventListener('submit', function(event) {
    event.preventDefault(); // always prevent the default form submission
    getAllInfo();

    if(isValidPassword()) {
        alert("Bienvenue " + getAllInfo()[0] + "!");
        WelcomeMessage.innerHTML = 'Bienvenue <span style="color:green">' + getAllInfo()[0] + '</span>!';

        // Use Fetch API to submit the form
        fetch(form.action, {
            method: form.method,
            body: new FormData(form)
        })
        .then(function() {
            // After the form is submitted, wait 2000ms and then navigate to the new page
            setTimeout(function() {
                window.location.href = "?pg=getInfo";
            }, 2000);
        });
    } else {
        alert("Password is not valid - You need to have at least 10 letters - 1 uppercase letter - 1 number - 1 special symbol");
    }
});