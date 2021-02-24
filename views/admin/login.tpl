<form action="<?php echo $links['action']; ?>" class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal"><?php echo $h1; ?></h1>
    <label for="inputLogin"><?php echo $texts['text_login']; ?></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </span>
        </div>
        <input type="text" name="login" id="inputLogin" class="form-control" placeholder="<?php echo $texts['text_login']; ?>" required="" autofocus="" autocomplete="off" value="admin">
    </div>
    <label for="inputPassword"><?php echo $texts['text_password']; ?></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                    <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                </svg>
            </span>
        </div>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php echo $texts['text_password']; ?>" required="" autocomplete="off" value="123">
    </div>
    <div class="checkbox mb-3"></div>
    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $texts['text_send']; ?></button>
</form>
