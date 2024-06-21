<div class="container p-3">
    <?=form_open('Emprestimo/salvar_devolucao')?>
    <input type="hidden" value='<?=$Devolucao['id']?>' name="id">
    <input type="hidden" value='<?=$Devolucao['id_livro']?>' name="id_livro">
    <div class="row p-2">
        <div class="col-2">
            <label for="data_fim">Data Final</label>
        </div>
        <div class="col-10">
            <input value='' type="date" name="data_fim" id="data_fim" class="form-control" required>
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
        </div>
    </div>
    <?=form_close()?>

</div>