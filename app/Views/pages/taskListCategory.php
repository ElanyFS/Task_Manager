<?php $this->layout('../master', ['title' => 'Index']); ?>

<section>
    <br>
    <table>
        <tr>
            <th>Tarefa</th>
            <th>Descrição</th>
            <th>Status</th>
            <th colspan="3"></th>
        </tr>

        <?php foreach ($task as $value) { ?>
            <tr>
                <td><?= $value->name; ?></td>
                <td><?= $value->description; ?></td>
                <td><?= ucfirst($value->status); ?></td>
                <td><a href="#"><i class="fa-solid fa-xmark" style="color: #f02828;"></i></a></td>
                <td><a href="#"><i class="fa-solid fa-pencil" style="color: #0051a8;"></i></a></td>
                <?php if ($value->status !== 'concluido') { ?>
                    <td><a href="/task/updateStatus/<?= $value->taskId; ?>"><i class="fa-solid fa-check" style="color: #1b8014;"></i></a></td>
                <?php } ?>
            </tr>
        <?php } ?>

    </table>
</section>