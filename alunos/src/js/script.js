/**
 * Function Adicionar
 *
 * Sempre que essa função for chamada ela irá adicionar os usuarios
 */
$("#form").submit(function (e) {
  e.preventDefault();

  let nome = $("#nome").val();
  let idade = $("#idade").val();
  let genero = $("#genero").val();
  let curso = $("#curso").val();

  let userData = {
    nome: nome,
    idade: idade,
    genero: genero,
    curso: curso,
  };

  $.ajax({
    url: "../src/controller/insert.php",
    method: "POST",
    data: userData,
    dataType: "json",
  })
    .done(function (response) {
      if (response.status_code) {
        popUp(response.msg, response.type);
        if (response.status_code === 201) {
          getUser();
          Limpar_campos();
        }
      }
    })
    .fail(function (error) {
      console.error("Erro ao ENVIAR requisição AJAX:", error);
    });
});

/**
 * Function Limpar_campos
 *
 * Sempre que essa função for chamada ela irá limpar todos os inputs
 */
function Limpar_campos() {
  $("#nome").val("");
  $("#idade").val("");
  $("#genero").val("");
  $("#curso").val("");
}

/**
 * Function getUser
 *
 * Essa função quando resgata todas as informações de todos os usuarios
 */
function getUser() {
  $.ajax({
    url: "../src/controller/select.php",
    method: "GET",
    dataType: "json",
  })
    .done(function (response) {
      // isso vai evitar os dados duplicados
      var dados = document.querySelector(".table_dados");
      while (dados.firstChild) {
        dados.firstChild.remove();
      }
      try {
        for (var i = 0; i < response[0].length; i++) {
          $(".table_dados").prepend(
            "<tr><td>" +
              response[0][i].id_aluno +
              "</td><td>" +
              response[0][i].nome +
              "</td><td>" +
              response[0][i].idade +
              "</td><td>" +
              response[0][i].genero +
              "</td><td>" +
              response[0][i].curso +
              "</td><td><button class='btn-excluir' data-id='" +
              response[0][i].id_aluno +
              "'>Excluir</button></td></tr>"
          );
        }
      } catch (error) {
        $(".table_dados").prepend("<tr><td>0</td><td>Sem resultados</td></tr>");
      }
    })
    .fail(function (error) {
      console.error("Erro ao RESGATAR requisição AJAX:", error);
    });
}

/**
 * Espera a pagina carregar para executar a função
 */
$(document).ready(function () {
  getUser();
});

function getGenero() {
  $.ajax({
    url: "../src/controller/select_genero.php",
    method: "GET",
    dataType: "json",
  })
    .done(function (response) {
      console.log(response);
      var maleCount = response[0].total_masculino;
      var femaleCount = response[1].total_feminino;
      drawChart(maleCount, femaleCount);
    })
    .fail(function (error) {
      console.error("Erro ao RESGATAR requisição AJAX:", error);
    });
}
/**
 * Function getTotalAluno
 *
 * Essa função é responsavel por resgatar o total de alunos cadastrados no sistema.
 */
function getTotalAluno() {
  $.ajax({
    url: "../src/controller/total_aluno.php",
    method: "GET",
    dataType: "json",
  })
    .done(function (response) {
      // isso vai evitar os dados duplicados
      var dados = document.querySelector(".total_aluno");
      while (dados.firstChild) {
        dados.firstChild.remove();
      }
      $(".total_aluno").prepend(
        "<h1> Total de alunos cadastrados: " + response.total.id_aluno + "</h1>"
      );
    })
    .fail(function (error) {
      console.error("Erro ao RESGATAR requisição AJAX:", error);
    });
}
/**
 * Espera a pagina carregar para executar a função
 */
$(document).ready(function () {
  getTotalAluno();
});

/**
 * Function delete
 *
 * Essa função é responsavel por deletar o usuario.
 */
$(".table_dados").on("click", ".btn-excluir", function () {
  var id_aluno = $(this).data("id");
  Swal.fire({
    title: "Excluir",
    text: "Tem certeza que deseja EXCLUIR?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sim",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../src/controller/delete.php",
        method: "POST",
        data: { id_aluno },
        dataType: "json",
      })
        .done(function (response) {
          if (response.status_code === 400 || response.status_code === 500) {
            popUp(response.msg, response.type);
          }
          if (response.status_code === 204) {
            getUser();
            getGenero();
            getTotalAluno();
            popUp(response.msg, response.type);
          }
        })
        .fail(function (error) {
          console.error("Erro ao RESGATAR requisição AJAX:", error);
        });
    }
  });
});

/**
 * Function popUp
 *
 * Essa função é responsavel por amostrar os Popup (mensagens de avisos) na tela.
 */
function popUp(msg, type) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    },
  });
  Toast.fire({
    icon: type,
    title: msg,
  });
}
