<form action="index.php?page=ticket_form" method="post">
    <div class="container">
        <div class="mb-3">
            <label for="exampleInputTitre" class="form-label">Title</label>
            <input name="tickets_title" type="text" class="form-control" id="exampleInputTitre"
                   aria-describedby="Titre">
        </div>

        <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">Description</label>
            <textarea name="tickets_desc" class="form-control" id="exampleInputDescription"
                      aria-describedby="text"></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleInputStatus" class="form-label">Status</label>
            <select name="tickets_status" id="exampleInputStatus" class="form-select">
                <option value="todo">To Do</option>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="multiple-select-field-tag" class="form-label">Tag</label>
            <select name="tags[]" class="form-select" id="multiple-select-field-tag"
                    data-placeholder="Choose anything" multiple>
<!--                --><?php //foreach ($result as $tag) : ?>
<!--                    <option value="--><?//= $tag['tags_id'] ?><!--">--><?//= $tag['tags_name'] ?><!--</option>-->
<!--                --><?php //endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="multiple-select-field-assign" class="form-label">Assigned To</label>
            <select name="assign_to[]" class="form-select" id="multiple-select-field-assign"
                    data-placeholder="Choose anything" multiple>
<!--                --><?php //foreach ($result1 as $user) : ?>
<!--                    <option value="--><?//= $user['users_id'] ?><!--">--><?//= $user['users_username'] ?><!--</option>-->
<!--                --><?php //endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputPriority" class="form-label">Priority</label>
            <input name="tickets_priority" type="text" class="form-control" id="exampleInputPriority"
                   aria-describedby="Priority">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
