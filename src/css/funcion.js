document.getElementById('userForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const usuario_nombre = document.getElementById('usuario_nombre').value;

    fetch(`https://api.github.com/users/${usuario_nombre}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.name) {
                document.getElementById('userInfo').innerHTML = `
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${data.name}</h5>
                            <p class="card-text">Nombre de Usuario: ${data.login}</p>
                        </div>
                    </div>
                `;
            } else {
                document.getElementById('userInfo').innerHTML = `<div class="alert alert-warning" role="alert">Usuario no encontrado o nombre no especificado en el perfil de GitHub.</div>`;
            }
        })
        .catch(error => {
            console.error('Error al obtener el usuario de GitHub:', error);
            if (error.message.includes('404')) {
                document.getElementById('userInfo').innerHTML = `<div class="alert alert-danger" role="alert">Usuario no encontrado. Verifique el nombre de usuario e intente nuevamente.</div>`;
            } else {
                document.getElementById('userInfo').innerHTML = `<div class="alert alert-danger" role="alert">Error al obtener la información del usuario. Por favor, inténtelo más tarde.</div>`;
            }
        });
});

document.addEventListener('DOMContentLoaded', function () {
    fetch('https://restcountries.com/v3.1/all')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud de países');
            }
            return response.json();
        })
        .then(data => {
            const countrySelect = document.getElementById('country');
            countrySelect.innerHTML = '<option value="">Seleccione un país</option>';

            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.cca2;
                option.textContent = country.name.common;
                countrySelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al obtener los países:', error);
            document.getElementById('countryInfo').innerHTML = `<div class="alert alert-danger" role="alert">Error al obtener la lista de países. Por favor, inténtelo más tarde.</div>`;
        });
    document.getElementById('countryForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const countryCode = document.getElementById('country').value;

        if (!countryCode) {
            document.getElementById('countryInfo').innerHTML = `<div class="alert alert-warning" role="alert">Por favor, seleccione un país.</div>`;
            return;
        }

        fetch(`https://restcountries.com/v3.1/alpha/${countryCode}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud del código de marcación');
                }
                return response.json();
            })
            .then(data => {
                const dialCode = data[0].idd.root + (data[0].idd.suffixes[0] || '');
                document.getElementById('countryInfo').innerHTML = `
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${data[0].name.common}</h5>
                            <p class="card-text">Código de Marcación: ${dialCode}</p>
                        </div>
                    </div>
                `;
                document.getElementById('contactForm').classList.remove('d-none');
                document.getElementById('dialCode').value = dialCode;
                document.getElementById('countryName').value = data[0].name.common;
            })
            .catch(error => {
                console.error('Error al obtener el código de marcación del país:', error);
                document.getElementById('countryInfo').innerHTML = `<div class="alert alert-danger" role="alert">Error al obtener el código de marcación. Por favor, inténtelo más tarde.</div>`;
            });
    });
});
const guardarUsuario = async (e) => {
    e.preventDefault();
    btnEnviar.disabled = true;

    const url = '/carpio-exfinal-is2/controllers/usuario/index.php'; 
    const formData = new FormData(formulario); 
    formData.append('tipo', 1); 
    formData.delete('usuario_id');

    const config = {
        method: 'POST', 
        body: formData 
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json(); 
        const { mensaje, codigo, detalle } = data; 
        Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'success',
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();

        if (codigo === 1 && respuesta.status === 200) {
            getClientes(); 
            formulario.reset(); 
        } else {
            console.log(detalle);
        }

    } catch (error) {
        console.log(error); 
    } finally {
        btnEnviar.disabled = false; 
    }
};



