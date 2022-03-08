<?php require __DIR__ . '/../layouts/head.php'; ?>


<table class="table table-bordered">
    <tr>
        <th style="width: 20%;">ID</th>
        <td><?= $data['id'] ?></td>
    </tr>
    <tr>
        <th>TITLE</th>
        <td><?= $data['title'] ?></td>
    </tr>
    <tr>
        <th>DESCRIPTION</th>
        <td><?= $data['description'] ?></td>
    </tr>
</table>

<br><br>

<input type="hidden" id="crud_id" value="<?= $data['id'] ?>">

<input class="form-control" type="text" id="title" placeholder="title" value="<?= $data['title'] ?>">
<span class="text-danger" id="title-error"></span>

<br>

<input class="form-control" type="text" id="description" placeholder="description" value="<?= $data['description'] ?>">
<span class="text-danger" id="description-error"></span>

<br><br>

<button class="btn btn-md btn-primary" onclick="update()">UPDATE</button>


<script>
    function update() {
        var title = $("#title").val();
        var description = $("#description").val();
        var crud_id = $("#crud_id").val();

        // remember base_url + "/crud_update" will be 
        // directed to config->routes->web.php
        $.post(base_url + "/crud_update", {
            crud_id: crud_id,
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
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>