<?php $this->layout('../master', ['title' => 'Create Task']); ?>

<section>
    <div class="formulario">
        <a href="/home/home"><i class="fa-solid fa-reply fa-lg" style="color: #ffffff;"></i></a>
        <h2>Registrar atividade</h2>
        <form action="/task/store" method="post">
            <input type="hidden" name="userId" value="<?= user(LOGGED)->userId; ?>">

            <input type="hidden" name="start_date" value="<?= date('Y-m-d'); ?>">

            <input type="hidden" name="status" value="aberto">

            <div class="col-12">
                <label for="inputEmail4" class="form-label">Nome</label>
                <input type="text" name="name">
            </div>


            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Conclusão</label>
                <input type="date" name="completion_date">
            </div>

            <div class="col-md">

                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Prioridade</label>
                    <select name="priority" id="">
                        <option value="alta">Alta</option>
                        <option value="media">Média</option>
                        <option value="baixa">Baixa</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Categoria</label>
                    <select name="categoryId" id="">
                        <option value="">Selecione</option>
                        <?php foreach ($data as $category) { ?>
                            <option value="<?= $category->categoryId; ?>"><?= $category->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <label for="inputEmail4" class="form-label">Descrição</label>
                <textarea name="description" id="" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-outline-primary">Registrar</button>
    </div>
    </form>
    </div>
</section>