
const logoutBtn = document.getElementById('logoutBtn');


if (logoutBtn) {
    logoutBtn.addEventListener('click', (event) => {
        const confirmLogout = confirm("Are you sure you want to log out?");
        if (!confirmLogout) {
            event.preventDefault();
        }
    });
}

console.log("PHP is handling the validation and sessions.");