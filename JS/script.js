// Función para cambiar el estado del motor
function controlMotor(command) {
    fetch(`PHP/control.php?command=${command}`)
        .then(response => response.json())
        .then(data => updateButtonColors(data))
        .catch(err => console.error(err));
}

// Función para cambiar el estado del servomecanismo
function controlServo(command) {
    fetch(`PHP/control.php?command=${command}`)
        .then(response => response.json())
        .then(data => updateButtonColors(data))
        .catch(err => console.error(err));
}

// Función para actualizar los colores de los botones según el estado
function updateButtonColors(data) {
    // Lógica para cambiar los colores de los botones
}

// Función para obtener temperatura y humedad
function updateTemperatureHumidity() {
    fetch('PHP/dht22.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('temperature').textContent = data.temperature;
            document.getElementById('humidity').textContent = data.humidity;
        })
        .catch(err => console.error(err));
}

// Actualiza los datos cada 5 segundos
setInterval(updateTemperatureHumidity, 5000);