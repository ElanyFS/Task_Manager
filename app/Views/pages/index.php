<?php
$this->layout('../master', ['title' => 'Index']); ?>

<section>
    <div class="alert">
        <h1>Alert: Atividades atrasadas</h1>
    </div>

    <div class="row-content">
        <div class="group">
            <div class="col-register">
                <h4>Registre suas atividades</h4>
                <div class="icon">
                    <a href="/task/create"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></a>
                </div>
            </div>

            <div class="col-list">
                <ul>
                    <?php foreach ($data as $task) { ?>
                       <li><?= $task->name;?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <!-- <div class="group">
            <div class="col">
                grupo 1
            </div>
        </div> -->
    </div>

    <!-- <div class="alert">
        <h1>Alert: atividades mais recentes</h1>
    </div> -->
</section>