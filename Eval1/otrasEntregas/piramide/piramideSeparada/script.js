const input = document.querySelector('input[name="caracter"]'); /* Seleccionamos el atributo name, aunque creo que lo normal suele ser el id (?) */
const validarEntrada = () => {
    const comprobador = input.value.length === 1; /* Comparador de igualdad estricta (Ojo, hay que acceder al VALOR)*/
    if (!comprobador) {
        alert("Por favor, introduce un solo caracter");
    }
    return comprobador;
}
