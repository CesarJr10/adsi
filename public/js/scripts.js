let regisUsu = async ()=>{
    let id       = document.getElementById("id").value;
    let nombre   = document.getElementById("nombre").value;
    let usuario  = document.getElementById("usuario").value;
    let password = document.getElementById("password").value;
    
    if( id.trim()=="" || nombre.trim()=="" || usuario.trim()=="" || password.trim()==""){
        Swal.fire({ position: "center",icon:"error",title:"Error todos los campos son obligatorios"});
    }else{
        let url= '?controlador=usuario&accion=registrar';
        fd = new FormData()
        fd.append("id", document.getElementById("id").value);
        fd.append("nombre", document.getElementById("nombre").value);
        fd.append("usuario", document.getElementById("usuario").value);
        fd.append("password", document.getElementById("password").value);

        let res = await fetch(url, {
            method: "post",
            body: fd
        })

        let info = await res.json()
        
        Swal.fire({
            title: info.title,
            text: info.mensaje,
            icon: info.icon,
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = 'http://localhost/adsi/?controlador=usuario&accion=principal'
            }
        });

        $('#frm')[0].reset()
    }  
}

let regisLib = async ()=>{
    let id       = document.getElementById("id").value;
    let nombre   = document.getElementById("nombre").value;
    let autor    = document.getElementById("autor").value;
    
    if( id.trim()=="" || nombre.trim()=="" || autor.trim()==""){
        Swal.fire({ position: "center",icon:"error",title:"Error todos los campos son obligatorios"});
    }else{
        let url= '?controlador=libros&accion=registrar';
        fd = new FormData()
        fd.append("id", document.getElementById("id").value);
        fd.append("nombre", document.getElementById("nombre").value);
        fd.append("autor", document.getElementById("autor").value);

        let res = await fetch(url, {
            method: "post",
            body: fd
        })

        let info = await res.json()
        
        Swal.fire({
            title: info.title,
            text: info.mensaje,
            icon: info.icon,
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = 'http://localhost/adsi/?controlador=libros&accion=principal'
            }
        });

        $('#frm')[0].reset()
    }  
}

let regisPres = async ()=>{
    //let id       = document.getElementById("id").value;
    let idusuario   = document.getElementById("idusuario").value;
    let idlibro    = document.getElementById("idlibro").value;
    let fechaprestamo    = document.getElementById("fechaprestamo").value;
    let fechadevolucion    = document.getElementById("fechadevolucion").value;
    
    if(  idusuario.trim()=="" || idlibro.trim()=="" || fechaprestamo.trim()==""){
        Swal.fire({ position: "center",icon:"error",title:"Error todos los campos requeridos son obligatorios"});
    }else{
        let url= '?controlador=prestamos&accion=registrar';
        fd = new FormData()
        //fd.append("id", document.getElementById("id").value);
        fd.append("idusuario", document.getElementById("idusuario").value);
        fd.append("idlibro", document.getElementById("idlibro").value);
        fd.append("fechaprestamo", document.getElementById("fechaprestamo").value);
        fd.append("fechadevolucion", document.getElementById("fechadevolucion").value);

        let res = await fetch(url, {
            method: "post",
            body: fd
        })

        let info = await res.json()
        
        Swal.fire({
            title: info.title,
            text: info.mensaje,
            icon: info.icon,
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = 'http://localhost/adsi/?controlador=prestamos&accion=principal'
            }
        });

        $('#frm')[0].reset()
    }  
}



let editarUsu = async ()=>{
    let nombre= document.getElementById("nombre").value;
    let usuario= document.getElementById("usuario").value;
    let id= document.getElementById("id").value;
    if(nombre.trim()==""   || usuario.trim()=="" || id.trim()==""){
        Swal.fire({ position: "center",icon:"error",title:"Error todos los campos son obligatorios"});
    }else{
        let url= '?controlador=usuario&accion=editar';
        fd = new FormData()
        fd.append("nombre", document.getElementById("nombre").value);
        fd.append("usuario", document.getElementById("usuario").value);
        fd.append("id", document.getElementById("id").value);
        

        let res = await fetch(url, {
            method: "post",
            body: fd
        })

        let info = await res.json()
        
        Swal.fire({
            title: info.title,
            text: "Usuario editado con exito",
            icon: info.icon,
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = 'http://localhost/adsi/?controlador=usuario&accion=principal'
            }
        });

    } 
    
    
    
}

