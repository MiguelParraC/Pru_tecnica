function converToMayus(elemento) {
    var charPos = doGetCaretPosition(elemento); //Obtiene la posición actual del curosr
    elemento.value = elemento.value.toUpperCase();
    setCaretPosition(elemento, charPos); //Setea el cursor en la posicion actual
}

