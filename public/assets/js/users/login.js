// Login form handling
const loginForm = document.querySelector(".login");
if (loginForm) {
    loginForm.onsubmit = function (e) {
        e.preventDefault();
        // login code...
        const email = document.querySelector(".email").value;
        const password = document.querySelector(".password").value;

        fetch("/api/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        })
            .then(res => res.json())
            .then(data => {
                console.log("Login response:", data);

                if (data.success && data.data) {
                    localStorage.setItem("api_token", data.data);
                    localStorage.setItem("user_name", data.data);
                    //console.log("Token saved:", data.data);
                    //alert("Login successful!");
                    window.location.href = "/index"; // redirect to todos page
                } else {
                    alert("Login failed: " + data.message);
                }
            })
            .catch(err => console.error("Error:", err));
    };
};

