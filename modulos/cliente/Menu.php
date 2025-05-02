<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click&Serve - Menú</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <style>
        #carrito-container {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -2px 0 5px rgba(0,0,0,0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            padding: 20px;
            overflow-y: auto;
        }

        #carrito-container.mostrar {
            right: 0;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }

        @media (max-width: 768px) {
            #carrito-container {
                width: 100%;
                right: -100%;
            }
        }

        .menu-category {
            margin-bottom: 30px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .hover-item:hover {
            background-color: #f8f9fa;
            cursor: pointer;
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }
        
        .item-details {
            font-size: 14px;
            color: #666;
            margin-top: 4px;
        }
        
        .cart-item {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        
        .cart-item-header {
            font-weight: bold;
        }
        
        .cart-item-details {
            font-size: 13px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .cart-total-section {
            border-top: 2px solid #eee;
            margin-top: 15px;
            padding-top: 15px;
        }

        .categoria-menu {
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .categoria-menu a {
            text-decoration: none;
            color: inherit;
        }

        h1.titulo-menu {
            text-align: center;
            margin: 40px 0;
            color: #d32f2f;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid #d32f2f;
            padding-bottom: 10px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-regresar {
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .container-menu {
            padding-top: 80px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Overlay para cerrar el carrito -->
    <div class="overlay" id="overlay"></div>

    <!-- Carrito de Pedido -->
    <div id="carrito-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Carrito de Pedido</h4>
            <button class="btn-close" onclick="toggleCarrito()"></button>
        </div>
        
        <div class="form-group mb-3">
            <label for="mesa-select" class="form-label">Número de Mesa:</label>
            <select class="form-select" id="mesa-select">
                <option value="" selected disabled>Seleccionar mesa</option>
                <option value="1">Mesa 1</option>
                <option value="2">Mesa 2</option>
                <option value="3">Mesa 3</option>
                <option value="4">Mesa 4</option>
                <option value="5">Mesa 5</option>
                <option value="6">Mesa 6</option>
                <option value="7">Mesa 7</option>
                <option value="8">Mesa 8</option>
                <option value="9">Mesa 9</option>
                <option value="10">Mesa 10</option>
            </select>
        </div>
        
        <p id="numero-mesa" class="fw-bold"></p>
        
        <h5 class="mb-3">Detalles del Pedido</h5>
        <div id="carrito" class="mb-4"></div>
        
        <div class="cart-total-section">
            <h5 class="d-flex justify-content-between">
                <span>Total:</span> 
                <span>Q<span id="total">0</span></span>
            </h5>
        </div>
        
        <div class="form-group mb-3 mt-3">
            <label for="detalle" class="form-label">Detalles adicionales:</label>
            <textarea class="form-control" id="detalle" rows="2" placeholder="Instrucciones especiales, alergias, etc."></textarea>
        </div>
        
        <button class="btn btn-primary mt-3 w-100" onclick="enviarPedido()">Enviar Pedido</button>
    </div>

    <!-- Contenido principal -->
    <div class="container container-menu">
        <h1 class="titulo-menu">Menú de la Casa</h1>
        
        <!-- Primera fila de categorías -->
        <div class="row">
            <div class="col-md-4 categoria-menu">
                <a href="Desayunos.php">
                    <div class="list-group-item hover-item d-flex align-items-center">
                        <img src="https://comedera.com/wp-content/uploads/sites/9/2022/12/Desayono-americano-shutterstock_2120331371.jpg" 
                             class="img-fluid img-center" 
                             style="width: 250px; height: auto; border-radius: 10px; margin-right: 15px;"> 
                        <div>
                            <h4 class="mb-1">Desayunos</h4>
                            <strong>Lo mejor de la Casa</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet libero et ligula gravida, at tempus nisl lacinia.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 categoria-menu">
                <a href="PlatosPrincipales.php">
                    <div class="list-group-item hover-item d-flex align-items-center">
                        <img src="https://mandolina.co/wp-content/uploads/2024/06/carne-asada-a-la-parrilla-1080x550-1-1200x900.jpg" 
                             class="img-fluid img-center" 
                             style="width: 250px; height: auto; border-radius: 10px; margin-right: 15px;"> 
                        <div>
                            <h4 class="mb-1">Platos Principales</h4>
                            <strong>El sabor de nuestro puerto.</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed tortor at lacus tincidunt varius.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 categoria-menu">
                <a href="Antojos.php">
                    <div class="list-group-item hover-item d-flex align-items-center">
                        <img src="https://foodisafourletterword.com/wp-content/uploads/2020/09/Instant_Pot_Birria_Tacos_with_Consomme_Recipe_tacoplate.jpg" 
                             class="img-fluid img-center" 
                             style="width: 280px; height: auto; border-radius: 10px; margin-right: 15px;"> 
                        <div>
                            <h4 class="mb-1">Antojos</h4>
                            <strong>Lo mejor de la Casa</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet libero et ligula gravida, at tempus nisl lacinia.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Segunda fila de categorías -->
        <div class="row mt-4">
            <div class="col-md-4 categoria-menu">
                <a href="Entradas.php">
                    <div class="list-group-item hover-item d-flex align-items-center">
                        <img src="https://www.recetasnestle.com.ec/sites/default/files/srh_recipes/4e4293857c03d819e4ae51de1e86d66a.jpg" 
                             class="img-fluid img-center" 
                             style="width: 290px; height: auto; border-radius: 10px; margin-right: 15px;"> 
                        <div>
                            <h4 class="mb-1">Entradas</h4>
                            <strong>Lo mejor de la Casa</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet libero et ligula gravida, at tempus nisl lacinia.</p>
                        </div>
                    </div>
                </a>
            </div>
        
            <div class="col-md-4 categoria-menu">
                <a href="bebidas.php">
                    <div class="list-group-item hover-item d-flex align-items-center">
                        <img src="https://www.tuhogar.com/content/dam/cp-sites/home-care/tu-hogar/es_mx/recetas/snacks-bebidas-y-postres/aprende-a-preparar-batidos-saludables/4-ideas-para-preparar-batidos-saludables-axion.jpg" 
                             class="img-fluid img-center" 
                             style="width: 290px; height: auto; border-radius: 10px; margin-right: 15px;"> 
                        <div>
                            <h4 class="mb-1">Batidos</h4>
                            <strong>Lo mejor de la Casa</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet libero et ligula gravida, at tempus nisl lacinia.</p>
                        </div>
                    </div>
                </a>
            </div>
        
            <div class="col-md-4 categoria-menu">
                <a href="Postres.php">
                    <div class="list-group-item hover-item d-flex align-items-center">
                        <img src="https://images.aws.nestle.recipes/resized/2024_10_23T08_34_55_badun_images.badun.es_pastelitos_de_chocolate_blanco_y_queso_con_fresas_1290_742.jpg" 
                             class="img-fluid img-center" 
                             style="width: 290px; height: auto; border-radius: 10px; margin-right: 15px;"> 
                        <div>
                            <h4 class="mb-1">Postres</h4>
                            <strong>Lo mejor de la Casa</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus laoreet libero et ligula gravida, at tempus nisl lacinia.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Botón de regreso -->
        <div class="text-center btn-regresar">
            <a href="index.html" class="btn btn-danger">Regresar</a>
        </div>
    </div>

    <!-- Modal para confirmación de pedido -->
    <div class="modal fade" id="confirmacionPedidoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <pre id="mensajePedido" class="border p-3 bg-light" style="white-space: pre-wrap;"></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Seguir pidiendo</button>
                    <button type="button" class="btn btn-primary" onclick="confirmarPedido()">Confirmar Pedido</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        let pedidoItems = [];
        let numeroMesa = "";

        // Mostrar/ocultar carrito
        function toggleCarrito() {
            const carrito = document.getElementById("carrito-container");
            const overlay = document.getElementById("overlay");
            
            carrito.classList.toggle("mostrar");
            overlay.style.display = carrito.classList.contains("mostrar") ? "block" : "none";
            
            // Cargar los items guardados
            if (carrito.classList.contains("mostrar")) {
                actualizarVistaCarrito();
            }
        }

        // Asignar evento al botón del navbar
        document.getElementById("toggle-carrito-nav").addEventListener("click", function(e) {
            e.preventDefault();
            toggleCarrito();
        });

        // Cerrar carrito al hacer clic en el overlay
        document.getElementById("overlay").addEventListener("click", toggleCarrito);

        // Actualizar número de mesa
        document.getElementById("mesa-select").addEventListener("change", function() {
            numeroMesa = this.value;
            document.getElementById("numero-mesa").textContent = `Mesa: ${numeroMesa}`;
            localStorage.setItem('mesaSeleccionada', numeroMesa);
        });

        // Agregar item al carrito
        function agregarAlCarrito(nombre, descripcion, precio) {
            const item = {
                nombre: nombre,
                descripcion: descripcion,
                precio: precio,
                cantidad: 1
            };
            
            // Verificar si el item ya existe en el carrito
            const itemExistente = pedidoItems.findIndex(i => i.nombre === nombre);
            
            if (itemExistente !== -1) {
                pedidoItems[itemExistente].cantidad += 1;
            } else {
                pedidoItems.push(item);
            }
            
            // Actualizar contador en el icono del carrito
            document.getElementById("cart-count").textContent = pedidoItems.length;
            
            // Guardar en localStorage para persistencia entre páginas
            localStorage.setItem('pedidoItems', JSON.stringify(pedidoItems));
            
            // Mostrar carrito automáticamente
            document.getElementById("carrito-container").classList.add("mostrar");
            document.getElementById("overlay").style.display = "block";
            
            // Actualizar vista del carrito
            actualizarVistaCarrito();
        }

        // Actualizar la vista del carrito
        function actualizarVistaCarrito() {
            const carritoElement = document.getElementById("carrito");
            const totalElement = document.getElementById("total");
            const cartCountElement = document.getElementById("cart-count");
            
            // Limpiar el contenido actual
            carritoElement.innerHTML = "";
            
            if (pedidoItems.length === 0) {
                carritoElement.innerHTML = "<p class='text-muted'>El carrito está vacío</p>";
                totalElement.textContent = "0.00";
                cartCountElement.textContent = "0";
                return;
            }
            
            let total = 0;
            
            // Agregar cada item al carrito
            pedidoItems.forEach((item, index) => {
                const itemTotal = item.precio * item.cantidad;
                total += itemTotal;
                
                const div = document.createElement("div");
                div.className = "cart-item";
                div.innerHTML = `
                    <div class="d-flex justify-content-between">
                        <div class="cart-item-header">${item.nombre} x${item.cantidad}</div>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary me-1" onclick="ajustarCantidad(${index}, -1)">-</button>
                            <button class="btn btn-sm btn-outline-secondary me-1" onclick="ajustarCantidad(${index}, 1)">+</button>
                            <button class="btn btn-sm btn-danger" onclick="eliminarItem(${index})">X</button>
                        </div>
                    </div>
                    <div class="cart-item-details">${item.descripcion}</div>
                    <div class="d-flex justify-content-between">
                        <span>Precio unitario: Q${item.precio.toFixed(2)}</span>
                        <strong>Q${itemTotal.toFixed(2)}</strong>
                    </div>
                `;
                carritoElement.appendChild(div);
            });
            
            // Actualizar el total
            totalElement.textContent = total.toFixed(2);
            
            // Actualizar contador del carrito
            cartCountElement.textContent = pedidoItems.length;
        }

        // Ajustar cantidad de un item
        function ajustarCantidad(index, cambio) {
            pedidoItems[index].cantidad += cambio;
            
            // Si la cantidad es 0 o menos, eliminar el item
            if (pedidoItems[index].cantidad <= 0) {
                pedidoItems.splice(index, 1);
            }
            
            // Guardar en localStorage
            localStorage.setItem('pedidoItems', JSON.stringify(pedidoItems));
            
            // Actualizar vista
            actualizarVistaCarrito();
        }

        // Eliminar item del carrito
        function eliminarItem(index) {
            pedidoItems.splice(index, 1);
            
            // Guardar en localStorage
            localStorage.setItem('pedidoItems', JSON.stringify(pedidoItems));
            
            // Actualizar vista
            actualizarVistaCarrito();
        }

        // Enviar pedido
        function enviarPedido() {
            if (numeroMesa === "") {
                alert("Por favor selecciona un número de mesa");
                return;
            }
            
            if (pedidoItems.length === 0) {
                alert("El carrito está vacío");
                return;
            }

            const detalle = document.getElementById("detalle").value;
            
            let mensaje = `Pedido para la mesa ${numeroMesa}\n\nDetalles del pedido:\n`;
            
            pedidoItems.forEach(item => {
                mensaje += `- ${item.nombre} x${item.cantidad}: Q${(item.precio * item.cantidad).toFixed(2)}\n`;
            });
            
            mensaje += `\nTotal: Q${document.getElementById("total").textContent}`;
            
            if (detalle.trim() !== "") {
                mensaje += `\n\nInstrucciones especiales: ${detalle}`;
            }
            
            // Mostrar el mensaje en el modal
            document.getElementById('mensajePedido').textContent = mensaje;
            const modal = new bootstrap.Modal(document.getElementById('confirmacionPedidoModal'));
            modal.show();
            
            toggleCarrito(); // Ocultar el carrito
        }

        function confirmarPedido() {
            // Aquí iría la lógica para enviar el pedido al servidor
            alert("¡Pedido confirmado! Se está preparando en cocina.");
            
            // Limpiar el carrito después de confirmar
            pedidoItems = [];
            localStorage.setItem('pedidoItems', JSON.stringify(pedidoItems));
            document.getElementById("detalle").value = "";
            actualizarVistaCarrito();
            
            // Cerrar el modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('confirmacionPedidoModal'));
            modal.hide();
        }

        // Cargar datos al iniciar la página
        document.addEventListener('DOMContentLoaded', function() {
            // Recuperar datos del usuario y mesa
            const mesa = localStorage.getItem('mesaSeleccionada');
            if (mesa) {
                document.getElementById('mesa-select').value = mesa;
                numeroMesa = mesa;
                document.getElementById("numero-mesa").textContent = `Mesa: ${numeroMesa}`;
            }
            
            // Recuperar items del carrito
            const itemsGuardados = localStorage.getItem('pedidoItems');
            if (itemsGuardados) {
                pedidoItems = JSON.parse(itemsGuardados);
                document.getElementById("cart-count").textContent = pedidoItems.length;
            }
        });
    </script>
</body>
</html>