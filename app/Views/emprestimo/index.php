<div class="container">
    <h2>Empréstimo</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#cadModal">
        Nova Emprestimo
    </button>
    <div class='row'>
                <?php
                    foreach($listaObra as $ob){
                        $obras[$ob['id']] = $ob['titulo'];
                    }
                    foreach($listaLivro as $li){
                        $livros[$li['id']] = $obras[$li['id_obra']];
                    }
                    foreach($listaAluno as $al){
                        $alunos[$al['id']] = $al['nome'];
                    }
                    foreach($listaUsuario as $us){
                        $usuarios[$us['id']] = $us['email'];
                    }
                ?>
        <?php foreach($listaEmprestimo as $em) : ?>
        <?php
            $data_inicio = $em['data_inicio'];
            $data_inicio = explode('-',$data_inicio);
            $data_inicio = mktime(0,0,0,$data_inicio[1],$data_inicio[2],$data_inicio[0]);
            if($em['data_fim'] != NULL){
                $data_fim = $em['data_fim'];
                $data_fim = explode('-',$data_fim);
                $data_fim = mktime(0,0,0,$data_fim[1],$data_fim[2],$data_fim[0]);
            }
            $prazo = $em['data_prazo']*24*60*60;
            $prazo += $data_inicio;
        ?>
            <div class="col-3 mb-2">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h3 class="text"><?=$livros[$em['id_livro']]?></h3>
                        <h5 class="text"><?=$alunos[$em['id_aluno']]?></h5>
                        <p class="text"><?='Usuário: '.$usuarios[$em['id_usuario']]?></p>
                        <p class="text"><?="Data Inicial: ".date('d/m/Y',$data_inicio)?>
                        <br><?="Data Prazo: ".date('d/m/Y',$prazo)?>
                        <?php if($em['data_fim'] != NULL):?>
                        <br><?='Data de Devolução: '.date('d/m/Y',$data_fim)?>
                        <?php endif?>
                        <br>
                        <?php
                            if($em['data_fim'] != NULL){
                                if($data_fim - $prazo <= 0){
                                    echo '<p class="text-success">Devolução dentro do prazo</p>';
                                } else {
                                    echo '<p class="text-danger">Devolução fora do Prazo</p>';
                                }
                            }
                        ?>
                        </p>
                            <?php if($em['data_fim'] == NULL):?> 
                                <?=anchor("Emprestimo/editar/".$em['id'],'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>',['class' => 'position-absolute top-0 end-0'])?>
                                <?=anchor("Emprestimo/devolucao/".$em['id'],'Devolução',["class" => "btn btn-secondary"])?>
                            <?php endif?>
                    <p class='card-text position-absolute bottom-0 end-0'><?='#'.$em['id']?></p> 
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open("Emprestimo/cadastrar")?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Empréstimo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="data_inicio"><?=session()->get('email');?></label>
                        <input  type="hidden" id="usuario" name="usuario" value="<?=session()->get('id');?>">
                    </div>
                    <div class="form-group">
                        <label for="data_inicio">Data inícial</label>
                        <input required class='form-control' type="date" id="data_inicio" name="data_inicio">
                    </div>
                    <div class="form-group">
                        <label for="data_prazo">Prazo</label>
                        <input required class='form-control' type="int" id="data_prazo" name="data_prazo">
                    </div>
                    <div class="form-group">
                        <?php
                            foreach($listaObra as $ob){
                                    $obras[$ob['id']] = $ob['titulo'];
                                }
                        ?>
                        <label for="id_livro">Livro</label>
                        <select required class='form-select' name='id_livro' id='id_livro'>
                        <option value="">Selecione um Livro</option>
                        <?php foreach($listaLivro as $liv) : ?>
                                <?php if($liv['disponivel'] >= 1):?>
                                    <option value="<?=$liv['id']?>"><?=$obras[$liv['id_obra']]?></option>
                                <?php endif?>
                        <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <--<label for="id_usuario">Usuario</label>
                        <select required class='form-select' name='id_usuario' id='id_usuario'>
                        <option value="">Selecione um Usuario</option>
                        <?php foreach($listaUsuario as $us) : ?>
                            <option value="<?=$us['id']?>"><?=$us['nome']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_aluno">Aluno</label>
                        <select required class='form-select' name='id_aluno' id='id_aluno'>
                        <option value="">Selecione um Aluno</option>
                        <?php foreach($listaAluno as $al) : ?>
                            <option value="<?=$al['id']?>"><?=$al['nome']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
        <?=form_close()?>
    </div>
</div>