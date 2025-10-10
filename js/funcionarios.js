const form = document.querySelector(".cadFuncionario");
const plus = document.querySelector(".plus");
const barContainer = document.querySelector(".wid-bar");
const users = document.querySelectorAll(".button-data");
const divConsulta = document.querySelector(".divConsulta");
const trash = document.querySelector(".trash");
const user = document.querySelectorAll(".users");
const edit = document.querySelector(".edit");
const campos = document.querySelectorAll(".inpsData");


plus.addEventListener("click", () => {
  form.classList.toggle("show");
  plus.classList.toggle("mais");
  barContainer.classList.toggle("widd");
});

document.addEventListener("keydown", event => {
  if (event.key === 'Escape') {
  form.classList.remove("show");
  plus.classList.remove("mais");
  barContainer.classList.remove("widd");
  divConsulta.classList.remove("consultaShow");
  }
});

users.forEach(user => {
  user.addEventListener("click", () => {
    divConsulta.classList.add("consultaShow");
  });
});




//delete click
document.addEventListener("keydown", event => {
  if ((event.key === "q" || event.key === "Q") && !form.classList.contains("show")) {
    const consulta = document.querySelector(".consultaDados");

    if (consulta) {
      // ativa/desativa delete
      trash.classList.toggle("trash-click");
      divConsulta.classList.remove("consultaShow");
      consulta.classList.toggle("consultaDelete");

      user.forEach(useres => {
        useres.classList.toggle("user-delete");
      });

      // DESATIVA EDIT
      edit.classList.remove("edit-click");
      consulta.classList.remove("consultaEdit");
      user.forEach(useres => {
        useres.classList.remove("user-edit");
      });
    }
  }
});

trash.addEventListener("click", () => {

  const consulta = document.querySelector(".consultaDados");

  if (consulta) {
    // ativa/desativa delete
    trash.classList.toggle("trash-click");
    divConsulta.classList.remove("consultaShow");
    consulta.classList.toggle("consultaDelete");

    user.forEach(useres => {
      useres.classList.toggle("user-delete");
    });

    // DESATIVA EDIT
    edit.classList.remove("edit-click");
    consulta.classList.remove("consultaEdit");
    user.forEach(useres => {
      useres.classList.remove("user-edit");
    });
  }
});




//edit click
document.addEventListener("keydown", event=>{
   if ((event.key === "e" || event.key === "E") && !form.classList.contains("show")) {
    const consulta = document.querySelector(".consultaDados");
    
    if (consulta) {
      edit.classList.toggle("edit-click");
      divConsulta.classList.remove("consultaShow");
      consulta.classList.toggle("consultaEdit");

      campo();

      consulta.classList.remove("consultaDelete");
      trash.classList.remove("trash-click");

      user.forEach(useres => {
      useres.classList.toggle("user-edit");
    });
    user.forEach(useres => {
      useres.classList.remove("user-delete");
    });
    }
  }
});

edit.addEventListener("click", () => {
  const consulta = document.querySelector(".consultaDados");

  if (consulta) {
    // mesmo comportamento do keydown
    edit.classList.toggle("edit-click");
    divConsulta.classList.remove("consultaShow");

    consulta.classList.toggle("consultaEdit");
    consulta.classList.remove("consultaDelete");

    trash.classList.remove("trash-click");

    user.forEach(useres => {
      useres.classList.toggle("user-edit");
      useres.classList.remove("user-delete");
    });
  }
});

//campos com edit

function campo(){
campos.forEach(fields => {
  if(edit.classList.contains("edit-click")){ // detectar classe em um elemento
    fields.readOnly = !fields.readOnly;
  }else{
    fields.readOnly = !fields.readOnly;
  }
});
}
