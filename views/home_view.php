<div class="row row-cols-1 row-cols-md-2 g-4 pt-4">
    <?php foreach ($rooms as $room) : ?>
    <div class="col">
        <div class="card">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
            <div class="card-body">
                <h5 class="card-title"><?= $room['rooms_name']?></h5>
                <p class="card-text"><?= $room['rooms_desc']?></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

