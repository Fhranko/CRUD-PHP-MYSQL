<?php
    include('db.php');
    include('includes/header.php');

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn,$query);
    
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
    
        $query = "UPDATE task set title = '$title', description = '$description' where id = '$id'";
        mysqli_query($conn, $query);
        header("Location:index.php");

        $_SESSION['message'] = 'Task updated succesfully';
        $_SESSION['color-message'] = 'warning';
    }

?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $id; ?>" method = "POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="" value="<?php echo $title?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" rows="2" placeholder=""><?php echo $description?></textarea>
                    </div>
                    <button class="btn btn-success btn-block" name = "update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>