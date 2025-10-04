<div class="modal fade" id="modalResponse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Resposta:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="arvo-regular mensagem"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-around align-items-center">
    <div class="col-md-5">
        <div class="card card-outline card-success" style="padding: 0 50px;">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1">Já tenho registro...</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Informe suas credencias para efetuar o login</p>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" id="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="senha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <button class="btn btn-success btn-block" id="btnLogin">ENTRAR</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1">Quero me registrar...</a>
            </div>
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrar um novo membro</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nome Completo..." id="nome_mem">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" id="email_mem">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Senha" id="senha_mem">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Redigite a senha" id="resenha_mem">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block disabled" id="btnRegister">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btnLogin').click(function() {
            var email = $("#email").val();
            var senha = $("#senha").val();
            $.ajax({
                url: 'painel/code/login.php',
                method: 'post',
                data: {
                    email: email,
                    senha: senha
                },
                success: function(response) {
                    if (response.trim() == 'Sucesso!') {
                        location.href = 'http://localhost/HSHOT/hshot/home.php?pag=painel';
                    }
                    $('#modalResponse').modal('show');
                    $('.mensagem').text(response)
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#agreeTerms').click(function (){
            if (document.getElementById('agreeTerms').checked) {
                $('#btnRegister').removeClass('disabled');
            } else {
                $('#btnRegister').addClass('disabled');
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $("#btnRegister").click(function() {
            var nome = $("#nome_mem").val();
            var email = $("#email_mem").val();
            var senha = $("#senha").val();
            
        })
    })
</script>