<?php if(isset($success) && $success) { ?>
    <div class="alert alert-success"><?php echo $success; ?></div>
<?php } ?>

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
                    <th scope="col"><?php echo $texts['text_action']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['name']); ?></td>
                        <td><?php echo htmlspecialchars($task['text']); ?></td>
                        <td><?php echo $task['email']; ?></td>
                        <td><?php echo $task['status'] == 1 ? $texts['text_yes'] : $texts['text_no']; ?></td>
                        <td><?php echo $task['changed_text'] == 1 ? $texts['text_changed'] : ''; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="<?php echo $links['create_link']; ?>" role="button"><?php echo $texts['btn_create']; ?></a>
            
            <?php if ($is_admin == false) { ?>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo $links['login_link']; ?>" role="button"><?php echo $texts['text_login']; ?></a>
            <?php } else { ?>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo $links['logout_link']; ?>" role="button"><?php echo $texts['text_logout']; ?></a>
            <?php } ?>
        </div>
    </div>
</div>
<hr>
<?php echo $pagination; ?>
<hr>

