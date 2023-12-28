<form action="index.php?page=room_form" method="post">
    <div class="container">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input name="rooms_name" type="text" class="form-control" id="exampleInputName"
                   aria-describedby="Titre">
        </div>

        <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">Description</label>
            <textarea name="rooms_desc" class="form-control" id="exampleInputDescription"
                      aria-describedby="text"></textarea>
        </div>

        <div class="mb-3">
            <label for="multiple-select-field-tag" class="form-label">Members</label>
            <select name="users[]" class="form-select" id="multiple-select-field-tag"
                    data-placeholder="Choose anything" multiple>
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user['users_id'] ?>"><?= $user['users_username'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
