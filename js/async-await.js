// Una función que retorna una promesa
function promesaEjemplo() {
    return new Promise((resolve, reject) => {
      setTimeout(() => resolve("¡Éxito después de 2 segundos!"), 2000);
    });
  }
  
  // Usar async/await
  async function ejecutar() {
    try {
      const resultado = await promesaEjemplo();  // Espera a que la promesa se resuelva
      console.log(resultado);  // Imprime el resultado cuando la promesa se cumple
    } catch (error) {
      console.error(error);  // Maneja errores
    }
  }
  
  ejecutar();
  