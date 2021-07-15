let login_data;
let user_list;
let pass_list;
const url = 'login.php';
let response = fetch(url)
    .then(response => response.json())
    .then(data => {
        login_data = data;
        console.log(login_data);
        user_list = data.map(x => x.user_id);
        pass_list = data.map(y => y.password);
    });

document.getElementById("login").onclick = function () {

    const user_id = document.getElementById("user").value;
    const pass = document.getElementById("pass").value;
    const a = user_list.includes(user_id);
    const b = pass_list.includes(pass);

    if (a) {
        if (b) {
            alert("ログイン成功");
            window.location.href = 'manage.html'; // 遷移
        }
        else {
            alert("パスワードが間違ってます");
        }
    }
    else {
        alert("ユーザIDが間違ってます");
    }

}