let editarLib = async ()=>{
    let nombre= document.getElementById("nombre").value;
    let autor= document.getElementById("autor").value;
    let id= document.getElementById("id").value;
    if(nombre.trim()==""   || autor.trim()=="" || id.trim()==""){
        Swal.fire({ position: "center",icon:"error",title:"Error todos los campos son obligatorios"});
    }else{
        let url= '?controlador=libros&accion=editar';
        fd = new FormData()
        fd.append("nombre", document.getElementById("nombre").value);
        fd.append("autor", document.getElementById("autor").value);
        fd.append("id", document.getElementById("id").value);
        

        let res = await fetch(url, {
            method: "post",
            body: fd
        })

        let info = await res.json()
        
        Swal.fire({
            title: info.title,
            text: "Libro editado con exito",
            icon: info.icon,
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = 'http://localhost/adsi/?controlador=libros&accion=principal'
            }
        });
    }  
}

let editarPres = async ()=>{
    let fechaprestamo= document.getElementById("fechaprestamo").value;
    let fechadevolucion= document.getElementById("fechadevolucion").value;
    let id= document.getElementById("id").value;
    if(fechaprestamo.trim()=="" || id.trim()==""){
        Swal.fire({ position: "center",icon:"error",title:"Error todos los campos requeridos son obligatorios"});
    }else{
        let url= '?controlador=prestamos&accion=editar';
        fd = new FormData()
        fd.append("fechaprestamo", document.getElementById("fechaprestamo").value);
        fd.append("fechadevolucion", document.getElementById("fechadevolucion").value);
        fd.append("id", document.getElementById("id").value);
        

        let res = await fetch(url, {
            method: "post",
            body: fd
        })

        let info = await res.json()
        
        Swal.fire({
            title: info.title,
            text: "Prestamo editado con exito",
            icon: info.icon,
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = 'http://localhost/adsi/?controlador=prestamos&accion=principal'
            }
        });
    }  
}



let Eliminar = async(id,elem)=>{
    let url=`?controlador=usuario&accion=eliminar&id=${id}`;
    let respuesta=await fetch(url)
    let info=respuesta.json();

    Swal.fire({
        title: "Información",
        text: "Se eliminó correctamente!",
        icon: "info.icono",
    });

    $(elem).closest('tr').remove();
}

let EliminarUsuario = async(id,elem)=>{
    Swal.fire({
        title: "Desea eliminar?",
        text: "Se perderá el registro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!"
      }).then((result) => {
        if (result.isConfirmed) {
          Eliminar(id, elem)
        }
      });
}

let EliminarLib = async(id,elem)=>{
    let url=`?controlador=libros&accion=eliminar&id=${id}`;
    let respuesta=await fetch(url)
    let info=respuesta.json();

    Swal.fire({
        title: "Información",
        text: "Se eliminó correctamente!",
        icon: "success",
    });

    $(elem).closest('tr').remove();
}

let EliminarLibro = async(id,elem)=>{
    Swal.fire({
        title: "Desea eliminar?",
        text: "Se perderá el registro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!"
      }).then((result) => {
        if (result.isConfirmed) {
          EliminarLib(id, elem)
        }
      });
}

let EliminarPres = async(id,elem)=>{
    let url=`?controlador=prestamos&accion=eliminar&id=${id}`;
    let respuesta=await fetch(url)
    let info=respuesta.json();

    Swal.fire({
        title: "Información",
        text: "Se eliminó correctamente!",
        icon: "success",
    });

    $(elem).closest('tr').remove();
}

let EliminarPrestamo = async(id,elem)=>{
    Swal.fire({
        title: "Desea eliminar?",
        text: "Se perderá el registro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!"
      }).then((result) => {
        if (result.isConfirmed) {
          EliminarPres(id, elem)
        }
      });
}

let validarUsuario= async() =>{
    let url="?controlador=inicio&accion=validarUsuario";
    let usuario = document.getElementById("usuario").value;
    let password = document.getElementById("password").value;
    if(usuario.trim()!="" && password.trim()!=""){
        let datos=new FormData();
    let usuario = document.getElementById("usuario").value;
    datos.append("usuario",usuario);
    datos.append("password",password);
        let respuesta=await fetch(url,{
            method:"post",
            body:datos
        });
        let info= await respuesta.json();
        if(info.estado==1){  
            Swal.fire({
                title: "Sesión iniciada",
                text: "Será redirigido a la pagina principal",
                icon: "succes",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='?controlador=inicio&accion=dashboard';
                }
              });
        }else{
            Swal.fire({icon:"error", title:info.mensaje})
        }
    }else{
        Swal.fire({icon:"error", title:"Todos los campos son obligatorios"});
    }
}


