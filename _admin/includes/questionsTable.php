<h2 class='mt-5'>Активные вопросы</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Вопрос</th>
            <th scope="col">Ответ</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $products = get_questions(-1);
            foreach($products as $row){
        ?>
            <tr>
                <th><?=$row['question'] ?></th>
                <td><?=$row['answer'] ?></td>
                <td><a class="btn btn-outline-warning" href="?item=questions&action=edit&id=<?=$row['id']?>">Редактировать</a></td>
                <td><a class="btn btn-outline-danger" href="?item=questions&action=remove&id=<?=$row['id']?>">Добавить в архив</a></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<h2 class='mt-5'>Вопросы в архиве</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Вопрос</th>
            <th scope="col">Ответ</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $products = get_questions(-1, 1);
            foreach($products as $row){
        ?>
            <tr class="removed">
                <th><?=$row['question'] ?></th>
                <td><?=$row['answer'] ?></td>
                <td><a class="btn btn-outline-primary" href="?item=questions&action=readd&id=<?=$row['id']?>">Восстановить</a></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<a class="btn btn-outline-primary mt-5" href="?item=questions&action=add">Добавить новый</a>
<a class="btn btn-outline-danger mt-5" href="?item=questions&action=clear">Очистить архив</a>