<?php
/**
 * @var \Carmelita\FirstProject\Kernel\View $view
 * @var \Carmelita\FirstProject\Kernel\Session\Session $session
 */
?>


<?= $view->component('start') ?>
<h1>Add movie page</h1>

<form action="/admin/movies/add" method="post" enctype="multipart/form-data">
    <p>Name</p>
    <div>
        <input type="text" name="name">
    </div>

    <?php if($session->has('name')){ ?>


        <div>
            <ul>
                <?php foreach ($session->getFlash('name') as $error) { ?>
                    <li style="color:red;"><?php echo $error ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <div>
        <input type="file" name="image">
    </div>

    <div>
        <button>Add</button>
    </div>
</form>

<?= $view->component('end') ?>
