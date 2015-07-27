<form action="auth/login" method="POST">
    <label for="username">Name:</label>
    <input type="text" name="name" id="name"  maxlength="50"  required="required" pattern="[A-Z,a-z]{3,}" title="(minimum 3 letters, should not contain numbers and special characters)" placeholder="Your Full Name"/><br/>
    <label for="password">Password</label>
    <input type="password" name="password" required="required" id="password"/>
    <input type="submit" id="submit" value="login"/>
</form>
<br/>Not a member yet?? <a href="auth/register">register</a>