function del(){
    let v = confirm("¿Quieres eliminar este registro?");
    return v;
}

table = new DataTable('#example',{
    language: {
        url: "https://cdn.datatables.net/plug-ins/2.0.4/i18n/es-ES.json",
    }
});