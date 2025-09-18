//register new user
var registerform = document.querySelector('.register');

registerform.onsubmit = function (e) {
    e.preventDefault();

    var user_id = document.querySelector('#user_id').value;
    var fullname = document.querySelector('#fullname').value;
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#password').value;
    var phone = document.querySelector('#phone').value;
    var address = document.querySelector('#address').value;

   // console.log(user_id, fullname, email, password, phone, address);

    fetch('/api/signup', {
        method: 'POST',
        headers: {
            //'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            user_id: user_id,
            name: fullname,
            email: email,
            password: password,
            phone: phone,
            address: address
        })

    })
        .then(response => response.json())
        .then(data => {
            //console.log(data);
            window.location.href="/";

        })
        .catch(error => {
            console.error('Error:', error);
        });
        
} 



