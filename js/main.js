let inputs = document.getElementsByClassName('validate');
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('invalid', check);
    inputs[i].addEventListener('input', reset);
}
document.getElementById('regform').addEventListener('submit', checksubmit);
function check(event) {
    this.classList.add('error');
    document.getElementById('error').innerText = "Некорректно заполнены поля!"
    document.getElementById('error').style.display = "block";
    event.preventDefault();
}
function reset(event) {
    this.classList.remove('error');
}

function checksubmit(event) {
    document.getElementById("error").style.display = "none";
    let password = document.getElementById('password').value;
    let confirm = document.getElementById('confirm').value;
    let flag = document.getElementById('check').checked;
    if (password != confirm) {
        document.getElementById('error').innerText = "Пароли не совпадают!";
        document.getElementById('error').style.display = "block";
        event.preventDefault();
    } else if (!flag) {
        document.getElementById('error').innerText = "Согласие на обработку!";
        document.getElementById('error').style.display = "block";
        event.preventDefault();
    } else {
        event.preventDefault();
        checkLogin();
    }

}
async function checkLogin() {
    let login = document.getElementById('login').value;
    let data = new FormData();
    data.append('login', login);
    let response = await fetch('../php/checklogin.php', {
        method: "POST",
        body: data
    });
    let result = await response.json();
    if (result.status == 'error') {
        document.getElementById('error').innerText = result.message;
        document.getElementById('error').style.display = "block";
    }
    else {
        document.getElementById('regform').submit();
    }
}