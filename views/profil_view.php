<h1>Profile</h1>

<div class="d-flex justify-content-center">
    <div class="card mb-4">
        <div class="card-body text-center">
            <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="avatar"
                 class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">@<?= $user['users_username'] ?></h5>
            <p class="text-muted mb-1"><?= $user['users_role'] ?></p>
            <p class="text-muted mb-4"><?= $user['users_email'] ?></p>
            <div class="d-flex justify-content-center mb-2">
                <a href="index.php?page=user_form&id=<?= $user['users_id'] ?>" type="button" class="btn btn-primary">Edit</a>
                <a href="actions/user_delete.php?id=<?= $user['users_id'] ?>" type="button" class="btn btn-outline-danger ms-1">Delete</a>
            </div>
        </div>
    </div>
</div>