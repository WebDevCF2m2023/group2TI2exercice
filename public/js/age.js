let confirmAge = document.getElementById('confirm-age-button');

confirmAge.addEventListener('click', () => {
    let userAge = document.getElementById('user-age').value;
    if(userAge < 20) {
        console.log("User is below 20");
        alert("You are not allowed to access this website");
    } else {
        console.log("User is 20 or above");
        window.location.href = "pages/form.html";
    }
});