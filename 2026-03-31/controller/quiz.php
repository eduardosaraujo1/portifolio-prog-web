<?php
if (!isset($_SESSION['email_user'])) {
    redirect('/');
    die();
}
?>

<?= render_view('partial.header', ['title' => 'Login - QuizMe']); ?>
<!-- REFAZER USANDO COMPONENTES -->
<h1>Work In Progress</h1>
<!-- <div class="container-fluid d-flex flex-column align-items-center mt-4">
        <form action="resultado.php" method="post" class="quiz-form">
            <div id="pergunta-1" class="pergunta">
                <h3>1. O Comando Echo é utilizado para:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta1" id="pergunta1_op1" value="Receber Dados">
                    <label class="form-check-label" for="pergunta1_op1">Receber Dados</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta1" id="pergunta1_op2" value="Exibir Dados">
                    <label class="form-check-label" for="pergunta1_op2">Exibir Dados</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta1" id="pergunta1_op3" value="Criar Funções">
                    <label class="form-check-label" for="pergunta1_op3">Criar Funções</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta1" id="pergunta1_op4" value="Exibir Código">
                    <label class="form-check-label" for="pergunta1_op4">Exibir Código</label>
                </div>
                <button type="button" class="btn btn-primary btn-next-question mt-auto">Próxima Pergunta</button>
            </div>
            <div id="pergunta-2" class="pergunta">
                <h3>2. Em PHP, uma variável começa com:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta2" id="pergunta2_op1" value="#">
                    <label class="form-check-label" for="pergunta2_op1">#</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta2" id="pergunta2_op2" value="$">
                    <label class="form-check-label" for="pergunta2_op2">$</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta2" id="pergunta2_op3" value="@">
                    <label class="form-check-label" for="pergunta2_op3">@</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta2" id="pergunta2_op4" value="&">
                    <label class="form-check-label" for="pergunta2_op4">&</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-3" class="pergunta">
                <h3>3. Qual é uma variável válida?</h3>
                <select required class="form-select" name="pergunta3">
                    <option value="">-- Selecione --</option>
                    <option value="$1nome">$1nome</option>
                    <option value="$nome_usuario">$nome_usuario</option>
                    <option value="nome$">nome$</option>
                    <option value="$nome-usuario">$nome-usuario</option>
                </select>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-4" class="pergunta">
                <h3>4. Qual método envia dados pela URL?</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta4" id="pergunta4_op1" value="POST">
                    <label class="form-check-label" for="pergunta4_op1">POST</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta4" id="pergunta4_op2" value="GET">
                    <label class="form-check-label" for="pergunta4_op2">GET</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-5" class="pergunta">
                <h3>5. Sobre o método POST (marque as corretas):</h3>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta5[]" id="pergunta5_op1" value="Dados ficam visíveis na URL">
                    <label class="form-check-label" for="pergunta5_op1">Dados ficam visíveis na URL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta5[]" id="pergunta5_op2" value="Mais seguro para envio de dados">
                    <label class="form-check-label" for="pergunta5_op2">Mais seguro para envio de dados</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta5[]" id="pergunta5_op3" value="Permite envio de grande volume de dados">
                    <label class="form-check-label" for="pergunta5_op3">Permite envio de grande volume de dados</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta5[]" id="pergunta5_op4" value="Só funciona com textos">
                    <label class="form-check-label" for="pergunta5_op4">Só funciona com textos</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-6" class="pergunta">
                <h3>6. Qual input required é mais adequado para senha?</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta6" id="pergunta6_op1" value="text">
                    <label class="form-check-label" for="pergunta6_op1">text</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta6" id="pergunta6_op2" value="email">
                    <label class="form-check-label" for="pergunta6_op2">email</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta6" id="pergunta6_op3" value="password">
                    <label class="form-check-label" for="pergunta6_op3">password</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-7" class="pergunta">
                <h3>7. Qual permite escolher apenas UMA opção?</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta7" id="pergunta7_op1" value="checkbox">
                    <label class="form-check-label" for="pergunta7_op1">checkbox</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta7" id="pergunta7_op2" value="radio">
                    <label class="form-check-label" for="pergunta7_op2">radio</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta7" id="pergunta7_op3" value="text">
                    <label class="form-check-label" for="pergunta7_op3">text</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta7" id="pergunta7_op4" value="textarea">
                    <label class="form-check-label" for="pergunta7_op4">textarea</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-8" class="pergunta">
                <h3>8. Checkbox é usado quando:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta8" id="pergunta8_op1" value="Apenas uma opção">
                    <label class="form-check-label" for="pergunta8_op1">Apenas uma opção</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta8" id="pergunta8_op2" value="Multiplas opções">
                    <label class="form-check-label" for="pergunta8_op2">Multiplas opções</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-9" class="pergunta">
                <h3>9. A tag &lt;select&gt; serve para:</h3>
                <select required class="form-select" name="pergunta9">
                    <option value="">-- Selecione --</option>
                    <option value="Campo de texto">Campo de texto</option>
                    <option value="Lista Suspensa">Lista Suspensa</option>
                    <option value="Botão">Botão</option>
                    <option value="Sessão">Sessão</option>
                </select>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-10" class="pergunta">
                <h3>10. Qual estrutura usamos para decisão?</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta10" id="pergunta10_op1" value="for">
                    <label class="form-check-label" for="pergunta10_op1">for</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta10" id="pergunta10_op2" value="echo">
                    <label class="form-check-label" for="pergunta10_op2">echo</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta10" id="pergunta10_op3" value="if">
                    <label class="form-check-label" for="pergunta10_op3">if</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta10" id="pergunta10_op4" value="array">
                    <label class="form-check-label" for="pergunta10_op4">array</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-11" class="pergunta">
                <h3>11. Qual estrutura usamos para repetição?</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta11" id="pergunta11_op1" value="if">
                    <label class="form-check-label" for="pergunta11_op1">if</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta11" id="pergunta11_op2" value="echo">
                    <label class="form-check-label" for="pergunta11_op2">echo</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta11" id="pergunta11_op3" value="for">
                    <label class="form-check-label" for="pergunta11_op3">for</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta11" id="pergunta11_op4" value="isset">
                    <label class="form-check-label" for="pergunta11_op4">isset</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-12" class="pergunta">
                <h3>12. Um array é:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta12" id="pergunta12_op1" value="Uma função">
                    <label class="form-check-label" for="pergunta12_op1">Uma função</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta12" id="pergunta12_op2" value="Uma variável com múltiplos valores">
                    <label class="form-check-label" for="pergunta12_op2">Uma variável com múltiplos valores</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta12" id="pergunta12_op3" value="Um formulário">
                    <label class="form-check-label" for="pergunta12_op3">Um formulário</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta12" id="pergunta12_op4" value="Um loop">
                    <label class="form-check-label" for="pergunta12_op4">Um loop</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-13" class="pergunta">
                <h3>13. Para criar uma função usamos:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta13" id="pergunta13_op1" value="create">
                    <label class="form-check-label" for="pergunta13_op1">create</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta13" id="pergunta13_op2" value="function">
                    <label class="form-check-label" for="pergunta13_op2">function</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta13" id="pergunta13_op3" value="def">
                    <label class="form-check-label" for="pergunta13_op3">def</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta13" id="pergunta13_op4" value="func">
                    <label class="form-check-label" for="pergunta13_op4">func</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-14" class="pergunta">
                <h3>14. Sessões servem para:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta14" id="pergunta14_op1" value="Armazenar no navegador">
                    <label class="form-check-label" for="pergunta14_op1">Armazenar no navegador</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta14" id="pergunta14_op2" value="Armazenar no servidor">
                    <label class="form-check-label" for="pergunta14_op2">Armazenar no servidor</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta14" id="pergunta14_op3" value="Criar HTML">
                    <label class="form-check-label" for="pergunta14_op3">Criar HTML</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta14" id="pergunta14_op4" value="Fazer requisições">
                    <label class="form-check-label" for="pergunta14_op4">Fazer requisições</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-15" class="pergunta">
                <h3>15. Cookies são armazenados:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta15" id="pergunta15_op1" value="No servidor">
                    <label class="form-check-label" for="pergunta15_op1">No servidor</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta15" id="pergunta15_op2" value="No navegador">
                    <label class="form-check-label" for="pergunta15_op2">No navegador</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-16" class="pergunta">
                <h3>16. Qual função pode consumir API?</h3>
                <select required class="form-select" name="pergunta16">
                    <option value="">-- Selecione --</option>
                    <option value="echo">echo</option>
                    <option value="file_get_contents">file_get_contents</option>
                    <option value="isset">isset</option>
                    <option value="print_r">print_r</option>
                </select>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-17" class="pergunta">
                <h3>17. Sobre cURL (marque as corretas):</h3>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta17[]" id="pergunta17_op1" value="Faz requisições HTTP">
                    <label class="form-check-label" for="pergunta17_op1">Faz requisições HTTP</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta17[]" id="pergunta17_op2" value="Consome APIs">
                    <label class="form-check-label" for="pergunta17_op2">Consome APIs</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta17[]" id="pergunta17_op3" value="Apenas imprime dados">
                    <label class="form-check-label" for="pergunta17_op3">Apenas imprime dados</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pergunta17[]" id="pergunta17_op4" value="Substitui sessão">
                    <label class="form-check-label" for="pergunta17_op4">Substitui sessão</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-18" class="pergunta">
                <h3>18. Para acessar dados via POST usamos:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta18" id="pergunta18_op1" value="$_GET">
                    <label class="form-check-label" for="pergunta18_op1">$_GET</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta18" id="pergunta18_op2" value="$_POST">
                    <label class="form-check-label" for="pergunta18_op2">$_POST</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta18" id="pergunta18_op3" value="$_SESSION">
                    <label class="form-check-label" for="pergunta18_op3">$_SESSION</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta18" id="pergunta18_op4" value="$_COOKIE">
                    <label class="form-check-label" for="pergunta18_op4">$_COOKIE</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-19" class="pergunta">
                <h3>19. Para verificar se variável existe:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta19" id="pergunta19_op1" value="check()">
                    <label class="form-check-label" for="pergunta19_op1">check()</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta19" id="pergunta19_op2" value="isset()">
                    <label class="form-check-label" for="pergunta19_op2">isset()</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta19" id="pergunta19_op3" value="exist()">
                    <label class="form-check-label" for="pergunta19_op3">exist()</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta19" id="pergunta19_op4" value="verify()">
                    <label class="form-check-label" for="pergunta19_op4">verify()</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="button" class="btn btn-primary btn-next-question">Próxima Pergunta</button>
                </div>
            </div>
            <div id="pergunta-20" class="pergunta">
                <h3>20. Para iniciar uma sessão usamos:</h3>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta20" id="pergunta20_op1" value="start_session()">
                    <label class="form-check-label" for="pergunta20_op1">start_session()</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta20" id="pergunta20_op2" value="session_start()">
                    <label class="form-check-label" for="pergunta20_op2">session_start()</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta20" id="pergunta20_op3" value="init_session()">
                    <label class="form-check-label" for="pergunta20_op3">init_session()</label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="pergunta20" id="pergunta20_op4" value="begin_session()">
                    <label class="form-check-label" for="pergunta20_op4">begin_session()</label>
                </div>
                <div class="d-flex w-100 justify-content-between mt-auto">
                    <button type="button" class="btn btn-primary btn-previous-question">Pergunta Anterior</button>
                    <button type="submit" class="btn btn-danger" id="finalizarQuiz" disabled>Finalizar Quiz</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const state = {
            perguntaAtual: 1
        };

        function updateUi() {
            for (const p of document.querySelectorAll(".visivel")) {
                p.classList.remove('visivel');
            }
            document.getElementById("pergunta-" + state.perguntaAtual).classList.add('visivel');
        }

        function nextQuestion() {
            state.perguntaAtual = Math.min(20, state.perguntaAtual + 1);
            updateUi();
        }

        function previousQuestion() {
            state.perguntaAtual = Math.max(1, state.perguntaAtual - 1);
            updateUi();
        }

        function checkSubmitStatus() {
            // Se o form poder ser enviado, desbloquear o botão "finalizar quiz", caso contrário bloquear o botão.
            const btnQuiz = document.getElementById('finalizarQuiz');
            const form = document.querySelector("form.quiz-form");

            btnQuiz.disabled = !form.checkValidity() ?? false;
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateUi();
        });
        for (const btn of document.querySelectorAll(".btn-next-question")) {
            btn.onclick = nextQuestion;
        }
        for (const btn of document.querySelectorAll(".btn-previous-question")) {
            btn.onclick = previousQuestion;
        }
        for (const input of document.querySelectorAll("input")) {
            input.oninput = checkSubmitStatus;
        }
    </script> -->
<?= include render_view('partial.footer'); ?>