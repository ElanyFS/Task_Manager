// const sign_in_btn = document.querySelector("button#sign-in-btn");
// const sign_up_btn = document.querySelector('button#sign-up-btn');
// const container = document.querySelector("div.container");

// sign_up_btn.addEventListener("click", () => {
//     container.classList.add('sign-up-mode');
// })

// sign_in_btn.addEventListener('click', () => {
//     container.classList.remove('sign-up-mode');
// })

// const toggleMenu = () => document.body.classList.toggle("open");

// Login
$(document).ready(function () {
  $("#login-form").submit(function (event) {
    event.preventDefault();

    $.ajax({
      type: "POST",
      url: "/login/store", // Substitua pela URL correta
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.success) {
          // Redireciona para a página de sucesso ou faz qualquer outra coisa que você queira em caso de login bem-sucedido
          // console.log('sucesso');
          window.location.href = "home/show"; // Substitua pela URL correta
        } else {
          // Exibe a mensagem de erro em algum lugar na sua página
          // console.log('erro ao tentar fazer login');
          $("#error-message").text(response.message);
        }
      },
      error: function () {
        // Em caso de erro de requisição, exibe uma mensagem genérica de erro
        $("#error-message").text(
          "Ocorreu um erro ao tentar fazer login. Por favor, tente novamente."
        );
      },
    });
  });
});


// Register

$(document).ready(function () {
  $('#register-form').submit(function (event) {
    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/login/create',
      data: $(this).serialize(),
      dataType: 'json',
      success: function (response) {
        if(response.success){
          $("#success-message-register").text(response.message);
        }else{
          $("#error-message-register").text(response.message);
        }
      },
      error: function () {
         // Em caso de erro de requisição, exibe uma mensagem genérica de erro
         $("#error-message-register").text(
          "Ocorreu um erro ao tentar fazer login. Por favor, tente novamente."
        );
      }
    })
  })
})


function openLeftMenu() {
  document.getElementById("leftMenu").style.display = "block";
}

function closeLeftMenu() {
  document.getElementById("leftMenu").style.display = "none";
}