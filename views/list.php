<?php
include_once 'layout/header.php'
?>
<div class="container">
    <a href="views/add-author.php" class="btn btn-lg btn-success mb-3 mt-3">Add Author</a>
    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">BirthDate</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($authors)) {
            foreach ($authors as $author) :?>
                <tr>
                    <th scope="row"><?php echo $author->getId() ?></th>
                    <td><?php echo $author->getFirstName() ?></td>
                    <td><?php echo $author->getLastName() ?></td>
                    <td><?php echo $author->getEmail() ?></td>
                    <td><?php echo $author->getBirthdate() ?></td>
                </tr>
            <?php endforeach;
        } else { ?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php
include_once 'layout/footer.php';
?>