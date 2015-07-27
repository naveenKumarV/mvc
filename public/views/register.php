<form method="POST" action="auth/register" class="form">
    <label for="name">Name:</label>
    <input type="text" name="username" id="name"  maxlength="50"  required="required" pattern="[A-Z,a-z]{3,}" title="(minimum 3 letters, should not contain numbers and special characters)" placeholder="Your Full Name"/><br/>
    <label for="password">Password</label>
    <input type="password" name="password" required="required" id="password"/>
    <input type="email" name="email" required="required" id="email"/>
    <input type="submit" id="submit" value="Register" class="register" />
    <div class="response"></div>
</form>