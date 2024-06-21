<div class="container p-3">
    <?=form_open('Emprestimo/salvar')?>
    <input type="hidden" value='<?=$Emprestimo['id']?>' name="id">
    <div class="row p-2">
        <div class="col-2">
            <label for="data_inicio">Data Inicial</label>
        </div>
        <div class="col-10">
            <input required value='<?=$Emprestimo['data_inicio']?>' type="date" name="data_inicio" id="data_inicio" class="form-control">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_prazo">Prazo</label>
        </div>
        <div class="col-10">
            <input required value='<?=$Emprestimo['data_prazo']?>' type="int" name="data_prazo" id="data_prazo" class="form-control">
        </div>
    </div>
    <div class="row p-2">
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="livro">Livro</label>
        </div>
        <div class="col-10">
            <?php
                foreach($listaObra as $ob){
                    $obras[$ob['id']] = $ob['titulo'];
                }
                foreach($listaLivro as $li){
                    $livros[$li['id']] = $obras[$li['id_obra']];
                }
            ?>
            <select required class='form-select' name='id_livro' id='id_livro'>
                    <?php foreach($listaLivro as $li) : ?>
                            <?php if($li['disponivel'] == 1):?>
                                <option value="<?=$li['id']?>"><?=$obras[$li['id_obra']]?></option>
                            <?php endif?>
                    <?php endforeach?>
            </select>
            <input type="hidden" name="id_livro_antigo" id="id_livro_antigo" value="<?=$Emprestimo['id_livro']?>">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="id_usuario">Usuarios</label>
        </div>

        <div class="col-10">
        <select required class='form-select' name='id_usuario' id='id_usuario'>
            <?php foreach($listaUsuario as $u) : ?> 
                    <option value="<?=$u['id']?>"><?=$u['nome']?></option>
            <?php endforeach?>
            </select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="id_aluno">Aluno</label>
        </div>
        <div class="col-10">
            <?php
                foreach($listaAluno as $aluno){
                    $alunos[$aluno['id']] = $aluno['nome'];
                }
            ?>
            <select required class='form-select' name='id_aluno' id='id_aluno'>
            <?php foreach($listaAluno as $al) : ?> 
                    <option value="<?=$al['id']?>"><?=$al['nome']?></option>
            <?php endforeach?>
            </select>
        </div>
    </div>
    <div class="row p-4">
        <div class="btn-group" role="group">
            <a href="http://localhost:8080/index.php/Emprestimo/index" class="btn btn-outline-secondary">X</a>
            <button type="submit" class="btn btn-outline-success">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                </svg>
            </button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excModal">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                </svg>
            </button>
        </div>
    </div>
    <?=form_close()?>

    <?=form_open('Emprestimo/excluir')?>
        <div class="modal fade" id="excModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Emprestimo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <input value='<?=$Emprestimo['id']?>' type="hidden" name="id">
                            <p>Você deseja excluir o emprestimo <?=$Emprestimo['id']?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
        <?=form_close()?>
</div>