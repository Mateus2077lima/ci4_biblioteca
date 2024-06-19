<nav class="navbar navbar-expand-lg bg-secondary mb-3 " data-bs-theme="text-light">
<div class="container">

    <?=anchor("#","Biblioteca Virtual",['class' => 'navbar-brand link-secondary text-light'])?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?=anchor("Aluno/index","Aluno",['class' => 'nav-link active link-secondary text-light'])?>
        </li>
        <li class="nav-item">
        <?=anchor("Autor/index","Autor",['class' => 'nav-link active link-secondary text-light'])?>
        </li>
        <li class="nav-item">
        <?=anchor("Usuario/index","Usuario",['class' => 'nav-link active link-secondary text-light'])?>
        </li>
        <li class="nav-item">
          <?=anchor("Editora/index","Editora",['class' => 'nav-link active link-secondary text-light',])?>
        </li>
        <li class="nav-item">
          <?=anchor("Obra/index","Obra",['class' => 'nav-link active link-secondary text-light',])?>
        </li>
        <li class="nav-item">
          <?=anchor("Livro/index","Livro",['class' => 'nav-link active link-secondary text-light', 'aria-current'=>'page',])?>
        </li>
        <li class="nav-item">
          <?=anchor("Emprestimo/index","Emprestimo",['class' => 'nav-link active link-secondary text-light', 'aria-current'=>'page',])?>
        </li>
      </ul>
        <?= anchor('Login/logout','Sair',
              [
                'class' => 'btn btn-outline-black'
              ] )
        ?>
    </div>
  </div>
</nav>