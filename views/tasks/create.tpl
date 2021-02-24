<h1><?php echo $h1; ?></h1>
<form action="<?php echo $links['action']; ?>" class="form" method="post">
    <label for="name"><?php echo $texts['text_name']; ?></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg>
            </span>
        </div>
        <input type="text" name="name" class="form-control" id="name" placeholder="<?php echo $texts['text_name']; ?>" required="" autocomplete="off">
    </div>

    <label for="email"><?php echo $texts['text_email']; ?></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">@</span>
        </div>
        <input type="text" name="email" class="form-control" id="email" placeholder="<?php echo $texts['text_email']; ?>" required="" autocomplete="off">
    </div>

    <label for="email"><?php echo $texts['text_text']; ?></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </span>
        </div>
        <textarea name="text" class="form-control" id="text" placeholder="<?php echo $texts['text_text']; ?>" required=""></textarea>
    </div>
    <hr class="mb-4">
        <div class="btn-group">
            <button class="btn btn-sm btn-outline-secondary" type="submit"><?php echo $texts['text_save']; ?></button>
            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="window.history.back()"><?php echo $texts['text_cancel']; ?></button>
        </div>
</form>
