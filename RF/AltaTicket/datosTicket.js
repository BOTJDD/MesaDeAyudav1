document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('datosTicket');
    loginForm.addEventListener('submit', function(event) {
      event.preventDefault();
      const asunto = document.getElementById('Asunto').value;
      const descripcion = document.getElementById('Descripcion').value;
      const entro = {
        asunto: asunto,
        descripcion: descripcion
      };
      fetch('http://localhost/MesaDeAyuda/public/api/tickets', {
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
          return response.json();
        }
      })
      .catch(error => {
        console.error('Fetch Error:', error);
      });
    });
  });
    
  