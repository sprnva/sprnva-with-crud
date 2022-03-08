<?php require __DIR__ . '/../layouts/head.php'; ?>

<input class="form-control" type="text" id="title" placeholder="title">
<span class="text-danger" id="title-error"></span>
<br>
<input class="form-control" type="text" id="description" placeholder="description">
<span class="text-danger" id="description-error"></span>
<br><br>
<button class="btn btn-md btn-primary" onclick="add()">ADD</button>
<br><br>
<table class="table table-bordered">
    <tr>
        <th style="width: 10%;"></th>
        <th class="text-center" style="width: 2%;">ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
    </tr>

    <!-- iterate $cruddata from our controller  -->
    <?php foreach ($cruddata as $data) { ?>
        <tr>
            <td class="text-center">
                <a href="<?= route('/crud_edit', $data['id']) ?>">
                    edit
                </a>
                <span class="text-muted">|</span>
                <a href="" onclick="deleteItem('<?= $data['id'] ?>')">
                    delete
                </a>
            </td>
            <td class="text-center"><?= $data['id'] ?></td>
            <td><?= $data['title'] ?></td>
            <td><?= $data['description'] ?></td>
        </tr>
    <?php } ?>

</table>

<script>
    function add() {
        var title = $("#title").val();
        var description = $("#description").val();

        // remember base_url + "/crud_add" will be 
        // directed to config->routes->web.php
        $.post(base_url + "/crud_add", {
            title: title,
            description: description
        }, function(data) {

            // parse the json response from our controller
            var res = JSON.parse(data);

            if (res == 1) {
                alert("ALL GOOD!");
                location.reload();
            } else {
                // display the error in the span under the inputs
                $("#title-error").html(res.title);
                $("#description-error").html(res.description);
            }
        });
    }

    function deleteItem(id) {
        $.post(base_url + "/crud_delete", {
            id: id
        }, function(data) {
            var res = JSON.parse(data);
            if (res == 1) {
                alert("ALL GOOD!");
                location.reload();
            } else {
                alert("ERROR DELETING");
            }
        });
    }
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>