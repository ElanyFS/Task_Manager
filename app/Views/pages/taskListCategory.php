<?php $this->layout('../master', ['title' => 'Index']); ?>

<section>
    <br>
    <table>
        <tr>
            <th>Tarefa</th>
            <th>Descrição</th>
            <th colspan="2"></th>
        </tr>

        <?php foreach ($task as $value) { ?>
            <tr>
                <td><?= $value->name; ?></td>
                <td><?= $value->description; ?></td>
                <td><a href="#"><i class="fa-solid fa-xmark" style="color: #f02828;"></i></a></td>
                <td><a href="#"><i class="fa-solid fa-pencil" style="color: #0051a8;"></i></a></td>
            </tr>
        <?php } ?>

    </table>
</section>