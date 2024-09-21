// Crear una promesa
const miPromesa = new Promise((resolve, reject) => {
    const success = true;
    
    if (success) {
      resolve("¡Éxito!");
    } else {
      reject("Algo salió mal.");
    }
  });
  
  // Usar la promesa
  miPromesa
    .then(result => console.log(result))  // Si se resuelve correctamente
    .catch(error => console.error(error));  // Si ocurre un error
  