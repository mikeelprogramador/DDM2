
function cardstring(event,param) {
    let string = event.target.value;
    if(param === "title"){
        document.getElementById("card-title").innerHTML = string;
    }if(param === "text"){
        document.getElementById("card-text").innerHTML = string;
    }
    
  }
  function preview(event,querySelector){
    let input  = event.target;

    $imgPreView = document.querySelector(querySelector);

    if(!input.files.length) return

    file = input.files[0];

    objectURL = URL.createObjectURL(file);

    $imgPreView.src = objectURL;
}

function createLabel(textContent,forAttribute = null ) {
    var label = document.createElement('label');
    label.setAttribute('for', forAttribute);
    label.className = 'form-label';
    label.textContent = textContent;
    return label;
}

function createInput(type, className, name, placeholder = null) {
    var input = document.createElement('input');
    input.type = type;
    input.className = className;
    input.name = name;
    input.placeholder = placeholder;
    return input;
}

function createTextarea(className, name, placeholder) {
    var textarea = document.createElement('textarea');
    textarea.className = className;
    textarea.name = name;
    textarea.placeholder = placeholder;
    return textarea;
}

function continuar() {
    var div = document.querySelector('#parte2');
    
    // Limpiar el contenido del div (opcional)
    div.innerHTML = '<h3>Detalles internos del producto</h3>';

    // Crear y agregar inputs y textarea
    div.appendChild(createLabel('Referencia del produco'))
    div.appendChild(createInput('text', 'form-control mb-3', 'id-pro', 'Codigo referencia '));
    //Parte de caracteristicas
    div.appendChild(createLabel('Caracteristicas'))
    div.appendChild(createTextarea('form-control mb-3', 'caracter-pro', 'Caracteristicas del producto'));
    //Parte del color
    div.appendChild(createLabel('Colores'))
    div.appendChild(createInput('text', 'form-control mb-3', 'color-pro', 'Ingresa un color'));
    //Parte cantidad de productos
    div.appendChild(createLabel('Cantidad disponible'))
    div.appendChild(createInput('number', 'form-control mb-3', 'cantidad-pro', 'Cantidad de unidades'));
    //Parte de las ofertas
    div.appendChild(createLabel('Ofertas'))
    div.appendChild(createInput('text', 'form-control mb-3', 'oferta-pro', 'Crea la oferta'));
    //Parte del precio
    div.appendChild(createLabel('Valor del producto'))
    div.appendChild(createInput('number', 'form-control mb-3', 'precio-pro', 'Valor del producto'));
    div.appendChild(createInput('submit','btn btn-primary','enviar'))
}
