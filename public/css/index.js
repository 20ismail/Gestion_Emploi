
document.addEventListener('DOMContentLoaded', function () {
    // Retrieve username from sessionStorage
    const username = sessionStorage.getItem('username');
  
    // Check if username exists in sessionStorage
    if (username) {
      // Display username on the index.html page
      const usernameDisplay = document.getElementById('usernameDisplay');
      if (usernameDisplay) {
        usernameDisplay.textContent = username;
      } else {
        console.error('Element with ID "usernameDisplay" not found.');
      }
    } else {
      // Redirect to login page if no username is found
      window.location.replace('Loginpage.html');
    }
  });
  