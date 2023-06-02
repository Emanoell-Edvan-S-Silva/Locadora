<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="./css-manual/style.css">
  <style>

        .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
  </style>

</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">


              <form action="./funcoes/entrar.php" method="POST" id="form">
                <h1 style="text-align: center;">Login Locadora</h1>
                <br>

                <div class="field padding-bottom--24" id="teste">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email">
                  <div class="error-message" id="email-error"></div>
                </div>

                <div class="field padding-bottom--24" id="teste">
                  <div class="grid--50-50">
                    <label for="password">Senha</label>
                  </div>
                  <input type="password" id="senha" name="senha">
                  <div class="error-message" id="password-error"></div>
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
                </div>  
              </form>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <script>
    
    document.getElementById('form').addEventListener('submit', function(event) {
        // Remove mensagens de erro anteriores
        document.getElementById('email-error').innerHTML = '';
        document.getElementById('password-error').innerHTML = '';

        // Obtém os valores dos campos de entrada
        var username = document.getElementById('email').value;
        var password = document.getElementById('senha').value;

        // Verifica se os campos estão vazios
        if (username === '') {
            document.getElementById('email-error').innerHTML = 'Por favor, insira o email.';
            
            event.preventDefault(); // Impede o envio do formulário

            let el = document.getElementById('email');
            el.style.borderColor = "#e74c3c";

        }

        if (password === '') {
            document.getElementById('password-error').innerHTML = 'Por favor, insira a senha.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('senha');
            el.style.borderColor = "#e74c3c";
        }
    });
</script>
</body>

</html>