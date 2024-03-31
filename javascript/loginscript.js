function onClick(event) {
    event.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    if (username === 'admin' && password === '1234'){
        console.log("Go to Admin Page.");
        window.location.href = 'AdminPage.html';
    } 
    else if (username ==="" || password ===""){
        alert('Both fields are required!');
    }
    else {
        alert('Wrong username or password. Please try again.');
    }
}

const loginbutton = document.querySelector('#logInButton');
loginbutton.addEventListener('click', onClick);