<script>
export default {
  mounted() {
    console.log('El componente ha sido montado');
  },
  destroyed() {
    console.log('El componente ha sido destruido');
  }
};

// created(): se ejecuta después de que el componente ha sido creado, pero antes de renderizar la interfaz.
// mounted(): se ejecuta cuando el componente ha sido insertado en el DOM.
// updated(): se ejecuta cuando el componente se vuelve a renderizar debido a un cambio en los datos.
// destroyed(): se ejecuta cuando el componente ha sido destruido y eliminado del DOM.

</script>