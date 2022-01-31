
function confirmacion(e){
    if (confirm ("¿Esta seguro de eliminar esta materia?")){
        return true; 
    } else {
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".table_item_link2");

for (var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}