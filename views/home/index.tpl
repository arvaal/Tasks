<h1><?php echo $h1; ?></h1>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><a href="<?php echo $sorts['name']; ?>"><?php echo $texts['text_name']; ?></a></th>
                    <th scope="col"><?php echo $texts['text_text']; ?></th>
                    <th scope="col"><a href="<?php echo $sorts['email']; ?>"><?php echo $texts['text_email']; ?></a></th>
                    <th scope="col"><a href="<?php echo $sorts['status']; ?>"><?php echo $texts['text_status']; ?></a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) { ?>
                    <tr>
                        <td><?php echo $task['name']; ?></td>
                        <td><?php echo $task['text']; ?></td>
                        <td><?php echo $task['email']; ?></td>
                        <td><?php echo $task['status'] == 1 ? $texts['text_yes'] : $texts['text_no']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <p><a class="btn btn-lg btn-primary btn-block" href="<?php echo $links['create_link']; ?>" role="button"><?php echo $texts['btn_create']; ?></a></p>
        </div>
    </div>
</div>

<?php echo $pagination; ?>
<hr>

