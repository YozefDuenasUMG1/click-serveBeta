let total = 0;

function actualizarCarrito(checkbox) {
    const carrito = document.getElementById("carrito");
    const item = document.createElement("li");
    item.className = "list-group-item";

    const detalle = checkbox.value;
    item.textContent = `${detalle} - Q${checkbox.dataset.precio}`;

    if (checkbox.checked) {
        carrito.appendChild(item);
        total += parseFloat(checkbox.dataset.precio);
        checkbox.dataset.itemId = item.textContent; // Guardar referencia al texto
    } else {
        const items = carrito.querySelectorAll("li");
        items.forEach(li => {
            if (li.textContent === checkbox.dataset.itemId) {
                carrito.removeChild(li);
            }
        });
        total -= parseFloat(checkbox.dataset.precio);
    }

    document.getElementById("total").textContent = total.toFixed(2);
}

function enviarPedido() {
    let mesa = document.getElementById("mesa").value;
    let seleccionados = document.querySelectorAll("input[type='checkbox']:checked");
    let pedido = Array.from(seleccionados).map(item => item.value).join(", ");
    let detalle = document.getElementById("detalle").value;

    if (!mesa || !pedido) {
        alert("Por favor, completa el número de mesa y selecciona al menos un pedido.");
        return;
    }

    fetch("guardar_pedido.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `mesa=${encodeURIComponent(mesa)}&pedido=${encodeURIComponent(pedido)}&detalle=${encodeURIComponent(detalle)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        if (data.includes("Pedido guardado correctamente")) {
            alert("Pedido enviado a la cocina!");
            document.getElementById("mesa").value = "";
            document.getElementById("detalle").value = "";
            seleccionados.forEach(item => item.checked = false);
            document.getElementById("carrito").innerHTML = ""; // Limpiar carrito
            total = 0;
            document.getElementById("total").textContent = total.toFixed(2);
        } else {
            alert("Error al enviar el pedido.");
        }
    })
    .catch(error => {
        console.error("Error al enviar el pedido:", error);
        alert("Hubo un problema al enviar el pedido.");
    });
}

document.getElementById("toggle-carrito").addEventListener("click", () => {
    const carritoContainer = document.getElementById("carrito-container");
    carritoContainer.classList.toggle("mostrar");
});

// Hacer que las funciones estén disponibles globalmente para el navegador
window.actualizarCarrito = actualizarCarrito;
window.enviarPedido = enviarPedido;

export { actualizarCarrito, enviarPedido };