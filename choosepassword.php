<h1>Choose your password</h1>
<div class="row">
    <div class="col-6">
        <form action="./index.php?content=choosepassword-script" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Enter your new password:</label>
                <input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="passwordHelp"
                    placeholder="Enter Password" name="password1" required>
                <label for="exampleInputEmail1">Enter the password again:</label>
                <input type="password" class="form-control" id="exampleInputCHeckPassword1"
                    aria-describedby="passwordHelp" placeholder="Enter Password Again" name="password2" required>
                <small id="passwordHelp" class="form-text text-muted">Your password should atleast be 8 characters long
                    and contain a combination between characters and numbers.</small>
            </div>
            <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
            <button type="submit" class="btn btn-dark btn-lg btn-block">Set password</button>
        </form>
    </div>
    <div class="col-6">
        <img src="./img/lock.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image" width='150px'>
    </div>
</div>