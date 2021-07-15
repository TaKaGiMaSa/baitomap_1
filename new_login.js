let newlogin_data = [];
const url = 'new_login.php';

document.getElementById("new_login").onclick = function () {
    newlogin_data.push(document.getElementById('user').value);
    newlogin_data.push(document.getElementById('pass').value);
    fetch(url, {
        method: "POST",
        body: JSON.stringify(newlogin_data)
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.blob();
    })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
    console.log(newlogin_data);
    window.location.href = 'login.html'; // 遷移
}