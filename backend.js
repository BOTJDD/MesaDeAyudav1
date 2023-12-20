document.addEventListener('DOMContentLoaded', function() {
  const loginForm = document.getElementById('loginForm');
  loginForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const entro = {
      username: username,
      password: password
    };
    fetch('http://localhost/MesaDeAyuda/public/api/reportes/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(entro)
    })
    .then(response => {
      if (!response.ok) {
        console.log('Ta mal');
      }else{
        //return response.json();
        window.location.href = '/Dashboard/index.php';
      }
    })
    .catch(error => {
      console.error('Fetch Error:', error);
    });
  });
});
  
