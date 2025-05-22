
if (rol === "paciente") {
   
   const link_citas = document.getElementById("agendamiento");
   const titulo_agenda_pagina = document.getElementById("titulo_agenda");
   const link_control_agenda = document.getElementById("control_agenda");
   const sub_titulo_agenda_pagina = document.getElementById("agenda-h3");

  //mostar en el menu las opciones para el rol de paciente
  if (link_citas) {
    link_citas.classList.remove("d-none");
    const p = link_citas.querySelector("p");
      if (p) p.textContent = "Agendamiento de Citas"; // O el texto que desees
    
  }

  if(link_control_agenda){
    link_control_agenda.classList.remove("d-none");
    const p = link_control_agenda.querySelector("p");
      if (p) p.textContent = "Consultar Citas"; // O el texto que desees
    
  }

  titulo_agenda_pagina.textContent = `Consultar Citas`;

  sub_titulo_agenda_pagina.textContent = `Citas`;
  
} else if (rol === "empresa") {
  const link_control_agenda = document.getElementById("control_agenda");
  const link_informenes = document.getElementById("informes");
  const titulo_agenda_pagina = document.getElementById("titulo_agenda");

  //mostar en el menu las opciones para el rol empresa

  if (link_control_agenda) {
    link_control_agenda.classList.remove("d-none");
    const p = link_control_agenda.querySelector("p");
    p.textContent = "Ver Citas de Empleados"; // O el texto que desees
  }

  if (link_informenes) {
    link_informenes.classList.remove("d-none");
    const p = link_informenes.querySelector("p");
    p.textContent = "Informes de salud"; // O el texto que desees
  }
  titulo_agenda_pagina.textContent = `Control de Citas Trabajadores  
   `;
  console.log("Rol de empresa detectado.");
} else if (rol == "administrador") {
  const link_control_agenda = document.getElementById("control_agenda");
  const link_informenes = document.getElementById("informes");

  //mostar en el menu las opciones para el rol administrador
  if (link_control_agenda) {
    link_control_agenda.classList.remove("d-none");
    const p = link_control_agenda.querySelector("p");
    p.textContent = "Administracion de Citas"; // O el texto que desees
  }

  if (link_informenes) {
    link_informenes.classList.remove("d-none");
    const p = link_informenes.querySelector("p");
    p.textContent = "Informes de Salud"; // O el texto que desees
  }
}


else {
  console.log("Rol no reconocido.");
}

