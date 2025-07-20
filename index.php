<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
       <title>Create account</title>
    </head>
    <body>
        <div class="form-container">
            <form action methid="post" enctype="multipart/form-data">
               <h3>Create account</h3>
                <div class="alert">Error please try agian</div>
                <input type="text" class="box" name="name"
                    placeholder="Enter user name"
                    required>
                <input type="email" class="box" name="email"
                    placeholder="Enter user email"
                    required>
                <input type="password" class="box" name="password"
                    placeholder="enter password"
                    required>
                <input type="password" class="box" name="cpassword"
                    placeholder="confirm password"
                    required>
                <input type="file" name="image" class="box " accept="image/*"
                    required>
                <input type="submit" name="submit" class="btn" value="start chatting"
                    required>
                <p>already have an acocunt? <a href="login.html">Login
                        Now</a></p>
            </form>
        </div>
    </body>
</html>