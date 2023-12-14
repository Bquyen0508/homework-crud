<?php
require_once('partial/header.php');
require_once('./database/database.php');
if (isset($_GET['id'])) {
    $student = selectOnestudent($_GET['id']);
}
?>
<div class="container p-4">
    <form action="update_model.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $student['name']; ?>">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $student['age']; ?>">
        </div>
        <div class=" form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $student['email'] ?>">
        </div>
        <div class=" form-group">
            <input type="text" class="form-control" placeholder="Image URL" name="image_url" value="<?php echo $student['profile'] ?>">
        </div>
        <div class=" form-group">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
        <input type="hidden" name="id" value="<?php echo $student['id'] ?>">
    </form>
</div>
<?php require_once('partial/footer.php'); ?>